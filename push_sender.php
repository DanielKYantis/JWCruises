<?php
function b64url($data) { return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); }
$keys = require __DIR__ . '../config/push_keys.php';
if (empty($keys['private']) && empty($keys['private_pem'])) { http_response_code(500); echo "Set private or private_pem in config/push_keys.php\n"; exit; }
$subsFile = __DIR__ . '/push_subscribers.json';
if (!file_exists($subsFile)) { echo "No subscribers.\n"; exit; }
$subs = json_decode(file_get_contents($subsFile), true);
if (!$subs) { echo "No subscribers.\n"; exit; }
$now = time(); $exp = $now + 12*3600;
$jwtHeader = b64url(json_encode(['typ'=>'JWT','alg'=>'ES256']));
$sent=0;$failed=0;
foreach ($subs as $sub) {
  $endpoint = $sub['endpoint'] ?? null;
  if (!$endpoint) { $failed++; continue; }
  $parts = parse_url($endpoint);
  if (!$parts || empty($parts['scheme']) || empty($parts['host'])) { $failed++; continue; }
  $aud = $parts['scheme'] . '://' . $parts['host'];
  $jwtPayload = b64url(json_encode(['aud'=>$aud,'exp'=>$exp,'sub'=>$keys['subject']]));
  if (!empty($keys['private_pem'])) {
    $pkey = openssl_pkey_get_private($keys['private_pem']);
  } else {
    http_response_code(500);
    echo "Provide 'private_pem' in config/push_keys.php (EC prime256v1) to send pushes.\n";
    exit;
  }
  $sig=''; openssl_sign("$jwtHeader.$jwtPayload", $sig, $pkey, OPENSSL_ALGO_SHA256);
  $jwt="$jwtHeader.$jwtPayload.".b64url($sig);
  $headers = ["Authorization: WebPush $jwt","TTL: 60","Content-Length: 0"];
  $ch=curl_init($endpoint); curl_setopt($ch,CURLOPT_POST,true); curl_setopt($ch,CURLOPT_HTTPHEADER,$headers); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); curl_setopt($ch,CURLOPT_TIMEOUT,15);
  $resp=curl_exec($ch); $code=curl_getinfo($ch,CURLINFO_HTTP_CODE); $err=curl_error($ch); curl_close($ch);
  if ($code>=200 && $code<300) $sent++; else $failed++;
}
header('Content-Type: text/plain; charset=utf-8'); echo "Sent: $sent, Failed: $failed\n";
