// Register SW and subscribe for Push
(function() {

  function prefetchViaSW(url, timeout = 30000) {
    if (!('serviceWorker' in navigator)) return Promise.reject('no-sw');

    const msg = { cmd: 'prefetch', url };

    return navigator.serviceWorker.ready.then(reg => {
      return new Promise((resolve, reject) => {
        const called = { done: false };

        // Listener to receive response message from SW
        function onMessage(e) {
          const d = e.data || {};
          if (d && d.cmd === 'prefetch-done' && d.results) {
            // find result for our url
            const result = Array.isArray(d.results) ? d.results.find(r => r.url === url) || d.results : d.results;
            navigator.serviceWorker.removeEventListener('message', onMessage);
            called.done = true;
            resolve(result);
          }
        }
        navigator.serviceWorker.addEventListener('message', onMessage);

        // Post message to active worker if available
        const worker = reg.active || reg.waiting || reg.installing;
        if (worker) {
          try {
            worker.postMessage(msg);
          } catch (err) {
            navigator.serviceWorker.removeEventListener('message', onMessage);
            return reject(err);
          }
        } else {
          navigator.serviceWorker.removeEventListener('message', onMessage);
          return reject('no-active-worker');
        }

        // Timeout fallback
        setTimeout(() => {
          if (!called.done) {
            navigator.serviceWorker.removeEventListener('message', onMessage);
            reject('timeout');
          }
        }, timeout);
      });
    });
  }

  // Example trigger: prefetch on first user interaction or idle
  function scheduleHeroPrefetch() {
    const url = '/assets/img/hero/video-1.mp4';
    // try to request when page is idle
    const run = () => prefetchViaSW(url).then(r => console.log('prefetch result', r)).catch(e => console.warn('prefetch failed', e));
    if ('requestIdleCallback' in window) requestIdleCallback(run, { timeout: 5000 });
    else window.setTimeout(run, 2000);

    // also run on first click/touch as fallback
    const once = () => { scheduleHeroPrefetch = () => {}; document.removeEventListener('click', once); run(); };
    document.addEventListener('click', once, { once: true, passive: true });
  }

  // call it
  // scheduleHeroPrefetch();

  function toUint8(pub) {
    const clean = pub.replace(/\s+/g,'');
    const b64 = clean.replace(/-/g,'+').replace(/_/g,'/');
    const pad = '='.repeat((4 - b64.length % 4) % 4);
    const raw = atob(b64 + pad);
    if (raw.length !== 65 || raw.charCodeAt(0) !== 0x04) {
      throw new Error('Invalid VAPID public key bytes');
    }
    const out = new Uint8Array(65);
    for (let i=0;i<65;i++) out[i] = raw.charCodeAt(i);
    return out;
  }

  if (!('serviceWorker' in navigator)) return;
  // navigator.serviceWorker.register('/sw.js', {scope: './'}).catch(console.error);

  navigator.serviceWorker.ready.then(async reg => {
    try {
      const existing = await reg.pushManager.getSubscription();
      if (!existing) {
        const sub = await reg.pushManager.subscribe({
          userVisibleOnly: true,
          applicationServerKey: toUint8('BDAOK2LeJSoUg3flc9iymV-FvGbr0Py-u_EW-gnx7jVksn0K6kJyW0N1f_cuurYIZJNUelr-l_tbuLCHV4c9e2c')
        });
        await fetch('/subscribe.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(sub)
        });
      }
    } catch (e) {
      console.error('Push subscription failed', e);
    }
  });

  navigator.serviceWorker.addEventListener('message', evt => {
    if (evt.data && evt.data.status === 'offline') {
      showOfflineBanner();
    }
  });
  window.addEventListener('online', hideOfflineBanner);

  function showOfflineBanner() {
    if (document.getElementById('offline-banner')) return;
    const div = document.createElement('div');
    div.id = 'offline-banner';
    div.textContent = "You're offline. Cached content is available.";
    Object.assign(div.style, {
      position:'fixed',left:0,right:0,bottom:0,padding:'12px 16px',
      background:'#0a1a2f',color:'#fff',textAlign:'center',zIndex:99999
    });
    document.body.appendChild(div);
  }
  function hideOfflineBanner() {
    const el = document.getElementById('offline-banner');
    if (el) el.remove();
  }

  function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
    const rawData = atob(base64);
    const outputArray = new Uint8Array(rawData.length);
    for (let i = 0; i < rawData.length; ++i) { outputArray[i] = rawData.charCodeAt(i); }
    return outputArray;
  }

})();
