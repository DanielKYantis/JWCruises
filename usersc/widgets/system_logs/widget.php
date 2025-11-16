<?php $logs = $db->query("SELECT * FROM logs ORDER BY id DESC LIMIT 10")->results(); ?>

<div class="card dash-card" style="width: 98%" data-id="<?=$widgetName?>" id="<?=$widgetName?>-card">
  <div class="card-header" id="<?=$widgetName?>-card-header">
    <span class="collapseCard" data-card="<?=$widgetName?>" id="<?=$widgetName?>-caret"><i class="fa fa-caret-down"></i></span>
    <span class="card-title-text"><a href="?view=logs"><i class="fa fa-external-link"></i></a>Last 10 Log Entries <sup><a class="nounderline" data-toggle="tooltip" title="These are generic logs for things that happen around your application.">?</a></sup></span>
    <span class="float-end"><i class="fa-solid fa-grip ps-2 grippy"></i></span>
  </div>
  <div class="card-body" id="<?=$widgetName?>-card-body">
    <p class="card-text">
      <div class="row table-sm table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" class="d-none">IP</th>
              <th scope="col">User</th>
              <th scope="col">Log Type</th>
              <th scope="col">Action</th>
              <th scope="col">Timestamp</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($logs as $m){ ?>
              <tr data-bs-toggle="tooltip" title="<?=$m->ip?>">
                <td><?=$m->id;?></td>
                <td class="d-none"><a href="<?=$us_url_root?>users/admin.php?view=logs&search=<?=$m->ip?>"><?=$m->ip?></a></td>
                <td><?php if ($m->user_id > 0) { echouser($m->user_id); }?></td>
                <td><?=$m->logtype;?></td>
                <td><?=$m->lognote;?></td>
                <td><?=$m->logdate?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </p>
  </div>
</div>
