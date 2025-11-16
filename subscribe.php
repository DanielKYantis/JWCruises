<?php
header('Content-Type: application/json');
$body = file_get_contents('php://input');
if (!$body) { http_response_code(400); echo json_encode(['ok'=>false,'err'=>'no body']); exit; }
$sub = json_decode($body, true);
if (!$sub || empty($sub['endpoint'])) { http_response_code(400); echo json_encode(['ok'=>false,'err'=>'invalid']); exit; }
$file = __DIR__ . '/push_subscribers.json';
$lock = fopen($file, 'c+');
if (!$lock) { http_response_code(500); echo json_encode(['ok'=>false,'err'=>'cannot open']); exit; }
flock($lock, LOCK_EX);
$existing = stream_get_contents($lock);
$existing = $existing ? json_decode($existing, true) : [];
if (!is_array($existing)) $existing = [];
$endpoints = array_column($existing, 'endpoint');
if (!in_array($sub['endpoint'], $endpoints, true)) {
  $sub['ts'] = time();
  $existing[] = $sub;
  ftruncate($lock, 0);
  rewind($lock);
  fwrite($lock, json_encode($existing, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));
}
flock($lock, LOCK_UN);
fclose($lock);
echo json_encode(['ok'=>true]);
