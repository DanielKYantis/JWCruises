<?php
date_default_timezone_set('UTC');
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$extra = $_POST;
unset($extra['name'], $extra['email'], $extra['message']);
if (!$email && !$message && !$name) { http_response_code(400); echo "Invalid submission"; exit; }
$line = sprintf("[%s] name=%s email=%s message=%s extra=%s\n",
  date('c'),
  str_replace(["\n","\r"], ' ', $name),
  str_replace(["\n","\r"], ' ', $email),
  str_replace(["\n","\r"], ' ', $message),
  json_encode($extra, JSON_UNESCAPED_SLASHES)
);
file_put_contents(__DIR__ . '/contact_log.txt', $line, FILE_APPEND);
header('Content-Type: text/plain; charset=utf-8');
echo "OK";
