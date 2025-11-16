<?php
require 'sections/header.php';
$cruiseID = $_GET['cruiseID'] ?? '';
if (!$cruiseID) { echo "<p>No cruise ID provided.</p>"; require 'sections/footer.php'; exit; }
$dataPath = __DIR__ . "/data/{$cruiseID}.json";
$apiURL = "https://www.widgety.co.uk/widgets/cruise_tour_searches/twSfxpVB1etB3zAL1yA6/dates/{$cruiseID}.json";
if (!file_exists($dataPath) || time() - filemtime($dataPath) > 600) {
  $json = @file_get_contents($apiURL);
  if ($json) file_put_contents($dataPath, $json);
}
$json = file_exists($dataPath) ? file_get_contents($dataPath) : '';
$data = json_decode($json, true);
if (!$data || !isset($data['response']['date'])) { echo "<p>Unable to load cruise details.</p>"; require 'sections/footer.php'; exit; }
$date = $data['response']['date'];
?>
<main class="cruise-widgety">
  <h1><?= htmlspecialchars($date['holiday']['title'] ?? 'Untitled') ?></h1>
  <div id="map" class="map"></div>
  <div class="slider">
    <?php foreach ($date['days'][0]['day_locations'][0]['cover_images'] ?? [] as $img): ?>
      <img src="<?= htmlspecialchars($img['big_url']) ?>" alt="">
    <?php endforeach; ?>
  </div>
  <div class="itinerary">
    <?php foreach ($date['days'] ?? [] as $day): ?>
      <section>
        <h3>Day <?= $day['day'] ?> — <?= htmlspecialchars($day['day_name']) ?></h3>
        <div><?= $day['day_locations'][0]['description'] ?? '' ?></div>
      </section>
    <?php endforeach; ?>
  </div>
</main>
<link rel="stylesheet" href="/assets/vendor/mapbox/mapbox-gl.css">
<script src="/assets/vendor/mapbox/mapbox-gl.js"></script>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiaWNydWlzZSIsImEiOiI3enBKbmdVIn0.fZ7xpdtCSEvCSf0qtcXzag';
const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-80.19179, 25.76168],
  zoom: 4
});
</script>
<style>
.cruise-widgety { font-family: Arial, sans-serif; padding: 20px; }
.cruise-widgety h1 { color: #009977; }
.slider img { width: 100%; max-height: 400px; object-fit: cover; margin-bottom: 10px; }
.itinerary section { margin-bottom: 20px; }
</style>
<?php require 'sections/footer.php'; ?>
