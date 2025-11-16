<?php
  // $url = 'https://www.widgety.co.uk/widgets/cruise_tour_searches/...json';
  // $json = file_get_contents($url);
  // header('Content-Type: application/json');
  // echo $json;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cruise Widget – JW Cruises</title>

  <style>
    /* --- RESET & BASE STYLES --- */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: system-ui, -apple-system, sans-serif;
      background: #f8f9fa;
      color: #333;
      line-height: 1.5;
      padding: 2rem;
    }

    #cruise-widget {
      max-width: 900px;
      margin: 0 auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      padding: 2rem;
    }

    h1, h2, h3 { color: #00447c; margin-bottom: 0.5rem; }
    p { margin-bottom: 1rem; }

    .cruise-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.5rem;
    }

    .cruise-header img {
      height: 60px;
      object-fit: contain;
    }

    .port-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      margin: 2rem 0;
    }

    .port {
      background: #f1f6fc;
      border: 1px solid #dde5ef;
      border-radius: 8px;
      padding: 1rem;
    }

    .port img {
      width: 100%;
      border-radius: 6px;
      margin-bottom: 0.5rem;
    }

    .prices table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    .prices th, .prices td {
      border-bottom: 1px solid #ddd;
      text-align: left;
      padding: 0.5rem;
    }

    .prices th { background: #f4f6f8; }

    .availability {
      color: #008000;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div id="cruise-widget">
    <h2>Loading cruise information...</h2>
  </div>

  <script>
    async function loadCruiseData() {
      const endpoint = 'https://www.widgety.co.uk/widgets/cruise_tour_searches/twSfxpVB1etB3zAL1yA6/dates/NCLGWY-20251114-05-MIA-MIA.json';
      try {
        const response = await fetch(endpoint);
        if (!response.ok) throw new Error('Failed to fetch data');
        const json = await response.json();
        renderCruise(json.response.date);
      } catch (error) {
        document.getElementById('cruise-widget').innerHTML = '<p>Unable to load cruise data.</p>';
        console.error(error);
      }
    }

    function renderCruise(date) {
      const container = document.getElementById('cruise-widget');
      const daysHTML = date.days.map(day => {
        const location = day.day_locations[0]?.location.name || '—';
        const images = day.day_locations[0]?.cover_images || [];
        const imgHTML = images[0]
          ? `<img src="${images[0].medium_url}" alt="${location}" />`
          : '';
        return `
          <div class="port">
            ${imgHTML}
            <h3>Day ${day.day}: ${location}</h3>
            <p>${day.day_locations[0]?.description.replace(/<\/?p>/g, '') || ''}</p>
          </div>
        `;
      }).join('');

      const pricesHTML = date.pricings[0].pricing_prices.slice(0, 10).map(p => `
        <tr>
          <td>${p.grade_name}</td>
          <td>£${p.double_price_pp}</td>
          <td class="availability">${p.availability}</td>
        </tr>
      `).join('');

      container.innerHTML = `
        <div class="cruise-header">
          <h1>${date.holiday.title}</h1>
          <img src="${date.operator_profile_image.medium_url}" alt="Operator Logo">
        </div>

        <p><strong>Ship:</strong> ${date.ship.title}</p>
        <p><strong>Departure:</strong> ${new Date(date.date_from).toLocaleDateString()}</p>
        <p><strong>From:</strong> ${date.start_date_location.name}</p>
        <p><strong>To:</strong> ${date.end_date_location.name}</p>

        <div class="port-list">${daysHTML}</div>

        <div class="prices">
          <h3>Available Cabins</h3>
          <table>
            <thead>
              <tr><th>Cabin Type</th><th>Price (pp)</th><th>Status</th></tr>
            </thead>
            <tbody>${pricesHTML}</tbody>
          </table>
        </div>
      `;
    }

    loadCruiseData();
  </script>
</body>
</html>
