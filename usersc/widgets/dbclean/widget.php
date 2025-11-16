<?php
if(!empty($_POST)){
  if(!empty($_POST['emptySystem'])){
    $db->query("TRUNCATE TABLE logs");
  }
  if(!empty($_POST['emptySecurity'])){
    $db->query("TRUNCATE TABLE audit");
  }
  if(!empty($_POST['emptyMsg'])){
    $db->query("TRUNCATE TABLE messages");
    $db->query("TRUNCATE TABLE message_threads");
    $db->query("TRUNCATE TABLE notifications");
  }

  if(!empty($_POST['emptyBanned'])){
    $widgetUsers = $db->query("SELECT * FROM users WHERE permissions = 0")->results();
    foreach($widgetUsers as $w){
      $db->query("DELETE FROM profiles WHERE user_id = ?",[$w->id]);
      $db->query("DELETE FROM user_permission_matches WHERE user_id = ?",[$w->id]);
      $db->query("DELETE FROM users WHERE id = ?",[$w->id]);
      $db->query("DELETE FROM users_session WHERE user_id = ?",[$w->id]);
      $db->query("DELETE FROM fingerprints WHERE fkUserID = ?",[$w->id]);
    }
  }

}

?>

<div class="card dash-card" data-id="<?=$widgetName?>" id="<?=$widgetName?>-card">
  <div class="card-header" id="<?=$widgetName?>-card-header">
    <span class="collapseCard" data-card="<?=$widgetName?>" id="<?=$widgetName?>-caret"><i class="fa fa-caret-down"></i></span>
    <span class="card-title-text"><?=ucwords(str_replace(['-', '_'], [' ', ' '], $widgetName))?></span>
    <span class="float-end"><i class="fa-solid fa-grip ps-2 grippy"></i></span>
  </div>
  <div class="card-body" id="<?=$widgetName?>-card-body">
    <div class="row">

      <div class="col-6 mb-4 text-center">
        <form class="" action="" method="post" name="system">
          <input type="submit" name="emptySystem" value="Empty System Logs" class="btn btn-danger btn-lg btn-block dbWidgetDelete">
        </form>
        <span align="center">Empties logs table</span>
        <?php $c = $db->query("SELECT id FROM logs")->count();?>
        <span align="center">(<?=$c?> rows)</span>
      </div>


      <div class="col-6 mb-4 text-center">
       <form class="" action="" method="post">
         <input type="submit" name="emptySecurity" value="Empty Security Logs" class="btn btn-warning btn-lg btn-block dbWidgetDelete">
       </form>
        <span align="center">Empties audit table</span>
        <?php $c = $db->query("SELECT id FROM audit")->count();?>
        <span align="center">(<?=$c?> rows)</span>
      </div>


      <div class="col-6 mb-4 text-center">
        <form class="" action="" method="post" name="banned">
          <input type="submit" name="emptyBanned" value="Delete Banned Users" class="btn btn-secondary btn-lg btn-block dbWidgetDelete">
        </form>
        <span align="center">Empties banned table</span>
        <?php $c = $db->query("SELECT id FROM users WHERE permissions = 0")->count();?>
        <span align="center">(<?=$c?> rows)</span>
      </div>


      <div class="col-6 mb-4 text-center">
        <form class="" action="" method="post">
          <input type="submit" name="emptyMsg" value="Clear Msgs & Notif" class="btn btn-info btn-lg btn-block dbWidgetDelete">
        </form>
        <span align="center">Empties msgs table</span>
        <?php
        $cnt = 0;
        $c = $db->query("SELECT id FROM messages")->count();
        $cnt = $cnt + $c;
        $c = $db->query("SELECT id FROM message_threads")->count();
        $cnt = $cnt + $c;
        $c = $db->query("SELECT id FROM notifications")->count();
        $cnt = $cnt + $c;
        ?>
        <span align="center">(<?=$cnt?> rows)</span>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
$('.dbWidgetDelete').on('click',function(e){
  var answer=confirm('Do you want to do this? It cannot be undone!');
  if (!answer) { e.preventDefault(); }
});

</script>
