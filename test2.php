<?php require 'sections/header.php';
header("Access-Control-Allow-Origin: https://www.widgety.co.uk");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Credentials: true");

// // Allow embedding
  header_remove("X-Frame-Options");
	// header("Content-Security-Policy: frame-src 'self' https://www.widgety.co.uk; child-src 'self' https://www.widgety.co.uk;");
	// header("Access-Control-Allow-Origin: *");
?>

		<section id="featured" class="featured-programs section">

			<div class="container section-title" data-aos="fade-up">
				<span class="description-title">Widgety Test</span>
				<h2>This is a test</h2>
				<p>for testing only, this is only a test</p>
			</div>

			<div id="cruise-widget" class="container-fluid" data-aos="fade-up" data-aos-delay="300">

				<iframe class="widgety-cruise-tour-search" frameborder="0" height="600" preview-nav="false" results-nav="false" xreferrerpolicyx="xoriginx" referrerpolicy="no-referrer" src="//www.widgety.co.uk/widgets/twSfxpVB1etB3zAL1yA6/holidays/NCLGWY-20251114-05-MIA-MIA.widget" tabs="false" width="100%"></iframe>
				<script data-widgety="true" src="https://www.widgety.co.uk/assets/widgety_iframe-338e444fa45e2af836a1c162ed7b7fa3b57d6267f6e30c026f7d582a77e34dd7.js"></script>
				<script data-widgety="true" src="https://www.widgety.co.uk/assets/deep_linking_iframe-4355a96984c672f2dbc8ef1db67edcde1065f89371539db26a3483f3a6551479.js">
				</script><script src="https://www.widgety.co.uk/assets/widgety_cruise_tour_search_navigation_script-e5c46a5521b82182ecdc1564d7f90c5cfb653f3ffed29c4220e85749607af1de.js"></script>

				<!-- <script>
					async function loadCruiseData() {
						const url = 'https://www.widgety.co.uk/widgets/cruise_tour_searches/twSfxpVB1etB3zAL1yA6/dates/NCLGWY-20251114-05-MIA-MIA.json';
						const response = await fetch(url);
						const data = await response.json();
						renderCruiseWidget(data.response.date);
					}
					function renderCruiseWidget(date) {
						const container = document.getElementById('cruise-widget');
						container.innerHTML = `
							<h2>${date.holiday.title}</h2>
							<p><strong>Ship:</strong> ${date.ship.title}</p>
							<p><strong>Departure:</strong> ${new Date(date.date_from).toDateString()}</p>
							<p><strong>From:</strong> ${date.start_date_location.name}</p>
							<p><strong>To:</strong> ${date.end_date_location.name}</p>
							<img src="${date.operator_profile_image.medium_url}" alt="Operator Logo" />
							<h3>Available Cabins:</h3>
							<ul>${date.pricings[0].pricing_prices.map(p => `
								<li>${p.grade_name}: £${p.double_price_pp}</li>
							`).join('')}</ul>
						`;
					}
					loadCruiseData()
				</script> -->



				<!-- <style>
					iframe, .StyledComponents__SliderWrapper-sc-msd6jg-1 {
						max-height: 600px !important;
						border-radius: 8px;
					}
				</style>
				<?php
					// $widgetUrl = "https://www.widgety.co.uk/widgets/twSfxpVB1etB3zAL1yA6/holidays/NCLGWY-20251114-05-MIA-MIA.widget";
					// echo file_get_contents($widgetUrl);
				?>
				<script>
					function enableAutoResize(iframe) {
						function resize() {
							iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
						}
						iframe.addEventListener('load', resize);
						window.addEventListener('resize', resize);
					}
				</script> -->




			</div>

		</section>


<?php
	require 'sections/contact-boxes.php';
require 'sections/footer.php';
?>
