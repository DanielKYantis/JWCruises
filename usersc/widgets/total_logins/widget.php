<?php
$date = date("Y-m-d H:i:s");
$logins = '0,';
$c = $db->query("SELECT id FROM logs WHERE logdate < ? AND logdate > ? AND lognote = ?",array(date("Y-m-d H:i:s", strtotime("-52 weeks", strtotime($date))),date("Y-m-d H:i:s", strtotime("-53 weeks", strtotime($date))), "User logged in."))->count();
$logins .= $c.", ";
$c = $db->query("SELECT id FROM logs WHERE logdate < ? AND logdate > ? AND lognote = ?",array(date("Y-m-d H:i:s", strtotime("-2 weeks", strtotime($date))),date("Y-m-d H:i:s", strtotime("-3 weeks", strtotime($date))), "User logged in."))->count();
$logins .= $c.", ";
$c = $db->query("SELECT id FROM logs WHERE logdate < ? AND logdate > ? AND lognote = ?",array(date("Y-m-d H:i:s", strtotime("-1 week", strtotime($date))),date("Y-m-d H:i:s", strtotime("-2 weeks", strtotime($date))), "User logged in."))->count();
$logins .= $c.", ";
$c = $db->query("SELECT id FROM logs WHERE logdate > ? AND lognote = ?",array(date("Y-m-d H:i:s", strtotime("-1 week", strtotime($date))), "User logged in."))->count();
$logins .= $c.", ";
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
      labels: [" ","This week Last Year", "2 Weeks Ago", "1 Week Ago", "Last 7 days" ],
      type: 'line',
      defaultFontFamily: 'Montserrat',
      datasets: [ {
        label: "Logins",
        data: [ <?=$logins?> ],
        backgroundColor: 'transparent',
        borderColor: 'rgba(40,167,69,0.75)',
        borderWidth: 3,
        pointStyle: 'circle',
        pointRadius: 5,
        pointBorderColor: 'transparent',
        pointBackgroundColor: 'rgba(40,167,69,0.75)',
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
  } );
});
</script>
