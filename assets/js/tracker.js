(function () {
	const endpoint = '/track.php';

	function sendEvent(eventType, details = {}) {
		fetch(endpoint, {
			method: 'POST',
			credentials: 'include',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify({
				eventType,
				timestamp: new Date().toISOString(),
				url: window.location.href,
				referrer: document.referrer,
				userAgent: navigator.userAgent,
				screen: {
					width: screen.width,
					height: screen.height
				},
				details
			})
		});
	}

	// Track page view
	sendEvent('page_view');

	// Click tracking
	document.addEventListener('click', (e) => {
		const target = e.target;
		sendEvent('click', {
			tag: target.tagName,
			id: target.id,
			class: target.className,
			text: target.innerText?.slice(0, 100)
		});
	});

	// Throttle mouse move tracking
	let lastSent = 0;
	document.addEventListener('mousemove', (e) => {
		const now = Date.now();
		if (now - lastSent > 1000) { // once per second
			lastSent = now;
			sendEvent('mouse_move', {
				x: e.clientX,
				y: e.clientY
			});
		}
	});
})();
