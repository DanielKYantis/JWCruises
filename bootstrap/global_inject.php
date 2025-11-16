<?php
// global_inject.php — sitewide HTML rewriter for PWA + offline forms

if (PHP_SAPI === 'cli') { return; }

// Skip non-HTML routes and assets
$uri = $_SERVER['REQUEST_URI'] ?? '';
if (preg_match('~\.(css|js|png|jpe?g|webp|svg|gif|ico|woff2?|ttf|eot|json|xml|txt|map)$~i', $uri)) { return; }

// Optional: skip admin areas
if (preg_match('~/(admin|xadmin|wp-admin|vendor|node_modules)(/|$)~i', $uri)) { return; }

ob_start(function ($html) {
  // Only process HTML
  if (stripos($html, '<html') === false) { return $html; }

  // 1) Ensure manifest link in <head>
  if (stripos($html, 'rel="manifest"') === false && stripos($html, "rel='manifest'") === false) {
    $html = preg_replace(
      '~</head\s*>~i',
      "\n<link rel=\"manifest\" href=\"/manifest.json\">\n</head>",
      $html, 1
    );
  }

  // 2) Add class="syncable" to POST forms (non-admin pages only)
  $html = preg_replace_callback(
    '~<form\b[^>]*\bmethod\s*=\s*([\'\"])post\1[^>]*>~i',
    function ($m) {
      $tag = $m[0];
      // already has class attr?
      if (preg_match('~\bclass\s*=\s*([\'\"])~i', $tag)) {
        // append syncable to first class attr
        return preg_replace('~(\bclass\s*=\s*([\'\"]))([^\'"]*)~i', '$1$3 syncable', $tag, 1);
      }
      // add new class attr before '>'
      return rtrim(substr($tag, 0, -1)) . ' class="syncable">';
    },
    $html
  );

  // 3) Inject loader scripts before </body> once
  $needsInit   = (stripos($html, '/assets/js/pwa-init.js') === false);
  $needsForms  = (stripos($html, '/assets/js/contact.js') === false);
  if (($needsInit || $needsForms) && preg_match('~</body\s*>~i', $html)) {
    $inject = [];
    if ($needsInit)  { $inject[] = '<script defer src="/assets/js/pwa-init.js"></script>'; }
    if ($needsForms) { $inject[] = '<script defer src="/assets/js/contact.js"></script>'; }
    $html = preg_replace('~</body\s*>~i', "\n" . implode("\n", $inject) . "\n</body>", $html, 1);
  }

  return $html;
});
