<?php if (!isset($_REQUEST["cruiseID"])) { header('Location: all-cruises'); exit; };
require_once 'users/init.php';
require 'sections/header.php';
  $cr = $dbx->query("SELECT * FROM cruises WHERE cruise_id = ".$_REQUEST['cruiseID'])->fetch_assoc();
  if (!$cr["active"]) { header('Location: home.php'); exit; };
?>

    <!-- Events 2 Section -->
    <section id="events-2" class="events-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
          <div class="col-lg-8">

            <h4 class="mt-3"><?=$cr["ship_name"]?>, <?=$cr["cruise_name"]?></h4>
            <p><?=html_entity_decode($cr['cruise_description'])?></p>
            <p class="fw-bold">If you have any question or need more information, please <a href="/contact-us.php">contact us</a> </p>



                <div class="row g-4 mb-4">
                  <style>.owl-nav, .owl-dots {display: none;}</style>
                  <div class="col-lg-12 carousel-4items owl-carousel px-2 magnific-popup">

                  <?php //foreach ($dbx->query("SELECT cruise_id cid, cruise_name cn, ship_image sid FROM cruises WHERE active ORDER BY RAND() LIMIT 5") as $cm): ?>
                  <!-- <li><a href="cruise-details.php?cruiseID=<?=$cm['cid']?>"><img src="image.php?id=<?=$cm['sid']?>" alt="" class="img-fluid rounded"> <?=$cm['cn']?></a></li> -->
                  <?php //endforeach; ?>

                  <?php $itineraryPath = 'assets/img/cruises/'.$_REQUEST['cruiseID'].'/itinerary';
                  if (file_exists($itineraryPath) && is_dir($itineraryPath))
                    foreach ((new AdvSysDir($itineraryPath))->match('/\.(jpe?g|png|gif|webp|bmp|svg)$/i')->limit(0, -1) AS $itineraryImage) : ?>
                    <a href="<?=$itineraryImage->getPathname()?>" title="<?=ucwords(str_replace(['_','.jpg'], [' ',''], $itineraryImage->getFilename()))?>">
                      <img src="<?=$itineraryImage->getPathname()?>" alt="<?=ucwords(str_replace(['_','.jpg'], [' ',''], $itineraryImage->getFilename()))?>" class="hover-opacity rounded img-fluid">
                    </a>
                  <?php endforeach; ?>
                  </div>
                </div>


          <!-- <div class="row"> -->
            <div class="events-list">

<?php foreach (getItineraries($pdo, (int)$_REQUEST['cruiseID']) as $it) : ?>
              <div class="event-item mb-3" data-aos="fade-up">
                <div class="event-date">
                  <span class="day"><?php echo (new DateTime($it["arriving_date"]))->format('j')?></span>
                  <span class="month"><?php echo (new DateTime($it["arriving_date"]))->format('M')?></span>
                  <span class="year"><?php echo (new DateTime($it["arriving_date"]))->format('Y')?></span>
                </div>
                <div class="event-content">
                  <h3><?=$it["location"]?></h3>
                  <div class="event-meta">
                    <p><i class="bi bi-clock"></i> <?php echo (new DateTime($it["arriving_date"]))->format('l, h:i A')?> - <?php echo (new DateTime($it["departing_date"]))->format('l, h:i A')?></p>
                    <p><i class="bi bi-geo-alt"></i> <?=$it["port_name"]?></p>
                  </div>
                  <p><?=$it["port_description"]?></p>
                  <!-- <a href="#" class="btn-event">Learn More <i class="bi bi-arrow-right"></i></a> -->
                </div>
                <div class="event-images">


                  <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">

                      <!-- <div class="carousel-item active" data-bs-interval="<?=randomFromSet([4100, 4300, 4500, 4700, 4900])?>">
                        <img src="image.php?id=<?=$it['image1']?>" alt="image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100" loading="lazy">
                      </div> -->

                      <?php
                      //if ($it['image1']) { echo '<div class="carousel-item active" data-bs-interval="'.randomFromSet([3000, 3300, 3600, 3900, 4200, 4500]).'"><img src="image.php?id='.$it['image1'].'" alt="image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img"></div>';} else log_to_console('fail: '.$it['image1']);

                      //for ($i=2;$i<=5;$i++) { if ($it['image'.$i]) echo '<div class="carousel-item" data-bs-interval="'.randomFromSet([3000, 3300, 3600, 3900, 4200, 4500]).'"><img src="image.php?id='.$it['image'.$i].'" alt="image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img" loading="lazy"></div>'; }
                      ?>

                    </div>
                  </div>


                </div>
              </div>
<?php endforeach; ?>
            </div>

          </div>
        <!-- </div> -->


          <div class="col-lg-4">
            <div class="sidebar">

              <div class="sidebar-item featured-event" data-aos="fade-up" data-aos-delay="200">
                <h3 class="sidebar-title"><?=$cr['ship_name']?></h3>
                <div class="featured-event-content">
                  <img src="image.php?id=<?=$cr['ship_image']?>" alt="Ship Image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100" loading="lazy">
                  <h4>Cruise Information</h4>
                  <p><i class="bi bi-calendar-event"></i> <?=formatLongDate($cr['departing_date'])?> -> <?=formatLongDate($cr['destination_date'])?></p>
                  <p><?=html_entity_decode($cr['short_description'])?></p>
                  <!-- <a href="#" class="btn-register">Register Now</a> -->
                </div>
              </div>


              <div class="sidebar-item" data-aos="fade-up" data-aos-delay="100">
                <h3 class="sidebar-title"><?=$cr["cruise_name"]?></h3>
                <?=generateEventCalendars($cr['departing_date'], $cr['destination_date']);?>
                <img src="image.php?id=<?=$cr['itinerary_image']?>" alt="Itinerary Image" data-bs-toggle="modal" data-bs-target="#imgModal" class="clickable-img img-fluid rounded d-block w-100 mt-3" loading="lazy">
              </div>


              <div class="sidebar-item registration-form" data-aos="fade-left" data-aos-delay="200">
                <h3 class="text-center"><b><u>Register for Cruise</u></b></h3>
                <form action="forms/register.php" method="post" role="form" class="php-email-form needs-validation syncable" data-recaptcha-site-key="6LfOeFErAAAAAFl_goepKHM9r147w5Q_vxzj-NUF" novalidate>
                  <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="" autocomplete="on">
                    <label for="name" class="form-label">Full Name</label>
                    <!-- <div class="valid-feedback">Great!</div> <div class="invalid-feedback">oops!</div> -->
                  </div>
                  <div class="form-floating mb-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="" autocomplete="on">
                    <label for="email" class="form-label">Email Address</label>
                  </div>
                  <div class="form-floating mb-2">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="800-555-1212" required="" autocomplete="on">
                    <label for="phone" class="form-label">Phone Number</label>
                  </div>
                  <div class="form-floating mb-2">
                    <select class="form-select" id="room" name="room" required="" autocomplete="on">
                      <option selected disabled value="">Room Type</option>
                      <option value="Interior">Interior</option>
                      <option value="Oceanview">Oceanview</option>
                      <option value="Outside">Outside</option>
                      <option value="Balcony">Balcony</option>
                      <option value="Suite">Suite</option>
                    </select>
                    <label for="room" class="form-label">Room Type</label>
                  </div>
                  <div class="row g-1">
                    <div class="col form-floating mb-2">
                      <select class="form-select" id="adult" name="adult" required="" autocomplete="off">
                        <option selected disabled value="">Adult</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                      <label for="adult" class="form-label">Adult</label>
                    </div>
                    <div class="col form-floating mb-2">
                      <select class="form-select" id="child" name="child" required="" autocomplete="off">
                        <option selected disabled value="">Child</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                      <label for="child" class="form-label">Child</label>
                    </div>
                  </div>
                  <div class="text-center mb-1"><u><b>Age when time to board!</b></u></div>
                  <input type="text" class="form-control" id="subject" name="subject" hidden value="<?=$_REQUEST['cruiseID']?> | <?=$cr["cruise_name"]?>" autocomplete="off">
                  <input type="text" class="form-control" id="cruise" name="cruise" hidden value="<?=$cr["cruise_id"]?> | <?=$cr["cruise_name"]?>" autocomplete="off">
                  <div class="form-check form-group ps-0">
                    <label class="form-check-label ps-1" for="terms">
                      <input type="checkbox" id="terms" name="terms" value="accept" required>
                      Accept <a href="terms-of-service">terms of service</a> &amp; <a href="privacy-policy">privacy policy</a>
                    </label>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary mb-2">Register Now</button>
                  </div>
                  <div class="col-12"> <div class="loading">Loading</div> <div class="error-message"></div> <div class="sent-message">Sending Your Registration...<br>Give us up to 24hrs to respond!</div> </div>
                </form>
              </div>


              <div class="sidebar-item" data-aos="fade-up" data-aos-delay="300">
                <h3 class="sidebar-title">Featured Cruises</h3>
                <div class="categories">
                  <ul>
                    <?php foreach ($dbx->query("SELECT cruise_id cid, cruise_name cn, ship_image sid FROM cruises WHERE active ORDER BY RAND() LIMIT 5") as $cm): ?>
                    <li><a href="cruise-details.php?cruiseID=<?=$cm['cid']?>"><img src="image.php?id=<?=$cm['sid']?>" alt="image" class="img-fluid rounded"><?=$cm['cn']?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Events 2 Section -->


  <?php require 'sections/contact-form.php'; ?>
  <?php //require 'sections/featured.php'; ?>
<?php require 'sections/footer.php'; ?>
