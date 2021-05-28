<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
        <h1> Time Slot</h1>
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Time Slot</li>
        </ol>
      </section>
      <hr>
      <hr>

      <h3 class="tittle-w3-agileits mb-4" style="font: italic;">List of TimeSlot</h3>
      <table class="table" style="background-color: #3c8dbc;" border="3" id="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Sr. No.</th>
            <th scope="col">TimeSlot</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody><br>

          <a href='addtime.php' class="btn btn-success" style="float: right;">Add TimeSlot</a><br><br><br>



          <?php
          include "database.php";
          $query = mysqli_query($connection, "SELECT * FROM timeslots");
          $n = 1;
          if ($query) {
            while ($row = mysqli_fetch_array($query)) {

          ?>

              <tr>
                <th scope="row"><?php echo $n; ?></th>
                <td><?php echo $row['timeslot']; ?></td>

                <td><a href='deletetime.php?srno=<?php echo $row['srno']; ?>' class="btn btn-danger">Delete</a></td>


                <?php $n++; ?>
              </tr>
          <?php

            }
          }
          ?>

      </table>

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