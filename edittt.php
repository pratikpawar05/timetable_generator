<?php
$srno=$_GET['srno'];

include("database.php");

$query=mysqli_query($connection,"SELECT * FROM timetable WHERE srno=$srno");
$querydata=mysqli_fetch_array($query);

?>



<!DOCTYPE html>
<html>
<head>
  
  <title>AdminLTE  | Dashboard</title>
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Admin</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Panel</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            
           
              <li>
                
          <li class="dropdown user user-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/index.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
               <li class="user-header">
                <img src="img/index.jpg" class="img-circle" alt="User Image">

                <p>
                  Government Polytechnic Nashik
                </p>
              </li>
               
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" style="color: red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/index.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>s
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i>
             <span>Dashboard</span> </a>   
      </li>
        
          
        <li>
          <a href="addtimetable.php">
          <i class="fa fa-files-o"></i>
            <span>Add Timetable</span> </a>
         </li>

        <li>
           <a href="classroom.php">
          <i class="fa fa-th"></i>
         <span>Classroom</span>  </a>
        </li>
          
        <li>
          <a href="lab.php">
          <i class="fa fa-pie-chart"></i>
           <span>Labs</span></a> 
      </li>
          
        <li>
          <a href="staff.php">
           <i class="glyphicon glyphicon-user"></i>
            <span>Staff</span> </a> 
        </li>
        
        <li>
          <a href="subject.php">
           <i class="app-menu__icon fa fa-files-o"></i>
            <span>Subject</span> </a> 
        </li>

        <li>
          <a href="time.php">
           <i class="glyphicon glyphicon-time"></i>
            <span>Time</span> </a> 
        </li>
        
        
        
    </section>
    <!-- /.sidebar -->
  </aside>

  
  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>  Add Timetable </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">AddTimetable</li>
      </ol>
    </section><br><br><hr><hr><br>


    <?php
           if(isset($msg))
            {
                echo $msg;
            }
                ?>

   
<form id="formval" action="editttcode.php" method="post">
<div>

<?php
include "database.php";
$query = mysqli_query($connection,"SELECT timeslot FROM timeslot");

if($query) {
    
    
    ?>
                <div class="form-group col-md-4">
                  <label class="control-label">Timeslot</label>
                  <select class="form-control" name="timeslot" id="timeslot" onblur=""  value="<?php echo $querydata['timeslot'];?>" >
                  <option value="-1">Timeslot</option>
                  <?php
                  while($row = mysqli_fetch_array($query)){
                  ?> 
                  <option><?php echo $row['timeslot']; ?></option>
                <?php } ?>
                  </select>
                </div><br><br><br><br><br><br>
                <?php
}

?>

<?php
$query = mysqli_query($connection,"SELECT tname FROM staff");

if($query) {
    
    
    ?>
                <div class="form-group col-md-4">
                  <label class="control-label">Teacher Name</label>
                  <select class="form-control" name="tname" id="tname" onblur=""  value="<?php echo $querydata['tname'];?>" >
                  <option value="-1">Teacher Name</option>
                  <?php
                  while($row = mysqli_fetch_array($query)){
                  ?> 
                  <option><?php echo $row['tname']; ?></option>
                <?php } ?>
                  </select>
                </div>
                <?php
}

?>


<?php
$query = mysqli_query($connection,"SELECT class FROM class");

if($query) {
    
    
    ?>
                <div class="form-group col-md-4">
                  <label class="control-label">Class Name</label>
                  <select class="form-control" name="cname" id="cname" onblur=""   value="<?php echo $querydata['class'];?>" >
                  <option value="-1">Class Name</option>
                  <?php
                  while($row = mysqli_fetch_array($query)){
                  ?> 
                  <option><?php echo $row['class']; ?></option>
                <?php } ?>
                  </select>
                </div><br><br><br><br><br>
                <?php
}

?>



<?php
$query = mysqli_query($connection,"SELECT subject FROM subject UNION SELECT lab FROM lab");

if($query) {
    
    
    ?>
                <div class="form-group col-md-4">
                  <label class="control-label">Subject/Lab Name</label>
                  <select class="form-control" name="slname" id="sname" onblur=""  value="<?php echo $querydata['subject'];?>" >
                  <option value="-1">SubjectName</option>
                  <?php
                  while($row = mysqli_fetch_array($query )){
                    
                  ?> 
                  <option><?php echo $row['subject']; ?></option>
                  
                <?php } ?>
                  </select>
                </div>
                <?php
}

?>      


<?php
$query = mysqli_query($connection,"SELECT days FROM days ");

if($query) {
    
    
    ?>
                <div class="form-group col-md-4">
                  <label class="control-label">Day</label>
                  <select class="form-control" name="day" id="day" onblur=""  value="<?php echo $querydata['day'];?>" >
                  <option value="-1">Day Name</option>
                  <?php
                  while($row = mysqli_fetch_array($query )){
                    
                  ?> 
                  <option><?php echo $row['days']; ?></option>
                  
                <?php } ?>
                  </select>
                </div><br><br><br><br><br>
                <?php
}

?>          
            
                
                  <div class="form-group col-md-2">
                   <button class="btn btn-success" type="submit" name="submit" id="submit"  ><i class="fa fa-fw fa-lg fa-check-circle" ></i>Update</button>
               </div>
             </div>
           </form>
<!-- jQuery 3 -->
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
<!-- <?php
//include("database.php");

  
/*print_r($connection);
print_r($_POST);*/


//if(isset($_POST['submit']))
{
 // if($connection)
  {
// $timeslot=$_POST['timeslot'];
 //$tname =$_POST['tname'];
 //$cname=$_POST['cname'];
 //$slname=$_POST['slname'];
 //$day=$_POST['day'];
 


 //$query=mysqli_query($connection,"INSERT INTO timetable (timeslot,tname,cname,slname,day) VALUES('$timeslot','$tname','$cname','$slname','$day')");
   //if($query)
    {
     //   echo "update successfully";
    }
   // else{

     //   echo mysqli_error($connection);
    }

}
}

?> -->