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
<main class="cruise-jw">
  <h1><?= htmlspecialchars($date['holiday']['title'] ?? 'Untitled') ?></h1>
  <p><strong>Ship:</strong> <?= htmlspecialchars($date['ship']['title'] ?? 'Unknown') ?></p>
  <p><strong>From:</strong> <?= htmlspecialchars($date['start_date_location']['name'] ?? '') ?> 
     <strong>To:</strong> <?= htmlspecialchars($date['end_date_location']['name'] ?? '') ?></p>
  <p><strong>Dates:</strong> <?= date('M d, Y', strtotime($date['date_from'])) ?> 
     - <?= date('M d, Y', strtotime($date['date_to'])) ?></p>
  <div class="gallery">
    <?php foreach ($date['days'][0]['day_locations'][0]['cover_images'] ?? [] as $img): ?>
      <figure>
        <img src="<?= htmlspecialchars($img['medium_url']) ?>" alt="">
        <figcaption><?= htmlspecialchars($img['credit'] ?? '') ?></figcaption>
      </figure>
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
<style>
.cruise-jw { font-family: 'Helvetica Neue', sans-serif; padding: 30px; color: #222; }
.cruise-jw h1 { color: #009977; margin-bottom: 10px; }
.cruise-jw .gallery { display: flex; flex-wrap: wrap; gap: 10px; }
.cruise-jw .gallery img { width: 250px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
.cruise-jw .itinerary section { margin: 20px 0; border-top: 1px solid #ccc; padding-top: 10px; }
</style>
<?php require 'sections/footer.php'; ?>
