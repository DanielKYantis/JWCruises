<?php if (!isset($_GET['id']) || !is_numeric($_GET['id'])) { http_response_code(400); exit('Invalid image ID.'); }
  else { require_once 'users/init.php'; }
if (!$image = fetchOne($pdo,'SELECT mime, data FROM images WHERE id = :id', [':id'=>(int)$_GET['id']])) { http_response_code(404); exit('Image not found.'); }

header_remove('Pragma');
header_remove('Expires');
header('Cache-Control: public, max-age=604800, immutable'); // 7 days

header('Content-Type: ' . $image['mime']);
header('Content-Length: ' . strlen($image['data']));
echo $image['data'];
