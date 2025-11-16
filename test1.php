<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cruise Widget – JW Cruises</title>

  <style>
    /* === Base styling === */
    :root {
      --primary: #00447c;
      --secondary: #0077c8;
      --light-bg: #f5f7fa;
      --border: #e0e6ed;
      --text: #333;
    }

    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      background: var(--light-bg);
      color: var(--text);
      padding: 2rem;
    }

    #cruise-widget {
      max-width: 1000px;
      margin: 0 auto;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      padding: 2rem 2.5rem;
    }

    /* === Header === */
    .cruise-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      border-bottom: 2px solid var(--border);
      padding-bottom: 1rem;
      margin-bottom: 1.5rem;
    }

    .cruise-header h1 {
      color: var(--primary);
      font-size: 1.8rem;
      flex: 1;
      min-width: 240px;
    }

    .cruise-header img {
      height: 60px;
      object-fit: contain;
    }

    /* === Overview === */
    .overview {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem 2rem;
      margin-bottom: 2rem;
      font-size: 1rem;
    }

    .overview p {
      flex: 1 1 200px;
      margin: 0;
    }

    /* === Itinerary Section === */
    .itinerary {
      margin-bottom: 2rem;
    }

    .itinerary h2 {
      font-size: 1.4rem;
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .port-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 1.5rem;
    }

    .port {
      background: var(--light-bg);
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid var(--border);
      display: flex;
      flex-direction: column;
    }

    .port img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .port .info {
      padding: 1rem;
      flex-grow: 1;
    }

    .port h3 {
      font-size: 1.1rem;
      color: var(--secondary);
      margin-bottom: 0.5rem;
    }

    .port p {
      font-size: 0.9rem;
      color: #555;
    }

    /* === Pricing Section === */
    .prices {
      border-top: 2px solid var(--border);
      padding-top: 1rem;
    }

    .prices h2 {
      color: var(--primary);
      font-size: 1.4rem;
      margin-bottom: 1rem;
    }

    .prices table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.95rem;
    }

    .prices th,
    .prices td {
      padding: 0.6rem 0.5rem;
      border-bottom: 1px solid var(--border);
      text-align: left;
    }

    .prices th {
      background: var(--light-bg);
      color: var(--primary);
      font-weight: 600;
    }

    .availability {
      color: #008000;
      font-weight: 600;
      text-transform: capitalize;
    }

    @media (max-width: 600px) {
      .cruise-header {
        flex-direction: column;
        align-items: flex-start;
      }
      .cruise-header img {
        margin-top: 1rem;
      }
    }
  </style>
</head>

<body>
  <div id="cruise-widget">
    <h2>Loading cruise information...</h2>
  </div>

  <script>
    async function loadCruiseData() {
      const url = 'https://www.widgety.co.uk/widgets/cruise_tour_searches/twSfxpVB1etB3zAL1yA6/dates/NCLGWY-20251114-05-MIA-MIA.json';
      try {
        const response = await fetch(url);
        const data = await response.json();
        renderCruise(data.response.date);
      } catch (err) {
        console.error(err);
        document.getElementById('cruise-widget').innerHTML = "<p>Couldn't load data.</p>";
      }
    }

    function renderCruise(date) {
      const container = document.getElementById('cruise-widget');

      const itineraryHTML = date.days.map(day => {
        const loc = day.day_locations?.[0];
        const img = loc?.cover_images?.[0]?.medium_url;
        const desc = loc?.description?.replace(/<\/?p>/g, '') || '';
        return `
          <div class="port">
            ${img ? `<img src="${img}" alt="${loc.location?.name || ''}">` : ''}
            <div class="info">
              <h3>Day ${day.day}: ${loc.location?.name || '—'}</h3>
              <p>${desc}</p>
            </div>
          </div>`;
      }).join('');

      const pricesHTML = date.pricings[0].pricing_prices.map(p => `
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

        <div class="overview">
          <p><strong>Ship:</strong> ${date.ship.title}</p>
          <p><strong>Duration:</strong> ${date.holiday.duration_days} days</p>
          <p><strong>From:</strong> ${date.start_date_location.name}</p>
          <p><strong>To:</strong> ${date.end_date_location.name}</p>
          <p><strong>Departure:</strong> ${new Date(date.date_from).toLocaleDateString()}</p>
        </div>

        <section class="itinerary">
          <h2>Itinerary</h2>
          <div class="port-list">${itineraryHTML}</div>
        </section>

        <section class="prices">
          <h2>Available Cabins</h2>
          <table>
            <thead>
              <tr><th>Cabin Type</th><th>Price (pp)</th><th>Status</th></tr>
            </thead>
            <tbody>${pricesHTML}</tbody>
          </table>
        </section>
      `;
    }

    loadCruiseData();
  </script>
</body>
</html>
