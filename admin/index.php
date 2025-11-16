<?php require_once '../users/init.php';
if (!securePage($_SERVER['PHP_SELF'])) { die(); }
require $abs_us_root.$us_url_root.'sections/header.php';
// require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
if (isset($user) && $user->isLoggedIn()) {
?>

    <!-- <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/dt/dt-2.3.2/datatables.min.css" rel="stylesheet" integrity="sha384-d76uxpdVr9QyCSR9vVSYdOAZeRzNUN8A4JVqUHBVXyGxZ+oOfrZVHC/1Y58mhyNg" crossorigin="anonymous">
    <script src="/assets/vendor/jquery/jquery.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.3.2/datatables.min.js" integrity="sha384-JRUjeYWWUGO171YFugrU0ksSC6CaWnl4XzwP6mNjnnDh4hfFGRyYbEXwryGwLsEp" crossorigin="anonymous"></script>
    <script src="oce.js"></script> -->

    <div class="container-fluid">
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

      <div class="row"><h1 class="col-12 mt-4 text-center">Cruises Info</h1></div>

      <?php
        $result = $dbx->query("SELECT * FROM cruises");
        $columns = $result->fetch_fields();
        echo '<table id="cruises" class="table table-sm table-responsive table-striped table-bordered" border="1" cellpadding="5" cellspacing="0"><thead><tr>';
        foreach ($columns as $col) { echo '<th>' . htmlspecialchars($col->name) . '</th>'; }
        echo '</tr></thead><tbody>';
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          foreach ($columns as $col) {
            $colName = $col->name;
            echo '<td class="oCE" data-input="input" data-id="'.$row["id"].'" data-field="'.$colName.'">' . htmlspecialchars($row[$colName]) . '</td>';
          }
          echo '</tr>';
        }
        echo '</tbody></table>';
        $result->free();
        $dbx->close();
      ?>

    </div>

    <div class="row">
      <h6 class="col-12 mt-4 text-center"><a href="<?php echo 'https://logout:logout@'.$_SERVER["HTTP_HOST"].'/admin'?>">Logout</a></h6>
    </div>

    <!-- <script>
      function success(resp){ console.log(resp) }
      $(document).ready(function() {
        $('table').DataTable( { paging: false, ordering: false, info: false, searching: false } );
        $('.oCE').oneClickEdit( { url : 'parser.php', allowNull : true, }, messages );
      });
    </script> -->


 <?php }
// require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php';
 require $abs_us_root.$us_url_root.'sections/footer.php';
?>
