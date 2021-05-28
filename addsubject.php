<?php
include("database.php");

if (isset($_POST['addsub'])) {
  // print_r($_POST);
  $sub_name = $_POST['sub_name'];
  $sub_code = $_POST['sub_code'];
  $sub_sem = $_POST['sub_sem'];
  $sub_dept = $_POST['sub_dept'];

  $sql = "INSERT INTO subjects (sub_name,sub_code,sem_id,dept_id) VALUES('$sub_name','$sub_code','$sub_sem','$sub_dept')";
  $query = mysqli_query($connection, $sql);
  if ($query) {
    echo "added successfully";
  } else {
    echo mysqli_error($connection);
  }

  $sub_id = $connection->insert_id;
  if (array_key_exists("lecture_check_box", $_POST)) {
    $staff_id = $_POST['lecture_staff'];
    $sql = "INSERT INTO subject_staff (`sub_id`,`staff_id`,`type_id`) VALUES('$sub_id','$staff_id','13')";
    $query = mysqli_query($connection, $sql);
  }
  if (array_key_exists("lab_check_box", $_POST)) {
    $staff_id = $_POST['lab_staff'];
    $sql = "INSERT INTO subject_staff (`sub_id`,`staff_id`,`type_id`) VALUES('$sub_id','$staff_id','14')";
    $query = mysqli_query($connection, $sql);
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
  <style>
    .dyanamic-select-box {
      display: none;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include_once "./partials/header.php" ?>

    <?php include_once "./partials/sidebar.php" ?>

    <div class="content-wrapper">

      <section class="content-header">
        <h1> Subject </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Subject</li>
          <li class="active">Add subject</li>
        </ol>
      </section>
      <hr>
      <hr>
      <div class="container-center">
        <form id="formval" action="" method="post">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="control-label">Select Department</label>
              <select name="sub_dept" class="form-control custom-select">
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
              <label class="control-label">Select Semester</label>
              <select name="sub_sem" class="form-control custom-select">
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

          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label class="control-label">Subject Name</label>
              <input class="form-control" type="text" placeholder="" name="sub_name" id="sub_name">
            </div>

            <div class="form-group col-md-3">
              <label class="control-label">Subject Code</label>
              <input class="form-control" type="text" placeholder="" name="sub_code" id="sub_code">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-2">
              <label class="control-label">Has Lecture?</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="lecture_check_box" id="lecture_check_box">
              </div>
            </div>
            <div class="form-group col-md-3 dyanamic-select-box" id="lecture_staff_div">
              <label class="control-label">Select Teacher</label>
              <select name="lecture_staff" class="form-control custom-select" id="lecture_staff">
                <?php
                $sql = "Select * from staffs";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
                } ?>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label class="control-label">Has Lab?</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="lab_check_box" name="lab_check_box">
              </div>
            </div>
            <div class="form-group col-md-3 dyanamic-select-box" id="lab_staff_div">
              <label class="control-label">Select Teacher</label>
              <select name="lab_staff" class="form-control custom-select" id="lab_staff">
                <?php
                $sql = "Select * from staffs";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
                } ?>
              </select>
            </div>
          </div>
          <div class="row">

          </div>
          <div class="row">
            <div class="form-group col-md-2">
              <a href=""> <button class="btn btn-success" type="submit" name="addsub" id="addsub"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Subject</button></a>
            </div>
          </div>
        </form>

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
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard2.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <script>
        $("#lecture_check_box").change(function() {
          if (this.checked) {
            $('#lecture_staff_div').show();
          } else {
            $('#lecture_staff_div').hide();
          }
        });
        $("#lab_check_box").change(function() {
          if (this.checked) {
            $('#lab_staff_div').show();
          } else {
            $('#lab_staff_div').hide();
          }
        });
      </script>
</body>

</html>