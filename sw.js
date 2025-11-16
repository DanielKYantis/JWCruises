// JW Cruises Service Worker
const VERSION = "v1.15";
const CACHE_NAME = `JWCruises-${VERSION}`;
const ASSETS = [
  "./", "./home.php", "./about-us.php", "./contact-us.php", "./all-cruises.php", "./general-faqs.php", "./faqs-by-region.php", "./privacy-policy.php", "./terms-of-service.php", "./404.php",
  "./assets/js/main.js", "./assets/js/plugins.js", "./assets/js/contact.js", "./assets/js/pwa-init.js",  "./assets/vendor/bootstrap/js/bootstrap.bundle.min.js", "./assets/vendor/jquery/jquery.js",
  "./assets/css/main.css", "./assets/css/plugins.css", "./assets/vendor/aos/aos.css", "./assets/vendor/bootstrap/css/bootstrap.min.css",
];

// const CACHE_ASSETS = [
  // location.href,
  // ...performance.getEntriesByType('resource').map(r => r.name),
// ];

self.addEventListener("install", e => {
  e.waitUntil(
    caches.open(CACHE_NAME).then(cache => cache.addAll(ASSETS)).then(() => self.skipWaiting())
  );
});

self.addEventListener("activate", e => {
  e.waitUntil(
    caches.keys().then(keys => Promise.all(keys.filter(k => k !== CACHE_NAME).map(k => caches.delete(k))))
  );
  self.clients.claim();
});

const PREFETCH_MAX_BYTES = 10 * 1024 * 1024; // 10 MiB

self.addEventListener('message', (event) => {
  const data = event.data || {};
  if (!data || data.cmd !== 'prefetch') return;

  const urls = Array.isArray(data.url) ? data.url : [data.url];

  // Keep the worker alive while we fetch/cache
  event.waitUntil((async () => {
    const cache = await caches.open(CACHE_NAME);
    const results = [];

    for (const url of urls) {
      try {
        // Skip if already cached
        const already = await cache.match(url);
        if (already) { results.push({ url, status: 'already-cached' }); continue; }

        // HEAD to check size (best-effort)
        let allowFetch = true;
        try {
          const head = await fetch(url, { method: 'HEAD', credentials: 'same-origin' });
          if (head && head.ok) {
            const len = head.headers.get('content-length');
            if (len && Number(len) > PREFETCH_MAX_BYTES) {
              allowFetch = false;
              results.push({ url, status: 'skipped-too-large', size: Number(len) });
            }
          }
        } catch (e) {
          // HEAD may fail on some servers; fall through to GET
          allowFetch = true;
        }

        if (!allowFetch) continue;

        // Fetch full resource (server must return 200 for unconditional GET)
        const resp = await fetch(new Request(url, { method: 'GET', credentials: 'same-origin' }));
        if (!resp || !resp.ok || resp.status !== 200) {
          results.push({ url, status: 'network-failed', statusCode: resp && resp.status });
          continue;
        }

        // Double-check content-length after fetch (if provided)
        const cl = resp.headers.get('content-length');
        if (cl && Number(cl) > PREFETCH_MAX_BYTES) {
          results.push({ url, status: 'skipped-too-large-after-fetch', size: Number(cl) });
          continue;
        }

        // Store in cache
        await cache.put(url, resp.clone());
        results.push({ url, status: 'cached' });
      } catch (err) {
        results.push({ url, status: 'error', message: String(err) });
      }
    }

    // Reply to the originating client if possible, else broadcast
    try {
      if (event.source && event.source.postMessage) {
        event.source.postMessage({ cmd: 'prefetch-done', results });
      } else {
        const clientsList = await self.clients.matchAll({ includeUncontrolled: true });
        clientsList.forEach(c => c.postMessage({ cmd: 'prefetch-done', results }));
      }
    } catch (e) {
      // ignore postMessage errors
    }

    return results;
  })());
});

// Network first with cache fallback + offline notice
// self.addEventListener("fetch", e => {
  // if (e.request.method !== "GET") return;
  // e.respondWith(
  //   fetch(e.request).then(res => {
  //     const copy = res.clone();
  //     caches.open(CACHE_NAME).then(c => c.put(e.request, copy));
  //     return res;
  //   }).catch(async () => {
  //     const cached = await caches.match(e.request);
  //     notifyClients("offline");
  //     return cached || new Response("Offline", { status: 503, statusText: "Offline" });
  //   })
  // );
// });

self.addEventListener("fetch", event => {

  const HERO_URL = '/assets/img/hero/video-1.mp4';

  const req = event.request;
  if (req.method === 'GET') {
    try {
      const url = new URL(req.url);

      if (url.pathname === HERO_URL) {
        event.respondWith((async () => {
          const cache = await caches.open(CACHE_NAME);
          const cached = await cache.match(HERO_URL);

          // Range requests: return 206 slices from cached full file
          if (req.headers.has('range')) {
            // ensure we have the full file cached; otherwise try network then cache
            let full = cached;
            if (!full) {
              const net = await fetch(HERO_URL);
              if (!net || !net.ok || net.status !== 200) return net;
              await cache.put(HERO_URL, net.clone());
              full = net;
            }

            const buf = await full.arrayBuffer();
            const size = buf.byteLength;
            const rangeHeader = req.headers.get('range') || '';
            const m = /bytes=(\d+)-(\d+)?/.exec(rangeHeader);
            const start = m ? Number(m[1]) : 0;
            const end = m && m[2] ? Number(m[2]) : size - 1;
            const realEnd = Math.min(end, size - 1);
            const chunk = buf.slice(start, realEnd + 1);

            return new Response(chunk, {
              status: 206,
              statusText: 'Partial Content',
              headers: {
                'Content-Type': 'video/mp4',
                'Content-Range': `bytes ${start}-${realEnd}/${size}`,
                'Accept-Ranges': 'bytes',
                'Content-Length': String(chunk.byteLength),
                'Cache-Control': 'public, max-age=31536000, immutable'
              }
            });
          }

          // Non-range: return cached or network+cache
          if (cached) return cached;
          try {
            const net = await fetch(HERO_URL);
            if (net && net.ok && net.status === 200) {
              await cache.put(HERO_URL, net.clone());
            }
            return net;
          } catch (err) {
            // offline fallback
            const fallback = await cache.match(HERO_URL);
            if (fallback) return fallback;
            return new Response('Offline', { status: 503, statusText: 'Offline' });
          }
        })());
        return; // important: stop further fetch handling
      }
    } catch (e) {
      // if URL parsing fails, continue to general handler
    }
  }


  // const req = event.request;

  // Cache only GET navigations/assets
  if (req.method !== "GET") return;

  // Chrome quirk: avoid errors with only-if-cached + cross-origin
  if (req.cache === "only-if-cached" && req.mode !== "same-origin") return;

  // Never cache range requests (produce 206)
  if (req.headers.has("range")) {
    event.respondWith(fetch(req));
    return;
  }

  event.respondWith((async () => {
    try {
      const res = await fetch(req);

      // Decide cacheability
      const url = new URL(req.url);
      const sameOrigin = url.origin === location.origin;

      const dest = req.destination; // 'document', 'script', 'style', 'image', 'font', 'worker', 'video', 'audio', etc.
      const isDoc = dest === "document";
      const isStatic = dest === "script" || dest === "style" || dest === "image" || dest === "font" || dest === "worker";

      // Disqualifiers
      const isPartial = res.status === 206 || res.headers.has("Content-Range") || res.headers.get("Accept-Ranges") === "bytes";
      const isOpaque  = res.type === "opaque";
      const isMedia   = dest === "video" || dest === "audio";
      const badStatus = res.status !== 200;

      const cacheable =
        sameOrigin &&
        !badStatus &&
        !isPartial &&
        !isOpaque &&
        !isMedia &&
        (isDoc || isStatic);

      // Write to cache only when safe
      if (cacheable) {
        const cache = await caches.open(CACHE_NAME);
        // Ignore Vary mismatches on match; but put uses exact key
        await cache.put(req, res.clone());
      }

      return res;
    } catch (err) {
      notifyClients("offline");
      // Offline fallback
      const cached = await caches.match(req, { ignoreVary: true });
      if (cached) return cached;

      // For navigations, try root as a last resort
      if (req.mode === "navigate") {
        const root = await caches.match("/", { ignoreVary: true });
        if (root) return root;
      }

      return new Response("Offline", { status: 503, statusText: "Offline" });
    }
  })());
});

function notifyClients(status) {
  self.clients.matchAll({ includeUncontrolled: true }).then(clients => {
    clients.forEach(c => c.postMessage({ status }));
  });
}

// ---- PUSH NOTIFICATIONS ----
self.addEventListener("push", e => {
  let data = {}
  try { data = e.data ? e.data.json() : {}; } catch(_e) { data = {}; }
  const title = data.title || "JW Cruises";
  const options = {
    body: "JW Cruises – New update available – click to see details",
    icon: "/favicon.png",
    badge: "/favicon.png",
    data: { url: "/home.php" }
  };
  e.waitUntil(self.registration.showNotification(title, options));
});

self.addEventListener("notificationclick", e => {
  e.notification.close();
  e.waitUntil(
    clients.matchAll({ type: "window", includeUncontrolled: true }).then(winClients => {
      const match = winClients.find(c => c.url.includes(e.notification.data.url));
      if (match) return match.focus();
      return clients.openWindow(e.notification.data.url);
    })
  );
});

// ---- BACKGROUND SYNC: generic form queue ----
const FORM_QUEUE = "contactQueue";

self.addEventListener("sync", e => {
  if (e.tag === FORM_QUEUE) e.waitUntil(sendQueuedForms());
});

async function sendQueuedForms() {
  const db = await openDB("formDB", 1, {
    upgrade(db) {
      if (!db.objectStoreNames.contains("forms")) db.createObjectStore("forms", { keyPath: "id", autoIncrement: true });
    }
  });
  const tx = db.transaction("forms", "readwrite");
  const store = tx.objectStore("forms");
  const all = await store.getAll();
  for (const item of all) {
    try {
      await fetch(item.url, {
        method: "POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body: item.data
      });
      await store.delete(item.id);
    } catch (err) {
      // keep for retry
    }
  }
}

function openDB(name, version, { upgrade }) {
  return new Promise((resolve, reject) => {
    const req = indexedDB.open(name, version);
    req.onupgradeneeded = e => upgrade(e.target.result);
    req.onsuccess = e => resolve(e.target.result);
    req.onerror = e => reject(e);
  });
}
