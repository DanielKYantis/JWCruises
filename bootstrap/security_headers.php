<?php
// Only for HTML-like routes
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$ext = strtolower(pathinfo($uri, PATHINFO_EXTENSION));
// if (!in_array($ext, ['', 'php', 'html'], true)) { return; }
if (in_array($ext, ['php', 'html', ''], true) || preg_match('/(^|\/)(sw|service-worker)\.js$/i', $uri)) {

  header('X-SERVER-TEST: php-headers', true);

  // Clean up noisy defaults if present
  if (function_exists('header_remove')) {
    @header_remove('X-Powered-By');
    @header_remove('X-Frame-Options');
  }

  // Short default caching
  header('Cache-Control: public, max-age=30', true);

  // Security + privacy
  header('Strict-Transport-Security: max-age=63072000; includeSubDomains; preload', true);
  header('X-Content-Type-Options: nosniff', true);
  header('Referrer-Policy: strict-origin-when-cross-origin', true);
  // Optional: disable obsolete XSS filter
  // header('X-XSS-Protection: 0', true);

  $origin = $_SERVER['HTTP_ORIGIN'] ?? '';
  $allowed = ['https://jwcruises.com', 'https://www.google.com', 'https://www.widgety.co.uk'];
  if (in_array($origin, $allowed, true)) { header("Access-Control-Allow-Origin: $origin"); }
  // elseif (php_sapi_name() !== 'cli') { header("Access-Control-Allow-Origin: https://jwcruises.com"); }
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

  // Reporting endpoints (new + legacy)
  header('Reporting-Endpoints: csp="/csp-report-endpoint.php"', true);
  header('Report-To: {"group":"csp","max_age":10886400,"endpoints":[{"url":"/csp-report-endpoint.php"}],"include_subdomains":true}', true);

  // CSP in Report-Only first. Tight but pragmatic with inline allowed.
  $csp = "default-src 'self'; base-uri 'self'; object-src 'none'; "
       . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
       . "font-src 'self' data: https://fonts.gstatic.com; "
       . "script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://www.google-analytics.com https://www.gstatic.com https://www.google.com https://www.recaptcha.net https://www.widgety.co.uk; "
       . "connect-src 'self' https://www.google-analytics.com https://www.googletagmanager.com https://www.google.com https://www.googleapis.com https://www.gstatic.com https://*.mapbox.com https://www.widgety.co.uk; "
       . "img-src 'self' data: blob: https://www.google-analytics.com https://assets.widgety.co.uk; "
       . "media-src 'self' blob:; "
       . "worker-src 'self' blob:; manifest-src 'self'; "
       . "frame-src 'self' https://www.google.com https://www.gstatic.com https://www.recaptcha.net https://www.widgety.co.uk; "
       . "frame-ancestors 'self' https://www.google.com https://www.widgety.co.uk; "
       . "report-to csp; report-uri /csp-report-endpoint.php";
  header("Content-Security-Policy: upgrade-insecure-requests; $csp", true);
  header("Content-Security-Policy-Report-Only: $csp", true);
} elseif (preg_match('#^/api/#', $uri)) {
  header("Access-Control-Allow-Origin: https://jwcruises.com");
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
}
