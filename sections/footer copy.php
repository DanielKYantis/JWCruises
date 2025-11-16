    </main>

    <footer id="footer" class="footer position-relative dark-background">
      <div class="container">
          <div class="row text-center my-auto align-items-center">
            <div class="col-lg-3">
                <ul class="list-unstyled mt-3">
                  <li class="mb-1"><a class="fs-5" href="mailto:<?=$company["email"]?>?subject=Subject%20Line&body=Body%20of%20email"><?=$company["email"]?></a></li>
                  <li class="mb-1"><?=$company["city"]?>, <?=$company["state"]?> <?=$company["zipcode"]?> <?=$company["country"]?></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <p class="mt-3"><?=$company["name"]?><span style="font-size:10px; vertical-align:top;">&reg;</span> <?=$company["tagline"]?>&trade;<br>offers budget-friendly group cruises that<br>promote unity, safety and friendship.</p>
              </div>
            <div class="col-lg-3">
                <ul class="list-unstyled mt-3">
                  <li class="mb-1"><a class="fs-5" href="tel:<?=$company["phone"]?>"><?=$company["phone"]?></a></li>
                  <li class="mb-1">Weekdays: 10AM — 4PM CST</li>
                </ul>
            </div>
          </div>
          <hr class="m-0 p-0">
          <div class="credits row col-sm-12 text-center" id="openCopyrightModalBtn" data-bs-toggle="modal" data-bs-target="#copyrightModal">
            <p class="lh-sm">
              <!-- <span class="text-decoration-underline text-danger"> -->
                <span class="text-decoration-underline text-success">
                  JW Cruises<span style="font-size:10px; vertical-align:top;">&reg;</span>
                  for Jehovah's Witnesses and Friends&trade;
                </span>
              <!-- </span> -->
              <br>
              <span style="font-size:12px;" class="fw-light align-top">
                All Rights Reserved &copy; <?=date("Y")?> | Click Here For More Information
              </span>
            </p>
          </div>
      </div>
    </footer>

    <a href="#top" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script module src="<?=$us_url_root?>assets/vendor/jquery/jquery.js"></script>
    <script module src="<?=$us_url_root?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script module src="<?=$us_url_root?>assets/vendor/php-email-form/validate.js"></script>
    <script module src="<?=$us_url_root?>assets/vendor/aos/aos.js"></script>
    <script module src="<?=$us_url_root?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script module src="<?=$us_url_root?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <!-- <script src="<?=$us_url_root?>assets/vendor/swiper/swiper-bundle.min.js"></script> -->
    <script module src="<?=$us_url_root?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<!-- <script defer src="https://www.google.com/recaptcha/api.js?render=6LfOeFErAAAAAFl_goepKHM9r147w5Q_vxzj-NUF"></script> -->
    <!-- <script src="https://cdn.datatables.net/v/dt/dt-2.3.2/datatables.min.js" integrity="sha384-JRUjeYWWUGO171YFugrU0ksSC6CaWnl4XzwP6mNjnnDh4hfFGRyYbEXwryGwLsEp" crossorigin="anonymous"></script> -->
    <script module src="<?=$us_url_root?>assets/vendor/datatables/datatables.min.js"></script>
    <script module src="<?=$us_url_root?>assets/js/oce.js"></script>
    <script module src="<?=$us_url_root?>assets/js/plugins.js"></script>
    <script module src="<?=$us_url_root?>assets/js/main.js"></script>
    <?php if (1==3) { ?> <!-- <script src="<?=$us_url_root?>assets/js/tracker.js" async></script> --> <?php } ?>

    <script defer>
      function setCookie(name, value, days) {
        const expires = new Date(Date.now() + days * 864e5).toUTCString();
        document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/; Secure; SameSite=Strict`;
      }
      function getCookie(name) {
        return document.cookie.split('; ').reduce((acc, cookie) => {
          const [key, val] = cookie.split('=');
          return key === name ? decodeURIComponent(val) : acc;
        }, '');
      }
      document.addEventListener("DOMContentLoaded", function () {
        const isHomepage = location.pathname === "/" || location.pathname === "/home.php";
        const modalShown = getCookie("consent_modal_shown");
        if (isHomepage && !modalShown) {
          setTimeout(() => {
            const modal = new bootstrap.Modal(document.getElementById('copyrightModal'));
            modal.show();
            setCookie("consent_modal_shown", "true", 30);
            // consentGrantedAnalyticsStorage();
          }, 5000);
        }
      });
      document.getElementById('closecopyrightModal')?.addEventListener('click', () => {
        document.getElementById('copyrightModal').style.display = 'none';
      });
    </script>



  </body>
</html>
