const VERSION = "v2";
const CACHE_NAME = `JWCruises-${VERSION}`;
const ASSETS = [
  "./", "./home.php", "./about-us.php", "./contact-us.php", "./all-cruises.php", "./general-faqs.php", "./faqs-by-region.php", "./privacy-policy.php", "./terms-of-service.php", "./404.php",
  "./assets/js/main.js", "./assets/js/plugins.js", "./assets/vendor/bootstrap/js/bootstrap.bundle.min.js", "./assets/vendor/jquery/jquery.js",
  "./assets/css/main.css", "./assets/css/plugins.css", "./assets/vendor/aos/aos.css", "./assets/vendor/bootstrap/css/bootstrap.min.css",
];
const CACHE_ASSETS = [
  location.href,
  ...performance.getEntriesByType('resource').map(r => r.name),
];

// importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');
// // importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js');
//
// if (workbox) { console.log(`Yay! Workbox is loaded 🎉`);
//
  // workbox.core.setCacheNameDetails({
  //   prefix: 'JWCruises',
  //   suffix: 'v2',
  //   precache: 'precache',
  //   runtime: 'run-time',
  // });
//
  // workbox.precaching.precacheAndRoute(self.__WB_MANIFEST);
//
  // workbox.routing.registerRoute(
  //   /^https:\/\/fonts\.googleapis\.com/,
  //   new workbox.strategies.StaleWhileRevalidate({
  //     cacheName: 'google-fonts-stylesheets',
  //   }),
  // );
//
  // workbox.routing.registerRoute(
  //   /^https:\/\/fonts\.gstatic\.com/,
  //   new workbox.strategies.CacheFirst({
  //     cacheName: 'google-fonts-webfonts',
  //     plugins: [
  //       new workbox.cacheableResponse.Plugin({ statuses: [0, 200] }),
  //       new workbox.expiration.Plugin({ maxAgeSeconds: 60 * 60 * 24 * 365 }),
  //     ],
  //   }),
  // );
//
  // workbox.routing.registerRoute(
  //   new RegExp('/css/'),
  //   new workbox.strategies.StaleWhileRevalidate({
  //     cacheName: 'css-cache',
  //     plugins: [
  //       new workbox.expiration.Plugin({ maxAgeSeconds: 15 * 24 * 60 * 60 * 365, maxEntries: 10 }),
  //     ]
  //   })
  // );
//
  // workbox.routing.registerRoute(
  //   new RegExp('/js/'),
  //   new workbox.strategies.StaleWhileRevalidate({
  //     cacheName: 'js-cache',
  //     plugins: [
  //       new workbox.expiration.Plugin({ maxAgeSeconds: 15 * 24 * 60 * 60 * 365, maxEntries: 10 }),
  //     ]
  //   })
  // );
//
  // workbox.routing.registerRoute(
  //   new RegExp('/media/'),
  //   new workbox.strategies.StaleWhileRevalidate({
  //     cacheName: 'img-cache',
  //     plugins: [
  //       new workbox.expiration.Plugin({ maxAgeSeconds: 15 * 24 * 60 * 60 * 365, maxEntries: 10 }),
  //     ]
  //   })
  // );
//
// } else { console.log(`Boo! Workbox didn't load 😬`); }
//
// self.addEventListener("install", (event) => {
  // event.waitUntil(
  //   caches.open(CACHE_NAME)
  //   .then((cache) =>
  //     cache.addAll(CACHE_ASSETS),
  //   ),
  // );
// });
//
// self.addEventListener("fetch", (event) => {
  // event.respondWith(
  //   caches.match(event.request).then((response) => {
  //     if (response !== undefined) { return response; }
  //     else {
  //       return fetch(event.request)
  //       .then((response) => {
  //         let responseClone = response.clone();
  //         caches.open(CACHE_NAME).then((cache) => {
  //           cache.put(event.request, responseClone);
  //         });
  //         return response;
  //       })
  //       .catch(() => caches.match("/favicon.png"));
  //     }
  //   }),
  // );
// });



///////////////////clear all workers


self.addEventListener('install', e => {
  console.log(e);
  console.log('sw.js : installing');
  self.skipWaiting();
});

self.addEventListener('activate', e => {
  console.log(e);
  self.clients.matchAll({
    type: 'window'
  }).then(windowClients => {
    windowClients.forEach((windowClient) => {
      windowClient.navigate(windowClient.url);
    });
  });
  // self.clients.claim();
  console.log('sw.js : ready');
});


////////////////working worker

// self.addEventListener("install", e => {
  // e.waitUntil(
  //   (async () => {
  //     const cache = await caches.open(CACHE_NAME);
  //     await cache.addAll(CACHE_ASSETS);
  //     self.skipWaiting();
  //   })()
  // );
// });
//
// self.addEventListener("activate", e => {
  // e.waitUntil(
  //   (async () => {
  //     const keys = await caches.keys();
  //     Promise.all(
  //       keys.map(async key => {
  //         if (key !== CACHE_NAME) {
  //           await caches.delete(key);
  //         }
  //       })
  //     );
  //     self.clients.claim();
  //   })()
  // );
// });

// self.addEventListener("fetch", e => {
  // e.respondWith(
  //   (async () => {
  //     return fetch(e.request).catch(() => caches.match(e.request));
  //   })()
  // );
// });
