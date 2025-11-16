<!-- Contact Section -->
<section id="contact" class="contact section">

  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Contact</span>
    <h2>Contact Us</h2>
    <p>If You Have Any Questions: Contact Us!</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <!-- Contact Info Boxes -->
    <div class="row text-center gy-4">
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="contact-info-box">
          <div class="icon-box">
            <i class="bi bi-geo-alt"></i>
          </div>
          <div class="info-content">
            <!-- <h4>Our Address</h4> -->
            <p>Post Office Box 43</p>
            <p><?=$company["city"]?>, <?=$company["state"]?> <?=$company["zipcode"]?></p>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="contact-info-box">
          <div class="icon-box">
            <i class="bi bi-envelope"></i>
          </div>
          <div class="info-content">
            <!-- <h4>Email &amp; Phone</h4> -->
            <p><a href="mailto:<?=$company["email"]?>"><?=$company["email"]?></a></p>
            <p><a href="tel:<?=$company["phone"]?>"><?=$company["phone"]?></a></p>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="contact-info-box">
          <div class="icon-box">
            <i class="bi bi-headset"></i>
          </div>
          <div class="info-content">
            <!-- <h4>Central Standard Time</h4> -->
            <p>Weekdays - 10-4 CST</p>
            <p>Weekends&nbsp; - &nbsp;Closed</p>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- /Contact Section -->
