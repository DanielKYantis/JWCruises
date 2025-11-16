<!-- Featured Cruises Section -->
<section id="news-hero" class="news-hero section">

  <div id="featured5" class="container section-title" data-aos="fade-up">
    <span class="description-title">Featured</span>
    <h2>Featured Cruises</h2>
    <p>Here is a safe selection of upcoming group cruises</p>
  </div>

  <div class="container-fluid container-xl" data-aos="fade-up">
    <div class="row gx-3">

        <div class="col-lg-3">
          <div class="side-posts">

  <?php for ($i=1;$i<=7;$i++) { match ($i) {
    1,2=>leftSide($i-1),
      3=>closeLopenC(),
    4  =>centerBig($i-2),
      5=>closeCopenR(),
    6,7=>rightSide($i-3),
  }; } ?>

  <?php function leftSide(int $i): void { global $featured_cruises; $featured_cruises->data_seek($i); $cruise = $featured_cruises->fetch_assoc(); ?>
            <article class="post-item side-post" data-aos="fade-right" data-aos-delay="<?=randomFromSet([300, 500, 700, 900, 1100, 1300, 1500])?>">
              <div class="post-img">

                <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="<?=randomFromSet([3900, 4100, 4300, 4500, 4700, 4900, 5100, 5300, 5500])?>">
                      <img src="image.php?id=<?=$cruise['itinerary_image']?>" alt="<?=$cruise['ship_name']?>" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100">
                    </div>
                    <div class="carousel-item" data-bs-interval="<?=randomFromSet([2600, 2800, 3000, 3200, 3400, 3600, 3800, 4000, 4200])?>">
                      <img src="image.php?id=<?=$cruise['ship_image']?>" alt="Itinerary Image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100" loading="lazy">
                    </div>
                  </div>
                </div>

                <span class="category technology text-center text-dark">
                  <!-- <img style="width:75px"src="image.php?id=< ?=$cruise['ship_image']?>" class="img-fluid" alt="< ?=$cruise['ship_name']?>"><br> -->
                  <?=$cruise['ship_name']?>
                </span>
              </div>
              <div class="post-content">
                <h3 class="post-title"> <a href="cruise-details.php?cruiseID=<?=$cruise['cruise_id']?>"><?=$cruise['cruise_name']?></a> </h3>
                <p class="post-excerpt mb-1"><?=$cruise['short_description']?></p>
                <div class="post-meta">
                  <span><?=formatLongDate($cruise['departing_date'])?></span>
                  <span class="dot">•</span>
                  <span><?=$cruise['departing_port']?></span>
                </div>
              </div>
            </article>
  <?php } ?>

  <?php function closeLopenC(): void { ?>
          </div>
        </div>

        <div class="col-lg-6">
  <?php } ?>

  <?php function centerBig(int $i): void { global $featured_cruises; $featured_cruises->data_seek($i); $cruise = $featured_cruises->fetch_assoc(); ?>
          <article class="post-item main-post" data-aos="fade-up" data-aos-delay="<?=randomFromSet([300, 500, 700, 900, 1100, 1300, 1500])?>">
            <div class="post-img">

              <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="<?=randomFromSet([3900, 4100, 4300, 4500, 4700, 4900, 5100, 5300, 5500])?>">
                    <img src="image.php?id=<?=$cruise['ship_image']?>" alt="<?=$cruise['ship_name']?>" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100">
                  </div>
                  <div class="carousel-item" data-bs-interval="<?=randomFromSet([2600, 2800, 3000, 3200, 3400, 3600, 3800, 4000, 4200])?>">
                    <img src="image.php?id=<?=$cruise['itinerary_image']?>" alt="Itinerary Image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100" loading="lazy">
                  </div>
                </div>
              </div>

              <span class="category technology text-center text-dark">
                <!-- <img style="width:150px"src="image.php?id=<?=$cruise['ship_image']?>" class="img-fluid" alt="<?=$cruise['ship_name']?>"><br> -->
                <?=$cruise['ship_name']?>
              </span>
            </div>
            <div class="post-content">
              <h2 class="post-title"> <a href="cruise-details.php?cruiseID=<?=$cruise['cruise_id']?>"><?=$cruise['cruise_name']?></a> </h2>
              <p class="post-excerpt mb-1"><?=$cruise['cruise_description']?></p>
              <div class="post-meta">
                <span><?=formatLongDate($cruise['departing_date'])?></span>
                <span class="dot">•</span>
                <span><?=$cruise['departing_port']?></span>
              </div>
            </div>
          </article>
  <?php } ?>

  <?php function closeCopenR(): void { ?>
        </div>

        <div class="col-lg-3">
          <div class="side-posts">
  <?php } ?>

  <?php function rightSide(int $i): void { global $featured_cruises; $featured_cruises->data_seek($i); $cruise = $featured_cruises->fetch_assoc(); ?>
            <article class="post-item side-post" data-aos="fade-left" data-aos-delay="<?=randomFromSet([300, 500, 700, 900, 1100, 1300, 1500])?>">
              <div class="post-img">

                <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="<?=randomFromSet([3900, 4100, 4300, 4500, 4700, 4900, 5100, 5300, 5500])?>">
                      <img src="image.php?id=<?=$cruise['itinerary_image']?>" alt="<?=$cruise['ship_name']?>" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100">
                    </div>
                    <div class="carousel-item" data-bs-interval="<?=randomFromSet([2600, 2800, 3000, 3200, 3400, 3600, 3800, 4000, 4200])?>">
                      <img src="image.php?id=<?=$cruise['ship_image']?>" alt="Itinerary Image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100" loading="lazy">
                    </div>
                  </div>
                </div>

                <span class="category technology text-center text-dark">
                  <!-- <img style="width:75px"src="image.php?id=<?=$cruise['ship_image']?>" class="img-fluid" alt="<?=$cruise['ship_name']?>"><br> -->
                  <?=$cruise['ship_name']?>
                </span>
              </div>
              <div class="post-content">
                <h3 class="post-title"> <a href="cruise-details.php?cruiseID=<?=$cruise['cruise_id']?>"><?=$cruise['cruise_name']?></a> </h3>
                <p class="post-excerpt mb-1"><?=$cruise['short_description']?></p>
                <div class="post-meta">
                  <span><?=formatLongDate($cruise['departing_date'])?></span>
                  <span class="dot">•</span>
                  <span><?=$cruise['departing_port']?></span>
                </div>
              </div>
            </article>
  <?php } ?>

          </div>
        </div>


    </div>
  </div>
</section>
<!-- /Featured Cruises Section -->
