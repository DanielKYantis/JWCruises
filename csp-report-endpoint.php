<?php
$raw = file_get_contents('php://input');
$ct  = $_SERVER['CONTENT_TYPE'] ?? '';
$ts  = date('c');

if (stripos($ct, 'application/reports+json') !== false) {
  // Reporting API payload (array of reports)
  $data = json_decode($raw, true);
  file_put_contents(__DIR__.'/csp-violations.log',
    json_encode(['ts'=>$ts,'kind'=>'reports+json','data'=>$data], JSON_UNESCAPED_SLASHES)."\n",
    FILE_APPEND);
} else {
  // Legacy CSP report (single object)
  $data = json_decode($raw, true);
  file_put_contents(__DIR__.'/csp-violations.log',
    json_encode(['ts'=>$ts,'kind'=>'csp-report','data'=>$data], JSON_UNESCAPED_SLASHES)."\n",
    FILE_APPEND);
}
http_response_code(204);
?>


<?php
// // Set content type for response
// header('Content-Type: application/json');
//
// // Get raw POST data
// $input = file_get_contents('php://input');
//
// // Decode JSON payload
// $data = json_decode($input, true);
//
// // Log the report to a file (append mode)
// file_put_contents('csp-violations.log', date('c') . " " . print_r($data, true) . "\n", FILE_APPEND);
//
// // Respond to browser
// echo json_encode(["status" => "ok"]);
?>
