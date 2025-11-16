
<!-- Featured Cruises Section -->
<section id="featured" class="featured-programs section">

  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">All Cruises</span>
    <h2>All Cruises</h2>
    <p>Here is a carefully curated selection of upcoming group cruises</p>
  </div>

  <div class="container-fluid" data-aos="fade-up" data-aos-delay="300">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <div class="d-none d-xxl-flex btn-toolbar justify-content-around program-filters isotope-filters" data-aos="fade-up" data-aos-delay="100" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group btn-group-sm" role="group" aria-label="remove filter">
          <button class="btn-group btn-group-sm active" data-filter="*">All</button>
        </div>
        <div class="btn-group btn-group-sm" role="group" aria-label="Filter nights">
          <?php foreach ($cruise_durations as $duration) echo '<button type="button" class="btn btn-outline-secondary" data-filter=".filter-'.$duration.'nights">'.$duration.' Night</button>';?>
        </div>
        <div class="btn-group btn-group-sm" role="group" aria-label="Filter destination">
          <?php foreach ($cruise_names as $name) echo '<button type="button" class="btn btn-outline-secondary" data-filter=".filter-'.str_replace(" ","",implode(" ",array_slice(explode(" ",$name),2,-1))).'">'.implode(" ",array_slice(explode(" ",$name),2,-1)).'</button>';?>
        </div>
        <div class="btn-group btn-group-sm mx-auto" role="group" aria-label="Filter ship name">
          <?php foreach ($ship_names as $ship) echo '<button type="button" class="btn btn-outline-secondary" data-filter=".filter-'.str_replace(" ","",$ship).'">'.$ship.'</button>';?>
        </div>
      </div>

      <div class="row g-3 isotope-container">

      <?php foreach ($all_cruises as $cruise) : ?>
        <div class="col-12 col-lg-6 col-xxl-4 isotope-item filter-<?=$cruise['cruise_duration']?>nights filter-<?=str_replace(' ','',implode(' ',array_slice(explode(' ',$cruise['cruise_name']),2,-1)))?> filter-<?=str_replace(' ','',$cruise['ship_name'])?>" xdata-aos="zoom-in" xdata-aos-delay="<?=randomFromSet([100,200,300,400,500,600,700,800,900,1000])?>">
          <div class="program-item">
            <div class="program-badge"><?=formatLongDate($cruise['departing_date'])?></div>
            <div class="row g-0">
              <div class="col-md-3">
                <div class="program-image-wrapper">
                  <img src="<?=$us_url_root?>image.php?id=<?=$cruise['ship_image']?>" alt="<?=$cruise['ship_name']?>" class="img-fluid">
                  <div class="program-badge-ship"><?=$cruise['ship_name']?></div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="program-content">
                  <h3><?=$cruise['cruise_name']?></h3>
                  <div class="program-highlights">
                    <span><i class="bi bi-clock"></i> <?=$cruise['cruise_duration']?> Nights</span>
                    <span><i class="bi bi-people-fill"></i> <?=$cruise['departing_port']?></span>
                  </div>
                  <p><?=$cruise['short_description']?></p>
                  <a href="cruise-details.php?cruiseID=<?=$cruise['cruise_id']?>" title="<?=$cruise['cruise_name']?>" class="program-btn"><span>Details</span> <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      </div>
    </div>

  </div>

</section>
<!-- /Featured Cruises Section -->
