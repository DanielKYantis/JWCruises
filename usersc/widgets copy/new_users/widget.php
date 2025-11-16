<?php
$date = date("Y-m-d H:i:s");
$newUsers = '';
$c = $db->query("SELECT id FROM users WHERE join_date > ?",array(date("Y-m-d H:i:s", strtotime("-1 week", strtotime($date)))))->count();
$newUsers .= $c.", ";
$c = $db->query("SELECT id FROM users WHERE join_date > ?",array(date("Y-m-d H:i:s", strtotime("-1 month", strtotime($date)))))->count();
$newUsers .= $c.", ";
$c = $db->query("SELECT id FROM users WHERE join_date > ?",array(date("Y-m-d H:i:s", strtotime("-90 days", strtotime($date)))))->count();
$newUsers .= $c.", ";
$c = $db->query("SELECT id FROM users WHERE join_date > ?",array(date("Y-m-d H:i:s", strtotime("-6 months", strtotime($date)))))->count();
$newUsers .= $c.", ";
$c = $db->query("SELECT id FROM users WHERE join_date > ?",array(date("Y-m-d H:i:s", strtotime("-1 year", strtotime($date)))))->count();
$newUsers .= $c;
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
  // ctx.height = 150;
  var myChart = new Chart( ctx, {
    type: 'line',
    data: {
      labels: [ "Last 7 Days", "Last 30 Days", "Last 90 Days", "Last 180 Days", "Last 365 Days" ],
      type: 'line',
      defaultFontFamily: 'Montserrat',
      datasets: [ {
        label: "New Users",
        data: [ <?=$newUsers?> ],
        backgroundColor: 'transparent',
        borderColor: 'rgba(220,53,69,0.75)',
        borderWidth: 3,
        pointStyle: 'circle',
        pointRadius: 5,
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'rgba(220,53,69,0.75)',
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      legend: {
        display: false,
        labels: {
          usePointStyle: true,
          fontFamily: 'Montserrat',
        },
      },
      scales: {
        xAxes: [ {
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Time'
          }
        } ],
        yAxes: [ {
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: true,
            labelString: 'Users'
          }
        } ]
      },
      title: {
        display: false,
        text: 'Normal Legend'
      }
    }

  });
});
</script>
