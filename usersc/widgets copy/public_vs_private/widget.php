<?php
$private = $db->query("SELECT id FROM pages WHERE private = ?",array(1))->count();
$public = $db->query("SELECT id FROM pages WHERE private = ?",array(0))->count();
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
    ctx.maxheight = 100;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ <?=$private?>, <?=$public?> ],
                backgroundColor: [
                                    "rgba(0, 123, 255,0.9)",
                                    "rgba(123, 0, 255,0.7)"
                                ],
                hoverBackgroundColor: [
                                    "rgba(0, 123, 255,0.9)",
                                    "rgba(123, 0, 255,0.7)"
                                ]
                            } ],
            labels: [
                            "private",
                            "public"
                        ]
        },
        options: {
            responsive: true
        }
    } );
});
</script>
