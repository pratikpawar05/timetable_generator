<?php

include "database.php";
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TimeTableGenerator | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <?php include_once "./partials/header.php" ?>

  <?php include_once "./partials/sidebar.php" ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Display Timetable </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Timetable</li>
        <li class="active">Display Timetable</li>
      </ol>
    </section>
    <hr>
    <div class="container">
      <div class="row">
        <div class="form-group col-md-3">
          <label class="control-label">Select Department</label>
          <select name="timetable_dept" id="timetable_dept" class="form-control custom-select">
            <?php
            $sql = "Select * from departments";
            $query = mysqli_query($connection, $sql);
            echo "<option value=''>Select Department</option>";
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['dept_name'] ?></option>
            <?php
            } ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label class="control-label">Select Semester</label>
          <select name="timetable_sem" id="timetable_sem" class="form-control custom-select">
            <option value=''>Select Semester</option>
            <?php
            $sql = "Select * from semesters";
            $query = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['sem_name'] ?></option>
            <?php
            } ?>
          </select>
        </div><br>
        <div class="form-group col-md-2">
          <a href="">
            <button class="btn btn-success" type="submit" name="timetable_generate" id="timetable_generate"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generate Timetable</button></a>
        </div>
        <div class="form-group col-md-2">
          <a href="">
            <button class="btn btn-info" type="submit" name="print_timetable" id="print_timetable"><i class="fa fa-fw fa-lg fa-check-circle"></i>Print Timetable</button></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10">
          <div class="table-responsive">
            <table border="5" cellspacing="0" align="center" id="timetable" class="table table-striped w-auto" >
              <caption>Timetable</caption>
              <thead>
                <tr>
                  <td align="center" height="50" width="100"><br>
                    <b>Time/Day</b></br>
                  </td>
                  <?php
                  $query = mysqli_query($connection, "SELECT * FROM days");
                  while ($row = mysqli_fetch_array($query)) { ?>
                    <td align="center" height="50" width="100"><b><?php echo $row['day_name']; ?></b>
                    </td>
                  <?php
                  } ?>
                </tr>
              </thead>
              <tbody>
                <?php

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

  </div>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="bower_components/chart.js/Chart.js"></script>
  <!-- AdminLTE dashboard demo (This iAdds only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $('#timetable_generate').on('click', function(e) {
      e.preventDefault();
      ajaxRequest("GenerateTimetable", {
        dept_id: $("#timetable_dept").val(),
        sem_id: $("#timetable_sem").val(),
      });
    });
    $('#print_timetable').on('click', (e) => {
      e.preventDefault();
      printDiv('timetable');
    });

    function printDiv(tableID) {
      //Get the HTML of div
      var divToPrint = document.getElementById(tableID);
      newWin = window.open('', '', 'height=700,width=700');
      newWin.document.write(divToPrint.outerHTML);
      newWin.document.close();
      newWin.print();
    }

    function ajaxRequest(type, data) {
      $.ajax({
        url: "ajax.php", //the page containing php script
        type: "post", //request type,
        data: {
          request: type,
          data: data
        },
        success: function(result) {
          // console.log(result);
          $('#timetable > tbody').html(result);
        }
      });
    }
  </script>
</body>

</html>