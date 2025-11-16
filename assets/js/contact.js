// Universal offline form handler + toast
(function() {
  document.addEventListener("DOMContentLoaded", () => {
    const forms = Array.from(document.querySelectorAll("form"));
    forms.forEach(form => {
      const action = (form.getAttribute("action") || "").toLowerCase();
      const isTarget =
        form.classList.contains("syncable") ||
        /\/forms\/(contact|newsletter|register)\.php$/.test(action);
      if (isTarget) form.addEventListener("submit", e => handleSubmit(e, form));
    });
  });

  async function handleSubmit(e, form) {
    e.preventDefault();
    const formData = new FormData(form);
    const body = new URLSearchParams(formData).toString();
    const url = form.action || location.pathname;

    try {
      if ('serviceWorker' in navigator && 'SyncManager' in window) {
        const db = await openDB("formDB", 1, {
          upgrade(db) {
            if (!db.objectStoreNames.contains("forms")) db.createObjectStore("forms", { keyPath: "id", autoIncrement: true });
          }
        });
        const tx = db.transaction("forms", "readwrite");
        tx.objectStore("forms").add({ url, data: body });
        const reg = await navigator.serviceWorker.ready;
        await reg.sync.register("contactQueue");
        showToast("📡 You're offline. We'll send your message when back online.");
      } else {
        const res = await fetch(url, { method: "POST", headers: { "Content-Type": "application/x-www-form-urlencoded" }, body });
        if (res.ok) showToast("✅ Submitted.");
        else showToast("⚠️ Submit failed.");
      }
    } catch (err) {
      showToast("⚠️ Submit queued.");
    }
  }

  function showToast(message) {
    const el = document.createElement("div");
    el.textContent = message;
    Object.assign(el.style, {
      position: "fixed", bottom: "20px", left: "50%", transform: "translateX(-50%)",
      background: "#0a1a2f", color: "#fff", padding: "10px 16px", borderRadius: "8px",
      boxShadow: "0 2px 6px rgba(0,0,0,.35)", fontFamily: "sans-serif", zIndex: 100000,
      opacity: 0, transition: "opacity .4s ease"
    });
    document.body.appendChild(el);
    requestAnimationFrame(() => el.style.opacity = 1);
    setTimeout(() => { el.style.opacity = 0; setTimeout(() => el.remove(), 400); }, 3500);
  }

  function openDB(name, version, { upgrade }) {
    return new Promise((resolve, reject) => {
      const req = indexedDB.open(name, version);
      req.onupgradeneeded = e => upgrade(e.target.result);
      req.onsuccess = e => resolve(e.target.result);
      req.onerror = e => reject(e);
    });
  }
})();
