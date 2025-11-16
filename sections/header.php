<?php if(file_exists('users/init.php')) require_once 'users/init.php';
else if(file_exists('../users/init.php')) require_once '../users/init.php';
?>
<!DOCTYPE html>
<html lang="en-US" data-bs-theme="auto">
	<head>
		<base href="/">
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<script>if (!isSecureContext) { location.protocol = "https:"; }</script>
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="application-name" content="JW Cruises">
	<?php if (1==3) { ?>
		<!-- <script async defer src="https://www.googletagmanager.com/gtag/js?id=G-D8CY29F3GD"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-D8CY29F3GD');
		</script> -->
	<?php } ?>
	<?php
		$curPage = trim(basename(str_replace(['/','-', '.php'], [' / ',' ', ''], $_SERVER['SCRIPT_NAME'])));
		$uriPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
		$pageURI = $uriPath === '' ? 'home' : $uriPath;
		if ($pageURI === "home") {
			$pageURL = 'https://'.$company["website"].'/';
			$pageTitle = $company["name"].' '.$company["tagline"].'™';
			$pageDesc = $company["description"];
			$pageKeyWords = $company["keywords"];
		} else {
			$pageURL = 'https://'.$company["website"].'/'.$pageURI;
			$pageTitle = $company["name"].' | '.ucwords(str_replace(['/','-', '.php'], [' / ',' ', ''], $pageURI));
			$pageDesc = $company["name"].' '.$company["tagline"].'™ / '.ucwords(str_replace(['/','-', '.php'], [' / ',' ', ''], $pageURI));
			$pageKeyWords = $company["keywords"];
		}
		// log_to_console('curPage: '.pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));
		// log_to_console('pageURI: '.$pageURI);
		// log_to_console('pageURL: '.$pageURL);
		// log_to_console('pageTitle: '.$pageTitle);
		// log_to_console('pageDesc: '.$pageDesc);
		// log_to_console('pageKwrds: '.$pageKeyWords);
		// undefined_function(); // triggers a logged error
		// throw new Exception("Test Exception"); // triggers exception logging
		// log_to_console("This is a debug message");
		// log_to_console("Something went wrong", 'error');
		// log_to_console(["status" => "ok", "count" => 3], 'info');
	?>
		<title><?=$pageTitle?></title>
		<meta name="description" content="<?=$pageDesc?>">
		<meta name="keywords" content="<?=$pageKeyWords?>">

		<meta property="og:locale" content="en_US">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?=$pageURL?>">
		<meta property="og:title" content="<?=$pageTitle?>">
		<meta property="og:description" content="<?=$pageDesc?>">
		<meta property="og:image" content="https://<?=$company['website']?>/assets/img/logo/1200x628.png">
		<meta property="og:image:width" content="1200"/>
		<meta property="og:image:height" content="630"/>
		<meta property="og:image:alt" content="https://<?=$company['website']?>/assets/img/icon/150x150.png">

		<meta property="twitter:card" content="summary">
		<meta property="twitter:url" content="<?=$pageURL?>">
		<meta property="twitter:title" content="<?=$pageTitle?>">
		<meta property="twitter:description" content="<?=$pageDesc?>">
		<meta property="twitter:image" content="https://<?=$company['website']?>/assets/img/logo/1200x628.png">

		<meta itemprop="name" content="<?=$pageTitle?>"/>
		<meta itemprop="url" content="<?=$pageURL?>"/>
		<meta itemprop="description" content="<?=$pageDesc?>"/>
		<meta itemprop="thumbnailUrl" content="https://<?=$company['website']?>/assets/img/icon/150x150.png"/>
		<link rel="image_src" href="https://<?=$company['website']?>/assets/img/logo/1200x628.png" />
		<meta itemprop="image" content="https://<?=$company['website']?>/assets/img/logo/1200x628.png"/>

		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="<?=$pageURL?>">
		<meta name="twitter:title" content="<?=$pageTitle?>">
		<meta name="twitter:description" content="<?=$pageDesc?>">
		<meta name="twitter:image" content="https://<?=$company['website']?>/assets/img/logo/1200x628.png">

		<meta name="DC.title" content="<?=$pageTitle?>" />
		<meta name="geo.region" content="US-TX" />
		<meta name="geo.placename" content="Smithville" />
		<meta name="geo.position" content="30.005628;-97.155908" />
		<meta name="ICBM" content="30.005628, -97.155908" />

		<!-- <link rel="preload" href="<?=$us_url_root?>assets/img/hero/video-1.mp4" as="video" type="video/mp4" crossorigin fetchpriority="high"> -->

		<!-- <link rel="preconnect" href="https://www.google.com" crossorigin> -->
		<!-- <link rel="preconnect" href="https://www.gstatic.com" crossorigin> -->
		<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="canonical"  href="<?=$pageURL?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=$us_url_root?>assets/img/icon/apple-touch-icon.png">


		<link rel="icon" type="image/png" sizes="180x180" href="<?=$us_url_root?>assets/img/icon/apple-touch-icon.png">
		<link rel="manifest" href="<?=$us_url_root?>manifest.json">
		<link rel="home" href="https://<?=$company['website']?>">
		<meta name="msapplication-config" content="<?=$us_url_root?>browserconfig.xml">
		<meta name="msapplication-TileColor" content="#eefffe">
		<meta name="theme-color" content="#009977">

		<link rel="icon" type="image/svg+xml" sizes="any" href="<?=$us_url_root?>assets/img/icon/favicon.svg">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=$us_url_root?>assets/img/icon/favicon.png">
		<link rel="icon" type="image/x-icon" sizes="any" href="<?=$us_url_root?>assets/img/icon/favicon.ico">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
		<!-- <link rel="stylesheet" href="<?=$us_url_root?>assets/vendor/fontawesome/css/all.min.css" /> -->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" /> -->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.min.css" /> -->
		<link rel="stylesheet" href="<?=$us_url_root?>assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="preload" href="<?=$us_url_root?>assets/vendor/bootstrap-icons/bootstrap-icons.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<link rel="stylesheet" href="<?=$us_url_root?>assets/vendor/aos/aos.css">
		<!-- <link rel="stylesheet" href="<?=$us_url_root?>assets/vendor/swiper/swiper-bundle.min.css"> -->
		<link rel="preload" href="<?=$us_url_root?>assets/vendor/glightbox/css/glightbox.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<!-- <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-2.3.2/datatables.min.css" integrity="sha384-d76uxpdVr9QyCSR9vVSYdOAZeRzNUN8A4JVqUHBVXyGxZ+oOfrZVHC/1Y58mhyNg" crossorigin="anonymous"> -->
		<link rel="preload" href="<?=$us_url_root?>assets/vendor/datatables/datatables.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<link rel="stylesheet" href="<?=$us_url_root?>assets/css/plugins.css">
		<link rel="stylesheet" href="<?=$us_url_root?>assets/css/main.css">
		<?php if (1==3) { ?> <!-- <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script> --> <?php } ?>
	</head>

	<body class="page">
		<div id="preloader"></div>
		<!-- <div class="searchBar"> <label><input id="search" type="search" /> Search</label> <span hidden id="powered">(powered by CSS)</span> </div> <ul id="results"></ul> -->

<?php if (1==3) { ?>
		<!-- <script>
			window.dataLayer = window.dataLayer || [];
			function gtag() { dataLayer.push(arguments) };
			gtag('consent', 'default', {  'ad_storage': 'granted', 'ad_user_data': 'granted', 'ad_personalization': 'granted' });
			gtag('consent', 'default', { 'analytics_storage': 'granted', 'region': ['ES', 'US-AK', 'US-CA'], 'wait_for_update': 500  });
			gtag('consent', 'default', { 'analytics_storage': 'granted', 'region': ['US', 'Unspecified'], 'wait_for_update': 500 });
			gtag('js', new Date()); gtag('config', 'G-BD9SDH2VX1'), {'allow_enhanced_conversions':true};
			function allConsentGranted() { gtag('consent', 'update', { 'ad_user_data': 'granted', 'ad_personalization': 'granted', 'ad_storage': 'granted', 'analytics_storage': 'granted' }); console.log('allConsentGranted')};
			function allConsentDenied() { gtag('consent', 'update', { 'ad_user_data': 'denied  ', 'ad_personalization': 'denied  ', 'ad_storage': 'denied  ',  'analytics_storage': 'denied ' }); console.log('allConsentDenied')};
			function consentGrantedAdStorage() { gtag('consent', 'update', { 'ad_storage': 'granted' }); console.log('consentGrantedAdStorage')};
			function consentGrantedAnalyticsStorage() { gtag('consent', 'update', { 'analytics_storage': 'granted'}); console.log('consentGrantedAnalyticsStorage')};
			function consentGrantedMinimalStorage() { gtag('consent', 'update', { 'ad_storage': 'granted', 'analytics_storage': 'granted'}); console.log('consentGrantedMinimalStorage')};
		</script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-BD9SDH2VX1"></script> -->
<?php } ?>

		<div class="modal fade" id="copyrightModal" tabindex="-1" aria-labelledby="copyrightModalHeader" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header py-1" id="copyrightModalHeader"><b>JW Cruises &copy; <?=date("Y")?>. All Rights Reserved</b>
					<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
				</div>
					<div class="modal-body" id="copyrightModalBody">
						<img src="<?=$us_url_root?>assets/img/logo-no-bkg.webp" class="img-fluid"/>
						<p style="text-align: justify;"><?=$company["name"]?><span style="font-size:0.5rem; vertical-align:top;">&reg;</span> <?=$company["tagline"]?><span style="font-size:0.75rem; vertical-align:top;">&trade;</span>. All content on this website, including text, images, logos, and design, is the property of JW Cruises<span style="font-size:0.5rem; vertical-align:top;">&reg;</span> and is protected by United States and international copyright laws. Unauthorized use, reproduction, or distribution of any materials without prior written consent is strictly prohibited. While we strive to provide accurate and up-to-date information, JW Cruises<span style="font-size:0.5rem; vertical-align:top;">&reg;</span> makes no warranties or representations regarding the completeness or suitability of the information provided and disclaims any liability for errors or omissions. Any third-party trademarks mentioned on this site are the property of their respective owners.</p>
					</div>
					<div class="modal-footer py-0" id="copyrightModalFooter"><b>We use cookies for analytics -> </b>
						<button id="closecopyrightModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"> OK </button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="imgModal" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header py-1" id="imgModalHeader"><span class="text-success fs-6">
						<b>JW Cruises</b><span style="font-size:12px; vertical-align:top;">&reg;</span>
							for Jehovah's Witnesses and Friends&trade;</span>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-0">
						<img id="popupImage" src="" alt="Popup Image" class="img-fluid w-100">
					</div>
					<div class="modal-footer mx-auto py-0" id="imgModalFooter"><span class="text-success fs-6"><b>JW Cruises</b><span style="font-size:12px; vertical-align:top;">&reg;</span> All Rights Reserved &copy; <?=date("Y")?></span>
					</div>
				</div>
			</div>
		</div>


		<div id="messages" class="alert alert-primary alert-dismissible d-none"> <span id="message"></span> </div>
		<script>
			function messages(resp) {
				$('#messages').removeClass("d-none").delay(250).fadeIn('fast'); $('#message').text(""); $('#messages').show();
				if(resp[4]) $('#messages').addClass("alert alert-success alert-dismissible");
				if(!resp[4]) $('#messages').addClass("alert alert-danger alert-dismissible");
				$('#message').html(resp); $('#messages').delay(1200).fadeOut('slow');
				//setTimeout (function() { window.location.reload() }, 1300);
			}
		</script>


		<header id="header">
			 <!-- class="header d-flex align-items-center fixed-top"> -->
			<div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
				<a href="<?=$us_url_root?>" class="logo d-flex align-items-center" data-bs-toggle="tooltip" data-bs-title="JW Cruises" data-bs-custom-class="menu-tooltip"> <img style="max-height:50px;margin-top:7px;" src="<?=$us_url_root?>assets/img/JWLogo_drk_bkg.png" alt="menu logo"> </a>
				<button type="button" id="install" class="btn btn-sm btn-primary py-0" data-bs-toggle="tooltip" title="Install App"  data-bs-custom-class="menu-tooltip" hidden>Install App</button>
				<nav id="navmenu" class="navmenu">
					<ul>
						<li><a href="<?=$us_url_root?>" data-bs-toggle="tooltip" data-bs-title="Home Page" data-bs-custom-class="menu-tooltip">Home</a></li>

						<li><a href="<?=$us_url_root?>about-us.php" data-bs-toggle="tooltip" data-bs-title="About Us" data-bs-custom-class="menu-tooltip">About</a></li>

						<li><a href="<?=$us_url_root?>contact-us.php" data-bs-toggle="tooltip" data-bs-title="Contact Us" data-bs-custom-class="menu-tooltip">Contact</a></li>

						<li class="dropdown"><a class="dropdown" href="#">Cruises <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?=$us_url_root?>all-cruises.php">All Cruises</a></li>
								<?php foreach ($cruise_menu as $cm): ?>
								<li><a href="<?=$us_url_root?>cruise-details.php?cruiseID=<?=$cm['cd']?>"> <?=$cm['cn']?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>

						<li class="dropdown"><a class="dropdown" href="#">FAQs <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?=$us_url_root?>general-faqs.php">General FAQs</a></li>
								<li><a href="<?=$us_url_root?>faqs-by-region.php">FAQs By Region</a></li>
							</ul>
						</li>

						<li class="dropdown"><a class="dropdown" href="#">More <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?=$us_url_root?>privacy-policy.php">Privacy Policy</a></li>
								<li><a href="<?=$us_url_root?>terms-of-service.php">Terms of Service</a></li>
							</ul>
						</li>

						<?php if(isset($user) && $user->isLoggedIn()){ ?>
						<li class="dropdown"><a class="dropdown" href="<?=$us_url_root?>users/account.php"><i class="bi bi-person"></i> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?=$us_url_root?>users/account.php">Account <i class="bi bi-person"></i></a></li>
								<li><a href="<?=$us_url_root?>users/admin.php?view=plugins_config&plugin=store">Store <i class="fa fa-wrench"></i></a></li>
								<li><a href="<?=$us_url_root?>usersc/plugins/store/public/cart.php">Cart <i class="bi bi-cart3"></i></a></li>
								<li><a href="<?=$us_url_root?>users/logout.php">Logout <i class="bi bi-box-arrow-left"></i></a></li>
							</ul>
						</li>
						<?php } else { ?>
						<li><a href="<?=$us_url_root?>users/login.php" data-bs-toggle="tooltip" data-bs-title="Login" data-bs-custom-class="menu-tooltip"><i class="bi bi-box-arrow-in-right"></i></a></li>
						<?php } ?>
					</ul>
					<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
				</nav>
			</div>
		</header>


		<main id="main" class="main">

		<?php if ($pageURI != "home") { ?>
			<div class="page-title dark-background" style="background-image: url(<?=$us_url_root?>assets/img/education/showcase-1.webp);">
				<div class="container position-relative">
					<div class="container section-title" data-aos="fade-up">
						<span class="description-title"><?=ucwords(str_replace(['/','-', '.php'], [' / ',' ', ''], $pageURI))?></span>
						<h2><?=ucwords(str_replace(['/','-', '.php'], [' / ',' ', ''], $pageURI))?></h2>
						<p><?=$pageDesc?></p>
					</div>
					<nav class="breadcrumbs">
						<ol>
							<li><a href="/">JW Cruises</a></li>
							<li class="current"><?=ucwords(str_replace(['/','-', '.php'], [' / ',' ', ''], $pageURI))?></li>
						</ol>
					</nav>
				</div>
			</div>
		<?php } ?>
