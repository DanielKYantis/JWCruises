<?php
$permsQ = $db->query("SELECT * FROM permissions");
$permsC = $permsQ->count();
$perms = $permsQ->results();
$levels = '';
$userLevels = '';
foreach ($perms as $p) {
  $levels .= "\"".$p->name."(".$p->id.")\",";
  $count = $db->query("SELECT * FROM user_permission_matches WHERE permission_id = ?",array($p->id))->count();
  $userLevels .= $count.",";
}
$levels = substr($levels,0, -1);
$userLevels = substr($userLevels,0, -1);
?>


<script src="<?=$us_url_root?>usersc/widgets/<?=$widgetName?>/Chart.bundle.js"></script>
<div class="card dash-card" data-id="<?=$widgetName?>" id="<?=$widgetName?>-card">
  <div class="card-header" id="<?=$widgetName?>-card-header">
    <span class="collapseCard" data-card="<?=$widgetName?>" id="<?=$widgetName?>-caret"><i class="fa fa-caret-down"></i></span>
    <span class="card-title-text"><?=ucwords(str_replace(['-', '_'], [' ', ' '], $widgetName))?></span>
    <span class="float-end"><i class="fa-solid fa-grip ps-2 grippy"></i></span>
  </div>
  <div class="card-body" id="<?=$widgetName?>-card-body">
    <canvas id="<?=$widgetName?>-chart"></canvas>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
var ctx = document.getElementById( "<?=$widgetName?>-chart" );
  ctx.height = 100;
  var myChart = new Chart( ctx, {
      type: 'bar',
      data: {
          labels: [ <?=$levels?> ],
          datasets: [
              {
                  label: "Permission Level (Permission ID)",
                  data: [ <?=$userLevels?> ],
                  borderColor: "rgba(0, 123, 255, 0.9)",
                  borderWidth: "0",
                  backgroundColor: "rgba(0, 123, 255, 0.5)"
                          }
                      ]
      },
      options: {
          scales: {
              yAxes: [ {
                  ticks: {
                      beginAtZero: true
                  }
                              } ]
          }
      }
  } );
});
</script>
