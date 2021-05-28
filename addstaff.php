<?php
include("database.php");


if (isset($_POST['addstaff'])) {
  $tname = $_POST['tname'];
  $contact = $_POST['contactno'];
  $emailid = $_POST['emailid'];
  $teacherid = $_POST['teacherid'];
  $tech_dept = $_POST['tech_dept'];
  $password = $_POST['password'];

  $sql = "INSERT INTO staffs (`id`,`name`,`email_id`,`mobile_no`,`dept_id`,`password`) VALUES('$teacherid','$tname','$emailid','$contact','$tech_dept','$password')";

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
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include_once "./partials/header.php" ?>

    <?php include_once "./partials/sidebar.php" ?>

    <div class="content-wrapper">

      <section class="content-header">
        <h1 class="glyphicon glyphicon-user"> AddStaff</h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Staff</li>
          <li class="active">Add Staff</li>
        </ol>
      </section>
      <hr>
      <hr>

      <form id="formval" action="" method="post">
        <div>

          <div class="form-group col-md-3">
            <label class="control-label">Teacher Name</label>
            <input class="form-control" type="text" placeholder="" name="tname" id="tname" required>
          </div>

          <div class="form-group col-md-3">
            <label class="control-label">Mobile No.</label>
            <input class="form-control" type="text" placeholder="Enter Mobile No" name="contactno" id="contact" required>
          </div>

          <div class="form-group col-md-3">
            <label class="control-label">Email Id</label>
            <input class="form-control" type="text" placeholder="Enter Email Id" name="emailid" id="email_id" required>
          </div>

          <div class="form-group col-md-3">
            <label class="control-label">Teacher ID</label>
            <input class="form-control" type="text" placeholder="" name="teacherid" id="teacherid">
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Select Department</label>
            <select name="tech_dept" class="form-control custom-select">
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
            <label class="control-label">Password</label>
            <input class="form-control" type="password" placeholder="" name="password" id="password">
          </div>
          <br><br><br><br><br>

          <div class="form-group col-md-2">
            <a href=""> <button class="btn btn-success" type="submit" name="addstaff" id="addstaff"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Staff</button></a>
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
</body>

</html>