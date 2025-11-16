<!-- Featured Cruises Section -->
<section id="academics" class="academics section">
  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Grand Opening</span>
    <h2 class="h1">Grand Opening<br>Coming Soon</h2>
    <p>Give Us Some Time To Clean Up Our Mess...</p>
  </div>

  <?php $featured_cruises->data_seek(randomFromSet([0,1,2,3,4])); $cruise = $featured_cruises->fetch_assoc(); ?>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="featured-program-wrapper" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="featured-program-card">
            <div class="row align-items-center">
              <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-delay="100">
                <div class="featured-program-image">
                  <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="<?=randomFromSet([4100, 4300, 4500, 4700, 4900])?>">
                        <img src="image.php?id=<?=$cruise['itinerary_image']?>" alt="<?=$cruise['ship_name']?>" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100" loading="lazy">
                        <div class="program-label"> <span>Featured</span> </div>
                      </div>
                      <div class="carousel-item" data-bs-interval="<?=randomFromSet([3000, 3200, 3400, 3600, 3800])?>">
                        <img src="image.php?id=<?=$cruise['ship_image']?>" alt="<?=$cruise['ship_name']?>" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100" loading="lazy">
                        <div class="program-label"> <span>Featured</span> </div>
                      </div>
                    </div>
                  </div>
                  <!-- <img src="image.php?id=<?=$cruise['ship_image']?>" alt="<?=$cruise['ship_name']?>" class="img-fluid"> -->
                  <!-- <div class="program-label"> <span>Featured</span> </div> -->
                </div>
              </div>
              <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="featured-program-content">
                  <h3><?=$cruise['cruise_name']?></h3>
                  <p><?=$cruise['short_description']?></p>

                  <div class="program-highlights text-center">
                    <div class="highlight">
                      <div class="highlight-info">
                        <h4>Departure Port</h4>
                        <p><?=$cruise['departing_port']?></p>
                      </div>
                    </div>

                    <div class="highlight">
                      <div class="highlight-info">
                        <h4>Nights</h4>
                        <p><?=$cruise['cruise_duration']?></p>
                      </div>
                    </div>

                    <div class="highlight">
                      <div class="highlight-info">
                        <h4>Ship Name</h4>
                        <p><?=$cruise['ship_name']?></p>
                      </div>
                    </div>
                  </div>

                  <div class="featured-program-action">
                    <a href="#" class="btn-apply">Book Now</a>
                    <a href="cruise-details.php?cruiseID=<?=$cruise['cruise_id']?>" title="<?=$cruise['cruise_name']?>" class="btn-details"><span>Details </span> <i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- /Featured Cruises Section -->
