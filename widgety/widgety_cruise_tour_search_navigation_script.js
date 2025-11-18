var widgets = document.querySelectorAll('iframe[src*="widget"]')
  , script = document.querySelector('script[src*="widgety_cruise_tour_search_navigation_script"]')
  , src = script.getAttribute("src").split("/");
widgets.forEach(function(t) {
  t.addEventListener("load", function() {
    const e = {
      tabs: t.getAttribute("tabs"),
      "preview-nav": t.getAttribute("preview-nav"),
      "results-nav": t.getAttribute("results-nav")
    };
    url = "".concat(src[0], "//").concat(src[2]),
    t.contentWindow.postMessage(e, url)
  })
});
