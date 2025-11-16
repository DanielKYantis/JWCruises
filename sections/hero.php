<section id="hero" class="hero section dark-background">

  <div class="hero-container">
    <video preload="auto" autoplay="" muted="" loop="" playsinline="" class="video-background">
      <!-- <source src="assets/img/hero/video-<?=randomFromSet([1, 2, 3])?>.mp4" type="video/mp4"> -->
      <source src="assets/img/hero/video-1.mp4" type="video/mp4">
    </video>
    <div class="overlay"></div>
    <div class="container">
      <div class="row text-center align-items-center justify-content-around">

        <div class="col-10 col-lg-7 d-flex text-center align-items-center justify-content-around" data-aos="zoom-out" data-aos-delay="100">
          <div class="hero-content">
            <h1><?=$company["name"]?><span style="font-size:0.75rem; vertical-align:text-top;">&reg;</span> <?=$company["tagline"]?><span style="font-size:1.1rem; vertical-align:text-top;">&trade;</span></h1>
            <p>offers budget-friendly group cruises<br>promoting unity, safety & friendship</p>
            <div class="page-scroll cta-buttons d-flex text-center align-items-center justify-content-evenly">
              <a href="#contact" class="btn-primary">Contact Us Today</a>
              <a href="#featured5" class="btn-primary">Featured Cruises</a>
            </div>
          </div>
        </div>

        <!-- <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
          <div class="stats-card">
            <div class="stats-header">
              <h3>Why Choose Us</h3>
              <div class="decoration-line"></div>
            </div>
            <div class="stats-grid">
              <div class="stat-item">
                <div class="stat-icon">
                  <i class="bi bi-trophy-fill"></i>
                </div>
                <div class="stat-content">
                  <h4>100%</h4>
                  <p>Everyone Says So</p>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-icon">
                  <i class="bi bi-globe"></i>
                </div>
                <div class="stat-content">
                  <h4>92+</h4>
                  <p>Brothers Say So</p>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-icon">
                  <i class="bi bi-mortarboard"></i>
                </div>
                <div class="stat-content">
                  <h4>15:1</h4>
                  <p>Ratio Reasons</p>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-icon">
                  <i class="bi bi-building"></i>
                </div>
                <div class="stat-content">
                  <h4>120+</h4>
                  <p>Happy Customer</p>
                </div>
              </div>
            </div>
          </div>
        </div> -->

      </div>
    </div>
  </div>

  <div class="event-ticker">
    <div class="container-fluid">
      <div class="row gy-4">
        <?php $count = 0; foreach ($featured_cruises as $cruise) : if ($count++ >= 3) break; ?>
        <div class="col-md-4 col-12 ticker-item d-none">
          <span class="date"><?=$cruise['departing_date']?></span>
          <a href="#" class="btn-register"><span class="title"><?=$cruise['cruise_name']?></span></a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</section>
