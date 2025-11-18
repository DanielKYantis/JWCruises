<?php require 'sections/header.php';
	header("Access-Control-Allow-Origin: https://www.widgety.co.uk");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	header("Access-Control-Allow-Credentials: true");
	header_remove("X-Frame-Options");
	// header("Content-Security-Policy: frame-src 'self' https://www.widgety.co.uk; child-src 'self' https://www.widgety.co.uk;");
?>
		<section id="featured" class="featured-programs section">

			<div class="container section-title">
				<span class="description-title">Widgety Test</span>
				<h2>This is a test</h2>
				<p>for testing only, this is only a test</p>
			</div>

			<div class="container-fluid">

				<iframe class="widgety-cruise-tour-search" frameborder="0" width="100%" height="600" preview-nav="false" results-nav="false" tabs="false" crossorigin=use-credentials src="//www.widgety.co.uk/widgets/twSfxpVB1etB3zAL1yA6/holidays/NCLGWY-20251114-05-MIA-MIA.widget"></iframe>

				<script data-widgety="true" src="https://www.widgety.co.uk/assets/widgety_iframe-338e444fa45e2af836a1c162ed7b7fa3b57d6267f6e30c026f7d582a77e34dd7.js"></script>

				<script data-widgety="true" src="https://www.widgety.co.uk/assets/deep_linking_iframe-4355a96984c672f2dbc8ef1db67edcde1065f89371539db26a3483f3a6551479.js"></script>

				<script src="https://www.widgety.co.uk/assets/widgety_cruise_tour_search_navigation_script-e5c46a5521b82182ecdc1564d7f90c5cfb653f3ffed29c4220e85749607af1de.js"></script>

			</div>

		</section>

<?php
	require 'sections/contact-boxes.php';
require 'sections/footer.php';
?>
