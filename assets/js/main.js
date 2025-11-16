// window.addEventListener('load', () => {
  // if ('serviceWorker' in navigator) {
  //   navigator.serviceWorker
  //   .register('/sw.js', {scope: './'})
  //   .then(() => { console.log('sw.js : registered') })
  //   .catch((error) => { console.warn(error) });
  // }
// });

// navigator.serviceWorker.ready.then((registration) => {
  // console.log('sw.js : updating');
  // registration.update();
// });

let installPrompt = null;
const installButton = document.querySelector("#install");

window.addEventListener("beforeinstallprompt", (event) => {
  event.preventDefault();
  installPrompt = event;
  installButton.removeAttribute("hidden");
});

installButton.addEventListener("click", async () => {
  if (!installPrompt) { return; }
  const result = await installPrompt.prompt();
  console.log(`Install prompt was: ${result.outcome}`);
});

window.addEventListener("appinstalled", () => {
  installPrompt = null;
  installButton.setAttribute("hidden", "");
});

function getPWADisplayMode() {
  if (document.referrer.startsWith('android-app://'))
    return 'twa';
  if (window.matchMedia('(display-mode: browser)').matches)
    return 'browser';
  if (window.matchMedia('(display-mode: standalone)').matches || navigator.standalone)
    return 'standalone';
  if (window.matchMedia('(display-mode: minimal-ui)').matches)
    return 'minimal-ui';
  if (window.matchMedia('(display-mode: fullscreen)').matches)
    return 'fullscreen';
  if (window.matchMedia('(display-mode: window-controls-overlay)').matches)
    return 'overlay';
  return 'unknown';
}
console.log(`Display Mode: ${getPWADisplayMode()}`);


// async function checkIfPWAIsInstalled() {
  // if ('getInstalledRelatedApps' in navigator) {
  //   const relatedApps = await navigator.getInstalledRelatedApps();
  //   relatedApps.length > 0 ? console.log("PWA IS installed.") : console.log("PWA NOT installed.");
  //   console.log(`related Apps: ${relatedApps}`);
  // }
// }
// checkIfPWAIsInstalled();

// const ul = document.querySelector("#results");
// const input = document.querySelector("#search");
// const div = document.querySelector(".searchBar");
// const span = document.querySelector("#powered");
//
// if ("windowControlsOverlay" in navigator && displayMode != 'browser') {
  // const { x, width } =
  //   "getTitlebarAreaRect" in navigator.windowControlsOverlay
  //     ? navigator.windowControlsOverlay.getTitlebarAreaRect()
  //     : navigator.windowControlsOverlay.getBoundingClientRect();
  // if (x === 0) { div.classList.add("search-controls-right"); } //windows
  // else { div.classList.add("search-controls-left"); } //macOS
  // span.hidden = width < 800;
// } else { div.classList.add("d-none"); }

const debouncer = (func, wait) => {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
};

if ('windowControlsOverlay' in navigator) {
  navigator.windowControlsOverlay.addEventListener('geometrychange', debouncer(e => {
    console.log(`The titlebar is ${navigator.windowControlsOverlay.visible ? 'hidden' : 'visible'}, the overlay width is ${e.titlebarAreaRect.width}px`);
  }, 100));
}


// const removeNonCharacters = text => {
  // return text
  //   ? text
  //       .replace(/\W/g, "-")
  //       .replace(/-+/g, "-")
  //       .toLowerCase()
  //   : text;
// };
//
// (async () => {
  // const content = await fetch(
  //   `https://api.wikimedia.org/feed/v1/wikipedia/en/featured/${new Date().getFullYear()}/${(
  //     new Date().getMonth() + 1
  //   )
  //     .toString()
  //     .padStart(2, "0")}/${new Date()
  //     .getDate()
  //     .toString()
  //     .padStart(2, "0")}`
  // ).then(response => response.json());
//
  // let html = "";
  // content.mostread.articles.forEach(article => {
  //   html += `<li><a data-search="${removeNonCharacters(
  //     article.displaytitle
  //   )}" href="${article.content_urls.desktop.page}">${
  //     article.displaytitle
  //   }</a> (${article.views} views) <p data-search="${removeNonCharacters(
  //     article.description
  //   )}" >${article.description}</p></li>`;
  // });
  // ul.innerHTML = html;
// })();
//
// input.addEventListener("input", e => {
  // ul.querySelectorAll("li").forEach(li => li.classList.remove("highlighted"));
  // if (!input.value || !ul.innerHTML) {
  //   return;
  // }
  // const value = removeNonCharacters(input.value);
  // if (value.length < 2) {
  //   return;
  // }
  // ul.querySelectorAll(`[data-search*="${value}"]`).forEach(li => {
  //   li.classList.add("highlighted");
  // });
// });




(function() {
  "use strict";

  /* Apply .scrolled class to the body as the page is scrolled down */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }
  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /* Mobile nav toggle */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  if (mobileNavToggleBtn) { mobileNavToggleBtn.addEventListener('click', mobileNavToogle); }

  /* Hide mobile nav on same-page/hash links */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => { if (document.querySelector('.mobile-nav-active')) { mobileNavToogle(); } });
  });

  /* Toggle mobile nav dropdowns */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /* Preloader */
  const preloader = document.querySelector('#preloader');
  if (preloader) { window.addEventListener('load', () => { preloader.remove(); }); }

  /* Scroll top button */
  let scrollTop = document.querySelector('.scroll-top');
  function toggleScrollTop() { if (scrollTop) { window.scrollY > 200 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active'); }}
  scrollTop.addEventListener('click', (e) => { e.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' }); });
  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /* Animation on scroll function and init */
  function aosInit() {
    AOS.init({ duration: 600, easing: 'easeInOutElastic', once: false, mirror: false, disable: 'mobile' })
  }
  window.addEventListener('load', aosInit);

  /* Initiate Pure Counter */
  // new PureCounter({ once: false });

  /* Init isotope layout and filters */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';
    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });
    isotopeItem.querySelectorAll('.isotope-filters button').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.active').classList.remove('active');
        this.classList.add('active');
        initIsotope.arrange({ filter: this.getAttribute('data-filter') });
        if (typeof aosInit === 'function') { aosInit(); }
      }, false);
    });
  });

  /* Init swiper sliders */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse( swiperElement.querySelector(".swiper-config").innerHTML.trim() );
      if (swiperElement.classList.contains("swiper-tab")) { initSwiperWithCustomPagination(swiperElement, config);
      } else { new Swiper(swiperElement, config); }
    });
  }
  window.addEventListener("load", initSwiper);

  /* Initiate glightbox */
  const glightbox = GLightbox({ selector: '.glightbox' });

  /* Frequently Asked Questions Toggle */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle, .faq-item .faq-header').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
    //   document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle, .faq-item .faq-header').forEach((faqItem) => { faqItem.classList.toggle('faq-active');
    // });
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })

//END ORIGINAL CODE BEGIN CUSTOM CODE


  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  var currentPath = window.location.pathname.replace(/\/$/, '');
  var currentPathWithSearch = currentPath + window.location.search;
  $('#navmenu a').each(function() {
    var href = $(this).attr('href');
    if (href && href !== '#') {
      var temp = document.createElement('a');
      temp.href = href;
      var linkPath = temp.pathname.replace(/\/$/, ''); // Remove possible trailing slash
      var linkPathWithSearch = linkPath + temp.search;
      var isHome = (
        (currentPath === '' || currentPath === '/' || currentPath === '/index.php') &&
        (linkPath === '/home.php')
      );
      if (linkPathWithSearch === currentPathWithSearch || isHome) {
        $(this).addClass('active').closest('li').addClass('active');
        var dropdownLi = $(this).closest('li.dropdown');
        if (dropdownLi.length) {
            dropdownLi.children('a').addClass('active');
        }
      }
    }
  });

  // $('#top-login').click(()=>{ $('#login-form').toggle() });

  // $('#store').click(()=>{ window.location.href = '<?=$us_url_root?>usersc/plugins/store/public/store.php' });


  // $('a[href*="wetravel.com"]').hide;
  // $('a[href*="wetravel.com"]').click(function(e) {
  //   e.preventDefault();
  //   $('#accountModal').modal('show');
  // });

  // document.addEventListener('aos:in', ({ detail }) => {
  //   console.log('aos:in', detail);
  // });
  // document.addEventListener('aos:out', ({ detail }) => {
  //   console.log('aos:out', detail);
  // })

  //Scrolling feature
  $('.page-scroll a').on('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({ scrollTop: $($anchor.attr('href')).offset().top }, 800, 'swing');
    event.preventDefault();
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

  $(".carousel-6items").owlCarousel({
    nav: false,
    dots: false,
    margin: 30,
    loop: true,
    autoplay: true,
    responsiveClass: true,
    responsive: {
      0: { items: 1, },
      767: { items: 2, },
      1200: { items: 4, },
      1400: { items: 6, },
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
    closeOnContentClick: { enabled: true },
    overflowY: 'scroll',
    gallery: { enabled: true },
    disableOn: function() {
      if( $(window).width() < 600 ) { return false; }
      return true;
    },
    image: {
      // options for image content type
      // titleSrc: 'title'
      titleSrc: function(item) { return '<a href="' + item.el.attr('href') + '">' + item.el.attr('title') + '</a>'; },
    },
    // titleSrc: function(item) { return '<a href="' + item.el.attr('href') + '">' + item.el.attr('title') + '</a>'; },
    callbacks: {
      open: function() { $('.fixed-top').css('margin-right', '17px'); },
      close: function() { $('.fixed-top').css('margin-right', '0px'); }
    }
  });

  $('.program-item').on('click', function () {
    const link = $(this).find('a').first().attr('href');
    if (link) { window.open(link, '_self'); }
  });

  $(document).on('hide.bs.modal', '#imgModal', function () {
    document.activeElement.blur(); // remove focus from anything inside the modal
  });

  $('.clickable-img').on('click', function () {
    const imgDsc = $(this).data('description');  // data-full="image.php?id=<?=$cruise['ship_image']?>"
    const imgSrc = $(this).attr('src');
    const imgAlt = $(this).attr('alt');
    $('#popupImage').attr('src', imgSrc).attr('alt', imgAlt);
    $('#imgModalFooter').html(imgDsc);
  });

  $('table').DataTable( { paging: false, ordering: false, info: false, searching: false } );

  $('.oCE').oneClickEdit( { url:'/forms/parser.php', allowNull:true, }, messages );

  // ['touchstart', 'touchmove', 'mousewheel', 'wheel'].forEach(event => {
  //   jQuery.event.special[event] = { setup: function (_, ns, handle) {
  //     if (ns.includes("noPreventDefault")) {
  //       this.addEventListener(event, handle, { passive: false }) }
  //     else { this.addEventListener(event, handle, { passive: true }) }}
  // }});
//
  // ['touchstart', 'touchmove', 'mousewheel', 'wheel'].forEach(event => {
  //   jQuery.event.special[event] = { setup: function( _, ns, handle ) {
  //     this.addEventListener(event, handle, { passive: !ns.includes("noPreventDefault") });
  // }}});
//
  //   // Passive event listeners
  //   jQuery.event.special.touchstart = { setup: function( _, ns, handle ) {
  //     this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
  //   }};
  //   jQuery.event.special.touchmove = { setup: function( _, ns, handle ) {
  //     this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
  //   }};
})();
