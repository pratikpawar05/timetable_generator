<?php
include("database.php");

 if (isset($_POST['addbatches'])) {
    $batch_name = $_POST['batch_name'];
   $start_rollNO = $_POST['start_rollNo'];
   $end_rollNO = $_POST['end_rollNo'];
   $type_id = $_POST['type_id'];
   $sem_id = $_POST['sem_id'];
   $dept_id = $_POST['dept_id'];
    
  $sql = "INSERT INTO `batches`
(`batch_name`,
`roll_no_start`,
`roll_no_end`,
`sem_id`,
`dept_id`,
`type_id`)
 VALUES('$batch_name','$start_rollNO','$end_rollNO','$sem_id','$dept_id','$type_id')";

  $query = mysqli_query($connection, $sql);
  if ($query) {
    echo "added successfully";

  } else {
    echo mysqli_error($connection);
  }
}




?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE | Dashboard</title>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include_once "./partials/header.php" ?>

    <?php include_once "./partials/sidebar.php" ?>

    <div class="content-wrapper">

      <section class="content-header">
        <h1> Add Timetable </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">TimeSlot</li>
          <li class="active">Add Timeslot</li>
        </ol>
      </section>
      <hr>
      <hr>

      <form id="formval" action="" method="post">
        <div>
          <div class="form-group col-md-3">
            <label class="control-label">Select Type</label>
            <select name="type_id" id="type_id" class="form-control custom-select">
                  
                  <option value="14">Practical</option>
             </select>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Select semester</label>
          
            <select name="sem_id" id="sem_id" class="form-control custom-select">
              <?php
              $sql = "Select * from semesters";
              $query = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['sem_name'] ?></option>
              <?php
              } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Select department</label>
          
            <select name="dept_id" id="Dept_id" class="form-control custom-select">
              <?php
              $sql = "Select * from departments";
              $query = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['dept_name'] ?></option>
              <?php
              } ?>
            </select>
          </div>
           <div class="form-group col-md-3">
                    <label class="control-label">Add Batch</label>
                    <input class="form-control" type="text" placeholder="" name="batch_name" id="batch_name" required>
           </div>
          <div class="form-group col-md-3">
                    <label class="control-label">Start Roll No.</label>
                    <input class="form-control" type="text" placeholder="" name="start_rollNo" id="start_rollNo" required>
                   </div>
             <div class="form-group col-md-3">
                    <label class="control-label">End Roll No.</label>
                    <input class="form-control" type="text" placeholder="" name="end_rollNo" id="end_rollNo" required >
                   </div>
          <br><br><br><br>

          <div class="form-group col-md-2">
            <a href=""> <button class="btn btn-success" type="submit" name="addbatches" id="addbatches"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Batches</button></a>
          </div>
        </div>
      </form>

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
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard2.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <script>
        $('#timetable_dept').on('change', function() {
          var selectedValue = this.selectedOptions[0].value;
          var selectedText = this.selectedOptions[0].text;
          console.log(selectedValue, selectedText);
        });
        $('#timetable_sem').on('change', function() {
          let sem_id = this.selectedOptions[0].value;
          let dept_id = $("#timetable_dept").val();
          ajaxRequest("Timeslot", {
            dept_id: dept_id,
            sem_id: sem_id
          });
        });

        function ajaxRequest(type, data) {
          $.ajax({
            url: "ajax.php", //the page containing php script
            type: "post", //request type,
            data: {
              request: type,
              data: data
            },
            success: function(result) {
              console.log(result);
            },
            error: function(err) {
              console.log(err);
            }
          });
        }
      </script>
</body>

</html>