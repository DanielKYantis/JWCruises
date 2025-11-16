jQuery(function($) {
	$(document).ready(function() {


		// $( "#sidebar" ).load( "https://www.shoreexcursionsgroup.com/v/a/cruisedirect/?page=/v/cruises/results.asp?shipId=426&arrival=2026-03-07&nights=14 #excursions", function( response, status, xhr ) {
		// 	if ( status == "error" ) { console.log( "Sorry but there was an error: " + xhr.status + " " + xhr.statusText ) };
		// });


		//baguette lightbox
		baguetteBox.run('.tz-gallery');


		// Page Preloader
		$("#preloader").delay(300).slideDown(400).fadeOut(600);


		//Scrolling feature
		$('.page-scroll a').on('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({ scrollTop: $($anchor.attr('href')).offset().top }, 1500, 'swing');
			event.preventDefault();
		});


		//Dropdown on hover
		if ($(window).width() > 1200) {
			$(".navbar .dropdown").on({
				mouseenter: function() { $(this).find('.dropdown-menu').first().stop(true, true).delay(50).slideDown(); },
				mouseleave: function() { $(this).find('.dropdown-menu').first().stop(true, true).delay(100).fadeOut(); }
			});
		}


		//	Back Top Link
		var offset = 200;
		var duration = 500;
		$(window).scroll(function() {
			if ($(this).scrollTop() > offset) { $('.back-to-top').fadeIn(400); }
			else { $('.back-to-top').fadeOut(400); }
		});


		//Owl-carousels
		$('.owl-stage').owlCarousel({
			loop: true,
			margin: 0,
			autoplay: true,
			nav: true,
			navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
			dots: true,
			responsive: {
				0: { items: 1, stagePadding: 0 },
				767: { items: 2, stagePadding: 60 },
				1200: { items: 3, stagePadding: 120 },
			}
		});


		$(".carousel-4items").owlCarousel({
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			dots: true,
			margin: 30,
			loop: true,
			autoplay: true,
			responsiveClass: true,
			responsive: {
				0: { items: 1, },
				767: { items: 2, },
				1200: { items: 4, },
			}
		});


		$(".carousel-3items").owlCarousel({
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			dots: true,
			margin: 30,
			loop: true,
			autoplay: true,
			responsiveClass: true,
			responsive: {
				0: { items: 1, },
				767: { items: 2, },
				1200: { items: 3, },
			}
		});


		$(".carousel-2items").owlCarousel({
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			dots: true,
			margin: 30,
			loop: true,
			autoplay: true,
			responsiveClass: true,
			responsive: {
				0: { items: 1, },
				991: { items: 2, },
			}
		});


		$(".carousel-1item").owlCarousel({
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			dots: true,
			margin: 30,
			loop: true,
			autoplay: false,
			responsiveClass: true,
			responsive: {
				0: { items: 1, },
			}
		});


		// Magnific Popup
		$('.magnific-popup').magnificPopup({
			delegate: 'a', // child items selector, by clicking on it popup will open
			type: 'image',
			overflowY: 'scroll',
			gallery: { enabled: true },
			titleSrc: 'title',
			titleSrc: function(item) { return '<a href="' + item.el.attr('href') + '">' + item.el.attr('title') + '</a>'; },
			callbacks: {
				open: function() { $('.fixed-top').css('margin-right', '17px'); },
				close: function() { $('.fixed-top').css('margin-right', '0px'); } }
		});

		// Magnific Popup
		// $('.').magnificPopup({
			// delegate: '', // child items selector, by clicking on it popup will open
			// type: '',
			// overflowY: 'scroll',
			// gallery: { enabled: true },
			// titleSrc: 'title',
			// titleSrc: function(item) { return '<a href="' + item.el.attr('href') + '">' + item.el.attr('title') + '</a>'; },
			// callbacks: {
				// open: function() { $('.fixed-top').css('margin-right', '17px'); },
				// close: function() { $('.fixed-top').css('margin-right', '0px'); } }
		// });


		// function aosInit() { AOS.init({
			//disable: 'mobile',
			// duration: 800, easing: 'swing', once: false, mirror: true
		// })};
		// window.addEventListener('load', aosInit);
		// if (typeof aosInit === 'function') { aosInit() };

		AOS.init({ disable: 'mobile', duration: 1500, easing: 'slide', once: false, mirror: true });
		document.addEventListener('aos:in', ({ detail }) => { console.log('aos:in', detail); });
		document.addEventListener('aos:out', ({ detail }) => { console.log('aos:out', detail); })


		//Isotope
		$('#gallery-isotope').isotope({ itemSelector: '.col-lg-6', layoutMode: 'masonry' });
		//Isotope Nav Filter
		$('.category-isotope a').click(function() {
			$('.category-isotope a').removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$('#gallery-isotope').isotope({ filter: selector });
			return false;
		});


		//------- Window scroll function -------//
		$(window).scroll(function() {
			if ($("#main-nav").offset().top > 60) {
				$('.top-bar').slideUp({ duration: 450, easing: "swing" }).fadeOut(120); }
			else { $('.top-bar').slideDown({ duration: 200, easing: "swing" }).fadeIn(120); }
		});


	}); // end document ready
}); // end jquery function
