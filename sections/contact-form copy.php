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

  <!-- Google Maps (Full Width) -->
  <div class="map-section" data-aos="fade-up" data-aos-delay="400">
    <img src="assets/img/cta/cta-5.jpg" width="100%" alt="Mark and Rachel Walbert at JW World Headquarters" />
    <?php if (1==3) { ?>
<!-- 19 countries -->
    <!-- <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1ovOYyzXhAM7p-cq-zYhs1n1vX91QCbs&ehbc=2E312F&noprof=1" name="visited" width="100%" height="500px" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
<!-- Austin -->
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220475.61811226688!2d-97.8977758294353!3d30.296010708582084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644b599a0cc032f%3A0x5d9b464bd469d57a!2sAustin%2C%20TX!5e0!3m2!1sen!2sus!4v1747336233615!5m2!1sen!2sus" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
<!-- just image no google map -->
    <!-- <img src="assets/img/maps/mediterranean.png"  width="100%"/> -->
<!-- Original -->
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48318045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    <?php } ?>
  </div>

  <div class="container form-container-overlap mb-4">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="800">
      <div class="col-lg-10">
        <div class="contact-form-wrapper">
          <div class="container section-title">
            <span class="description-title">Contact Us</span>
            <h2>Send Us A Message</h2>
            <p>If You Have Any Questions: Contact Us!</p>
          </div>
          <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-recaptcha-site-key="6LfOeFErAAAAAFl_goepKHM9r147w5Q_vxzj-NUF">
            <div class="row gx-2">
              <div class="col-md-6"> <div class="form-group">
                <div class="input-with-icon"> <i class="bi bi-person"></i>
                <input type="text" class="form-control" id="name" name="name" placeholder="First Name" required="" autocomplete="on"> </div>
              </div> </div>
              <div class="col-md-6"> <div class="form-group">
                <div class="input-with-icon"> <i class="bi bi-envelope"></i>
                <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" required="" autocomplete="on"> </div>
              </div> </div>
              <div class="col-md-12"> <div class="form-group">
                <div class="input-with-icon"> <i class="bi bi-text-left"></i>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="" autocomplete="on"> </div>
              </div> </div>
              <!-- <div class="col-md-4"> <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LcuNzwrAAAAAEWav_bdIKOBV4lIcipxe3Hx5PNn" data-action="LOGIN"></div>
              </div> </div> -->
              <div class="col-12"> <div class="form-group">
                <div class="input-with-icon"> <i class="bi bi-chat-dots message-icon"></i>
                <textarea class="form-control" id="message" name="message" placeholder="Write Message..." style="height: 180px" required=""></textarea> </div>
              </div> </div>
              <!-- <div class="form-check form-group ps-0">
                <input id="privacy-policy" type="checkbox" iid="terms" name="terms" value="accept" required>
                <label class="form-check-label ps-1" for="terms">
                  Accept our <a href="terms-of-service">terms of service</a> and <a href="privacy-policy">privacy policy</a>
                </label>
              </div>
              <div class="form-group mt-3"> <input class="form-control" type="file" name="document"> </div> -->
              <div class="col-12"> <div class="loading">Loading</div> <div class="error-message"></div> <div class="sent-message">Your message has been sent. Thank you!</div> </div>
              <div class="col-12 text-center"> <button type="submit" class="btn btn-primary btn-submit">SEND MESSAGE</button> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Contact Section -->
