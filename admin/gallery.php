<?php require_once '../users/init.php';
if (!securePage($_SERVER['PHP_SELF'])) { die(); }
require $abs_us_root.$us_url_root.'sections/header.php';

// require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
if (isset($user) && $user->isLoggedIn()) {


  $images = $pdo
  ->query("SELECT id, name, mime, title, alt, description, html FROM images ORDER BY id DESC")
  ->fetchAll(PDO::FETCH_ASSOC); ?>
  <style>
    .numberx {
      display: inline;
    }
    .galleryx {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: flex-start;
    }
  </style>

  <div id="messages" class="alert alert-primary alert-dismissible d-none"> <span id="message"></span> </div>
  <script>
    function messages(resp) {
      $('#messages').removeClass("d-none").delay(250).fadeIn('fast'); $('#message').text(""); $('#messages').show();
      if(resp[4]) $('#messages').addClass("alert alert-success alert-dismissible");
      if(!resp[4]) $('#messages').addClass("alert alert-danger alert-dismissible");
      $('#message').html(resp); $('#messages').delay(1200).fadeOut('slow');
      //setTimeout (function() { window.location.reload() }, 1300);
    }
  </script>


  <h1>Image Gallery</h1>
  <p><a href="upload.php">Upload another image</a></p>
  <?php if (empty($images)): ?>
    <p>No images uploaded yet.</p>
  <?php else: ?>
    <div class="containter">
      <div class="row">
      <?php foreach ($images as $img): ?>
        <div class="row xXxmagnific-popup">
          <div class="col">
            <h3 class="numberx"><?=$img['id']?> </h3>
            <!-- <a href="<?=$us_url_root?>image.php?id=<?=$img['id']?>" title="<?=ucwords(str_replace(['_','.jpg'], [' ',''], $img['name']))?>"> -->
              <img src="<?=$us_url_root?>image.php?id=<?=$img['id']?>" alt="<?=$img['alt'] ? $img['alt'] : ucwords(str_replace(['_','.jpg'], [' ',''], $img['name']))?>" data-bs-toggle="modal" data-bs-target="#imgModal" loading="lazy" class="clickable-img" data-description="<?=$img['description'] ? $img['description'] : ucwords(str_replace(['_','.jpg'], [' ',''], $img['name']))?>" style="max-width:200px; max-height:200px;">
            <!-- </a> -->
          </div>
          <div class="col">
            <strong>  <?=htmlspecialchars($img['name'])?></strong>
            <p>Title: <?=htmlspecialchars($img['title'])?></p>
            <p>Alt  : <?=htmlspecialchars($img['alt'])?></p>
            <p>Desc : <?=htmlspecialchars($img['description'])?></p>
          </div>
          <div class="col">
            <span><?=html_entity_decode($img['html'])?></span>
          </div>
        </div>
        <hr>
      <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
  <p><a href="upload.php">Upload another image</a></p>


<?php } else { ?>
<section id="" class="section">
  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Grand Opening</span>
    <h2>Grand Opening Coming Soon</h2>
    <p>Give Us Some Time To Clean Up Our Mess...</p>
  </div>
</section>
<?php } ?>


<script>
  function success(resp){ console.log(resp) }
</script>

<?php
// require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php';
require $abs_us_root.$us_url_root.'sections/footer.php';
?>
