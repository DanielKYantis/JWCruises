<?php
require_once '../users/init.php';  //make sure this path is correct!
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
if (!securePage($_SERVER['PHP_SELF'])){die();}

?>

<div class="row">
  <h1 class="h1 col-12 text-center">Master Data Viewer</h1>

  <h3 class="d-none h3 mt-5 col-12 text-center">Work Data</h3>
  <div class="d-none col-12">
    <table id="AllData" class="table table-sm display compact text-dark" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">date    </th>
          <th class="th-sm">username</th>
          <th class="th-sm">location</th>
          <th class="th-sm">room    </th>
          <th class="th-sm">work    </th>
          <th class="th-sm">notes   </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db->findAll("1data");
        foreach ($db->results() as $record) {
          echo '<tr>';
            echo '<td class="text-nowrap">' . $record->date .     '</td>';
            echo '<td class="" title="'.$record->fname.' '.$record->lname.'">'.
                          $record->username . '</td>';
            echo '<td class="text-nowrap">' . $record->location . '</td>';
            echo '<td class="">' . $record->room    . '</td>';
            echo '<td class="">' . $record->work .     '</td>';
            echo '<td class="">' . $record->notes .    '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>date    </th>
          <th>username</th>
          <th>location</th>
          <th>room    </th>
          <th>work    </th>
          <th>notes   </th>
        </tr>
      </tfoot>
    </table>
	</div>   <!-- work data -->


  <div class="col-6 float-left">
    <h3 class="h3 mt-5 col-12 text-center">Chains</h3>
    <table id="1chains" class="table table-sm display compact text-dark" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">chain</th>
          <th class="th-sm">notes</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db->findAll("1chains");
        foreach ($db->results() as $record) {
          echo '<tr>';
            echo '<td class="text-left">' . $record->chain . '</td>';
            echo '<td class="text-left">' . $record->notes . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>chain</th>
          <th>notes</th>
        </tr>
      </tfoot>
    </table>
	</div> <!-- 1chains -->


  <div class="col-6 float-right">
    <h3 class="h3 mt-5 col-12 text-center">Room Types</h3>
    <table id="1room_types" class="table table-sm display compact text-dark" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">room_type </th>
          <th class="th-sm">notes     </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db->findAll("1room_types");
        foreach ($db->results() as $record) {
          echo '<tr>';
            echo '<td class="text-left">' . $record->room_type . '</td>';
            echo '<td class="text-left">' . $record->notes     . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>room_type </th>
          <th>notes     </th>
        </tr>
      </tfoot>
    </table>
	</div> <!-- 1room_types -->






  <div class="col-12">
    <h3 class="h3 mt-5 col-12 text-center">Hotel Locations</h3>
    <table id="1hotels" class="table table-sm display compact text-dark" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">chain</th>
          <th class="th-sm">hotel</th>
          <th class="th-sm">phone</th>
          <th class="th-sm">area </th>
          <th class="th-sm">city </th>
          <th class="th-sm">state</th>
          <th class="th-sm">zip  </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db->findAll("1hotels");
        foreach ($db->results() as $record) {
          echo '<tr>';
            echo '<td>' . echoChain($record->chain) .     '</td>';
            echo '<td class="text-nowrap" title="'.$record->address.'">'.
                          $record->hotel .    '</td>';
            echo '<td>' . $record->phone .    '</td>';
            echo '<td>' . $record->area .     '</td>';
            echo '<td>' . $record->city .     '</td>';
            echo '<td>' . $record->state .    '</td>';
            echo '<td>' . $record->zip .      '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>chain</th>
          <th>hotel</th>
          <th>phone</th>
          <th>area </th>
          <th>city </th>
          <th>state</th>
          <th>zip  </th>
        </tr>
      </tfoot>
    </table>
    <?php
    if (hasPerm([2],$user->data()->id))
      echo '<h5 class="h5 mt-1 col-12 text-center"><a href="locations.php">Edit Locations</a></h5>';
    ?>
	</div>  <!-- 1hotels -->


  <div class="col-12">
    <h3 class="h3 mt-5 col-12 text-center">Work / To Do / Payout</h3>
    <table id="1worklist" class="table table-sm display compact text-dark" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">room_type </th>
          <th class="th-sm">work      </th>
          <th class="th-sm">price     </th>
          <th class="th-sm">parts     </th>
          <th class="th-sm">active    </th>
          <th class="th-sm">notes     </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db->findAll("1worklist");
        foreach ($db->results() as $record) {
          $rtype = "";
          $rtypes = explode(",", $record->room_type);
          foreach ($rtypes as $rt) {
            $rtype .= echoRoomType($rt).', ';
          }
          echo '<tr>';
            echo '<td>' . $rtype . '</td>';
            echo '<td>' . $record->work     . '</td>';
            echo '<td>' . $record->price    . '</td>';
            echo '<td>' . $record->parts    . '</td>';
            echo '<td>' . $record->active   . '</td>';
            echo '<td>' . $record->notes    . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>room_type </th>
          <th>work      </th>
          <th>price     </th>
          <th>parts     </th>
          <th>active    </th>
          <th>notes     </th>
        </tr>
      </tfoot>
    </table>
    <?php
    if (hasPerm([2],$user->data()->id))
      echo '<h5 class="h5 mt-1 col-12 text-center"><a href="worklist.php">Edit Work List</a></h5>';
    ?>
	</div> <!-- 1worklist -->


  <div class="col-12">
    <h3 class="h3 mt-5 col-12 text-center">Workers / Contractors</h3>
    <table id="1workers" class="table table-sm display compact text-dark" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">username</th>
          <th class="th-sm">fname   </th>
          <th class="th-sm">lname   </th>
          <th class="th-sm">email   </th>
          <th class="th-sm">phone   </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db->findAll("users");
        foreach ($db->results() as $record) {
          echo '<tr ';
          if (!$record->permissions) echo 'class="text-warning" title="Disabled User"';
          echo '>';
            echo '<td title="'.$record->fname.' '.$record->lname.'">'.
                          $record->username . '</td>';
            echo '<td>' . $record->fname .    '</td>';
            echo '<td>' . $record->lname .    '</td>';
            echo '<td>' . $record->email .    '</td>';
            echo '<td>' . $record->phone .    '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>username</th>
          <th>fname   </th>
          <th>lname   </th>
          <th>email   </th>
          <th>phone   </th>
        </tr>
      </tfoot>
    </table>
    <?php
    if (hasPerm([2],$user->data()->id))
      echo '<h5 class="h5 mt-1 col-12 text-center"><a href="employees.php">Edit Employees</a></h5>';
    ?>
	</div>  <!-- 1workers -->

</div> <!-- row -->




<script>
$(document).ready(function() {

  $('#AllData').DataTable( {
    "stateSave": true, "aaSorting": [],
    "paging": true, "pageLength": 10,
    "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
    initComplete: function() {
      this.api().columns([1,2]).every(function() {
        var column = this;
        var select = $('<select><option value="">Show All</option></select>')
                      .appendTo($(column.footer()).empty())
                      .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^'+val+'$' : '', true, false).draw();
                      });
        column.data().unique().sort().each(function(d,j) {
          var val = $.fn.dataTable.util.escapeRegex(d);
          if (column.search() === "^" + val + "$") {
            select.append('<option value="' +d+ '" selected="selected">' +d+ "</option>");
          } else {
            select.append('<option value="' +d+ '">' +d+ "</option>");
          }
        });
      });
      this.api().columns([3,4,5]).every(function() {
        var column = this;
        var title = $(this).text();
        var input = $('<input type="text" placeholder="Search '+title+'" />')
                      .appendTo($(column.footer()).empty());
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
          if (that.search() !== this.value) {
            that.search(this.value).draw();
          }
        });
      });
    }
  }); //AllData

  $('#1chains').DataTable( {
    "stateSave": true, "aaSorting": [],
    "paging": true, "pageLength": 10,
    "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
    initComplete: function() {
      this.api().columns([0]).every(function() {
        var column = this;
        var select = $('<select><option value="">Show All</option></select>')
                      .appendTo($(column.footer()).empty())
                      .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^'+val+'$' : '', true, false).draw();
                      });
        column.data().unique().sort().each(function(d,j) {
          var val = $.fn.dataTable.util.escapeRegex(d);
          if (column.search() === "^" + val + "$") {
            select.append('<option value="' +d+ '" selected="selected">' +d+ "</option>");
          } else {
            select.append('<option value="' +d+ '">' +d+ "</option>");
          }
        });
      });
    }
  }); //1chains

  $('#1hotels').DataTable( {
    "stateSave": true, "aaSorting": [],
    "paging": true, "pageLength": 10,
    "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
    initComplete: function() {
      this.api().columns([0,3,5]).every(function() {
        var column = this;
        var select = $('<select><option value="">Show All</option></select>')
                      .appendTo($(column.footer()).empty())
                      .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^'+val+'$' : '', true, false).draw();
                      });
        column.data().unique().sort().each(function(d,j) {
          var val = $.fn.dataTable.util.escapeRegex(d);
          if (column.search() === "^" + val + "$") {
            select.append('<option value="' +d+ '" selected="selected">' +d+ "</option>");
          } else {
            select.append('<option value="' +d+ '">' +d+ "</option>");
          }
        });
      });
      this.api().columns([1,2,4,6]).every(function() {
        var column = this;
        var title = $(this).text();
        var input = $('<input type="text" placeholder="Search '+title+'" />')
                      .appendTo($(column.footer()).empty());
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
          if (that.search() !== this.value) {
            that.search(this.value).draw();
          }
        });
      });
    }
  }); //1hotels


  $('#1room_types').DataTable( {
    "stateSave": true, "aaSorting": [],
    "paging": true, "pageLength": 10,
    "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
    initComplete: function() {
      this.api().columns([0]).every(function() {
        var column = this;
        var select = $('<select><option value="">Show All</option></select>')
                      .appendTo($(column.footer()).empty())
                      .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^'+val+'$' : '', true, false).draw();
                      });
        column.data().unique().sort().each(function(d,j) {
          var val = $.fn.dataTable.util.escapeRegex(d);
          if (column.search() === "^" + val + "$") {
            select.append('<option value="' +d+ '" selected="selected">' +d+ "</option>");
          } else {
            select.append('<option value="' +d+ '">' +d+ "</option>");
          }
        });
      });
    }
  }); //1room_types

  $('#1worklist').DataTable( {
    "stateSave": true, "aaSorting": [],
    "paging": true, "pageLength": 10,
    "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
    initComplete: function() {
      this.api().columns([0,1,2,4]).every(function() {
        var column = this;
        var select = $('<select><option value="">Show All</option></select>')
                      .appendTo($(column.footer()).empty())
                      .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^'+val+'$' : '', true, false).draw();
                      });
        column.data().unique().sort().each(function(d,j) {
          var val = $.fn.dataTable.util.escapeRegex(d);
          if (column.search() === "^" + val + "$") {
            select.append('<option value="' +d+ '" selected="selected">' +d+ "</option>");
          } else {
            select.append('<option value="' +d+ '">' +d+ "</option>");
          }
        });
      });
    }
  }); //1worklist

  $('#1workers').DataTable( {
    "stateSave": true, "aaSorting": [],
    "paging": true, "pageLength": 10,
    "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
    initComplete: function() {
      this.api().columns().every(function() {
        var column = this;
        var title = $(this).text();
        var input = $('<input type="text" placeholder="Search '+title+'" />')
                      .appendTo($(column.footer()).empty());
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
          if (that.search() !== this.value) {
            that.search(this.value).draw();
          }
        });
      });
    }
  }); //1workers


  $('.dataTables_length').addClass('bs-select');

}); //doc ready
</script>

<!-- <script type="text/javascript" src="https://debug.datatables.net/debug.js"></script> -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; ?>
