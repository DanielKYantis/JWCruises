<!-- Contact Section -->
<section id="contact" class="contact section">

  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Contact</span>
    <h2>Contact Us</h2>
    <p>If You Have Any Questions: Contact Us!</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="200">

    <!-- Contact Info Boxes -->
    <div class="row text-center mb-5">
      <div class="col-lg-4 my-3">
        <div class="contact-info-box">
          <div class="icon-box d-none d-md-block">
            <i class="bi bi-geo-alt"></i>
          </div>
          <div class="info-content">
            <h4 class="d-block d-md-none">Mailing Address</h4>
            <p>Post Office Box 43</p>
            <p><?=$company["city"]?>, <?=$company["state"]?> <?=$company["zipcode"]?></p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 my-3">
        <div class="contact-info-box">
          <div class="icon-box d-none d-md-block">
            <i class="bi bi-envelope"></i>
          </div>
          <div class="info-content d-grid">
            <h4 class="d-block d-md-none">Email &amp; Phone</h4>
            <a href="mailto:<?=$company["email"]?>"><?=$company["email"]?></a>
            <a href="tel:<?=$company["phone"]?>"><?=$company["phone"]?></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 my-3">
        <div class="contact-info-box">
          <div class="icon-box d-none d-md-block">
            <i class="bi bi-headset"></i>
          </div>
          <div class="info-content">
            <h4 class="d-block d-md-none">Central Standard Time</h4>
            <p>Weekdays: 10AM - 4PM <span class="d-none d-md-inline-block">CST</span></p>
            <p>Closed On The Weekends</p>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- /Contact Section -->
