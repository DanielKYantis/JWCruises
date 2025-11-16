<?php
/**
 * CruiseDirect API Fetcher + Visual JSON Viewer
 * Usage:
 *   1️⃣ Open directly to enter a Cruise Package ID
 *   2️⃣ Or go to: fetch_cruise_viewer.php?package_id=1617496
 */

function fetch_cruise_data($package_id) {
    $url = "https://book.cruisedirect.com/nitroapi/v2/cruise?pageSize=9&fetchFacets=false&groupByItineraryId=false&applyExchangeRates=true&ignoreCruiseTaxInclusivePref=true&includeFacets=availableCategory&requestSource=1";

    $body = json_encode([
        "filters" => [
            ["key" => "id", "values" => [$package_id]],
            new stdClass()
        ]
    ]);

    $headers = [
        "Accept: application/json, text/plain, */*",
        "Content-Type: application/json",
        "devicetype: Desktop",
        "languageid: 1",
        "siteitemid: 294662",
        "uniquetid: " . uniqid("JWCRUISES_")
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_REFERER => "https://book.cruisedirect.com/",
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_TIMEOUT => 20
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($error) return ["error" => "cURL Error: $error"];
    if ($http_code !== 200) return ["error" => "HTTP Error $http_code", "raw" => $response];

    $data = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return ["error" => "Invalid JSON from API", "raw" => $response];
    }

    return $data;
}

// Handle request
$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : 0;
$data = null;
if ($package_id > 0) {
    $data = fetch_cruise_data($package_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CruiseDirect API Viewer</title>
<style>
body {
  font-family: 'Inter', sans-serif;
  background: #f5f7fa;
  margin: 0;
  padding: 0;
}
.container {
  max-width: 900px;
  margin: 40px auto;
  background: white;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  padding: 20px 30px;
}
h1 {
  font-size: 22px;
  margin-bottom: 15px;
  text-align: center;
}
form {
  display: flex;
  justify-content: center;
  margin-bottom: 25px;
}
input[type="number"] {
  width: 200px;
  padding: 8px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-right: 10px;
}
button {
  background: #007bff;
  color: white;
  border: none;
  padding: 8px 14px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 500;
}
button:hover {
  background: #0056b3;
}
pre {
  background: #1e1e1e;
  color: #dcdcdc;
  padding: 16px;
  border-radius: 8px;
  overflow-x: auto;
  white-space: pre-wrap;
}
.toggle {
  cursor: pointer;
  color: #9cdcfe;
}
.key { color: #9cdcfe; }
.string { color: #ce9178; }
.number { color: #b5cea8; }
.boolean { color: #569cd6; }
.null { color: #808080; }
</style>

<link rel="manifest" href="/manifest.json">
</head>
<body>
<div class="container">
  <h1>🛳️ CruiseDirect API Data Viewer</h1>
  <form method="GET">
    <input type="number" name="package_id" placeholder="Enter Cruise Package ID" value="<?= htmlspecialchars($package_id ?: '') ?>" required>
    <button type="submit">Fetch Data</button>
  </form>

  <?php if ($data): ?>
    <h3>Results for Package ID <?= htmlspecialchars($package_id) ?>:</h3>
    <pre id="json"></pre>
    <script>
    const data = <?= json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>;

    function syntaxHighlight(json) {
        if (typeof json != 'string') {
            json = JSON.stringify(json, undefined, 2);
        }
        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
            let cls = 'number';
            if (/^"/.test(match)) {
                if (/:$/.test(match)) {
                    cls = 'key';
                } else {
                    cls = 'string';
                }
            } else if (/true|false/.test(match)) {
                cls = 'boolean';
            } else if (/null/.test(match)) {
                cls = 'null';
            }
            return '<span class="' + cls + '">' + match + '</span>';
        });
    }

    document.getElementById('json').innerHTML = syntaxHighlight(data);
    </script>
  <?php elseif ($package_id): ?>
    <p style="color:red;">No data returned. Check the Package ID or API availability.</p>
  <?php endif; ?>
</div>

<script src="/assets/js/pwa-init.js" defer></script>
<script src="/assets/js/contact.js" defer></script>
</body>
</html>
