<?php require 'sections/header.php';
header("Access-Control-Allow-Origin: https://www.widgety.co.uk");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
//
// // Allow embedding
  header_remove("X-Frame-Options");
	header("Content-Security-Policy: frame-src 'self' https://www.widgety.co.uk; child-src 'self' https://www.widgety.co.uk;");
	// header("Access-Control-Allow-Origin: *");
?>

		<section id="featured" class="featured-programs section">

			<div class="container section-title" data-aos="fade-up">
				<span class="description-title">Widgety Test</span>
				<h2>This is a test</h2>
				<p>for testing only, this is only a test</p>
			</div>

			<!-- Core CSS -->
			<link rel="stylesheet" href="mapbox-gl.css">

			<style>
				/* body { font-family: Helvetica, Arial, sans-serif; margin: 0; background: #fafafa; } */
				#widget-container { max-width: 1200px; margin: 0 auto; background: #fff; padding: 2rem; }
				.mapboxgl-map { border-radius: 8px; overflow: hidden; margin-bottom: 1rem; height: 400px; }
				.slider { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: 1rem; }
				.slider img { height: 220px; border-radius: 8px; scroll-snap-align: start; }
				h1 {
					font-size: 2rem;
					color: #00447c;
					margin-bottom: 0.5rem;
				}

				h2 {
					font-size: 1.4rem;
					color: #0077c8;
					margin-top: 2rem;
					margin-bottom: 0.5rem;
				}

				table {
					width: 100%;
					border-collapse: collapse;
				}

				th {
					background: #f0f4f8;
					text-align: left;
				}

				td, th {
					padding: 0.5rem;
					border-bottom: 1px solid #ddd;
				}
			</style>

			<div id="widget-container" class="container-fluid" data-aos="fade-up" data-aos-delay="300">




			</div>

			<!-- Scripts -->
			<script>
				// Optional: adds smooth scroll and drag support
				document.addEventListener("DOMContentLoaded", () => {
					const slider = document.querySelector(".slider");
					if (!slider) return;
					let isDown = false, startX, scrollLeft;

					slider.addEventListener("mousedown", e => {
						isDown = true;
						slider.classList.add("active");
						startX = e.pageX - slider.offsetLeft;
						scrollLeft = slider.scrollLeft;
					});
					slider.addEventListener("mouseleave", () => { isDown = false; slider.classList.remove("active"); });
					slider.addEventListener("mouseup", () => { isDown = false; slider.classList.remove("active"); });
					slider.addEventListener("mousemove", e => {
						if(!isDown) return;
						e.preventDefault();
						const x = e.pageX - slider.offsetLeft;
						const walk = (x - startX) * 2;
						slider.scrollLeft = scrollLeft - walk;
					});
				});
			</script>
			<script>
				async function initWidget() {
					const params = new URLSearchParams(window.location.search);
					const cruiseID = params.get('cruiseID') || 'NCLGWY-20251114-05-MIA-MIA';

					const response = await fetch(`/widgety-local/data/${cruiseID}.json`);
					const json = await response.json();
					const data = json.response.date;
					renderWidget(data);
				}

				function renderWidget(data) {
					const c = document.getElementById('widget-container');
					c.innerHTML = `
						<h1>${data.holiday.title}</h1>
						<p><strong>Ship:</strong> ${data.ship.title}</p>
						<p><strong>Duration:</strong> ${data.holiday.duration_days} days</p>
						<p><strong>Departure:</strong> ${new Date(data.date_from).toLocaleDateString()}</p>
						<div id="map"></div>
						<div class="slider">
							${data.days.flatMap(d =>
								d.day_locations.flatMap(l =>
									l.cover_images.slice(0, 3).map(img => `<img src="${img.medium_url}" alt="${l.location.name}">`)
								)
							).join('')}
						</div>
						<h2>Itinerary</h2>
						<ul>
							${data.days.map(d => {
								const loc = d.day_locations[0]?.location?.name || "At Sea";
								return `<li>Day ${d.day}: ${loc}</li>`;
							}).join('')}
						</ul>
						<h2>Cabin Prices</h2>
						<table border="1" cellpadding="6" cellspacing="0">
							<thead><tr><th>Cabin</th><th>Price</th><th>Availability</th></tr></thead>
							<tbody>
								${data.pricings[0].pricing_prices.map(p => `
									<tr><td>${p.grade_name}</td><td>£${p.double_price_pp}</td><td>${p.availability}</td></tr>
								`).join('')}
							</tbody>
						</table>
					`;

					renderMap(data);
				}

				function renderMap(data) {
					mapboxgl.accessToken = "pk.eyJ1IjoiaWNydWlzZSIsImEiOiI3enBKbmdVIn0.fZ7xpdtCSEvCSf0qtcXzag";

					const map = new mapboxgl.Map({
						container: 'map',
						style: 'mapbox://styles/mapbox/streets-v12',
						center: [0, 20],
						zoom: 2
					});

					const coords = [];
					data.days.forEach(day => {
						const loc = day.day_locations[0]?.location;
						if (loc?.longitude && loc?.latitude) {
							const lng = parseFloat(loc.longitude);
							const lat = parseFloat(loc.latitude);
							coords.push([lng, lat]);
							new mapboxgl.Marker().setLngLat([lng, lat])
								.setPopup(new mapboxgl.Popup().setHTML(`<strong>${loc.name}</strong>`))
								.addTo(map);
						}
					});

					if (coords.length > 0) {
						map.fitBounds(coords, { padding: 50 });
					}
				}

				initWidget();
			</script>
			<script src="mapbox-gl.js"></script>

		</section>


<?php
	require 'sections/contact-boxes.php';
require 'sections/footer.php';
?>
