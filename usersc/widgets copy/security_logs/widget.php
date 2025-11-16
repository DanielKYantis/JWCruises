<?php $logs = $db->query("SELECT * FROM audit ORDER BY id DESC LIMIT 10")->results(); ?>

<div class="card dash-card" data-id="<?=$widgetName?>" id="<?=$widgetName?>-card">
  <div class="card-header" id="<?=$widgetName?>-card-header">
    <span class="collapseCard" data-card="<?=$widgetName?>" id="<?=$widgetName?>-caret"><i class="fa fa-caret-down"></i></span>
    <span class="card-title-text"><a href="?view=security_logs"><i class="fa fa-external-link"></i></a>Last 10 Security Events <sup><a class="nounderline" data-toggle="tooltip" title="Every time a user tries to visit a page that they do not have permission to visit, it is logged here.">?</a></sup></span>
    <span class="float-end">
      <i class="fa-solid fa-grip ps-2 grippy"></i>
    </span>
  </div>
  <div class="card-body" id="<?=$widgetName?>-card-body">
    <p class="card-text">
      <div class="row table-sm table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">User</th>
              <th scope="col">Page Attempted</th>
              <th scope="col">Timestamp</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($logs as $m){ ?>
              <tr>
                <td><?=$m->id?></td>
                <td><?php
                if($m->user > 0){
                  echouser($m->user);
                }else{
                  $q = $db->query("SELECT * FROM us_ip_list WHERE ip = ? ORDER BY id DESC",array($m->ip));
                  $c = $q->count();
                  if($c > 0) {
                    $f = $q->first();
                    echo "IP last used by ";
                    echouser($f->user_id);
                  } else { echo "<font color='red'>Unknown IP</font>"; }
                }
                ?></td>
                <td><?php echopage($m->page);?></td>
                <td><?=$m->timestamp?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </p>
  </div>
</div>
