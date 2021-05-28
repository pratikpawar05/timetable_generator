<?php
include "database.php";
$query1 = mysqli_query($connection,"SELECT class FROM classes");
while($row1=mysqli_fetch_array($query1))
{
  $classdata[]=$row1;
}

$query2 = mysqli_query($connection,"SELECT subject FROM subject");
while($row2=mysqli_fetch_array($query2))
{
  $subdata[]=$row2;
}

$query3 = mysqli_query($connection,"SELECT tname FROM staff ");
while($row3=mysqli_fetch_array($query3))
{
  $staffdata[]=$row3;
}
$querylab1=mysqli_query($connection,"SELECT lab FROM lab");
while($row4=mysqli_fetch_array($querylab1))
{
  $labdata[]=$row4;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE  | Dashboard</title>
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



  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script type="text/javascript">
          
          function dataview()
          {
            var type=parseInt(document.getElementById('type').value);

            if(type==1)
            {
              
              document.getElementById('classdiv').style.display="block";
              document.getElementById('labdiv').style.display="none";
            }
            else if(type==2)
            {
              document.getElementById('classdiv').style.display="none";
              document.getElementById('labdiv').style.display="block";
              
            }
          }
        </script>
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
            
           
              </li>
                
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
                  <a href="index.php" class="btn btn-default btn-flat" style="color: red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
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
      </div><br><br>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i>
             <span>Master Timetable</span> </a>   
      </li>
        
         <li>
          <a href="stafftt.php">
            <i class="fa fa-user"></i>
             <span>Staff Timetable</span> </a>   
      </li>  
          
        <li>
          <a href="addttdemo.php">
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
        
        </ul>
        
    </section>
    <!-- /.sidebar -->
  </aside>

  
  <div class="content-wrapper">
    
    <section class="content-header" >
      <h1>  Add Timetable </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">AddTimetable</li>
      </ol>
    </section>
<br><br>
   <div  clas="container">
<form id="formval" action="" method="post">


<?php

$query = mysqli_query($connection,"SELECT timeslot FROM timeslot");

if($query) {
    
    
    ?>
                <div class="form-group col-md-4">
                  <label class="control-label">Timeslot</label>
                  <select class="form-control" name="timeslot" id="timeslot" onblur="" required="true">
                  <option value="">Timeslot</option>
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
$query = mysqli_query($connection,"SELECT days FROM days");

if($query) {
    
    
    ?>
                <div class="form-group col-md-4">
                  <label class="control-label">Day</label>
                  <select class="form-control" name="day" id="day" onblur=""  required="true">
                  <option value="">Day Name</option>
                  <?php
                  while($row = mysqli_fetch_array($query)){
                  ?> 
                  <option><?php echo $row['days']; ?></option>
                <?php } ?>
                  </select>
                </div>
                <?php
}

?>

<div class="form-group col-md-4">
                  <label class="control-label">Type</label>
                  <select class="form-control" name="type" id="type" onblur="" onchange="dataview()" required="true">
                    <option value=""> Select </option>
                 <option value="1">Lecture</option>
                  <option value="2">Practical</option>
                     
      
                  </select>
                </div>

                <div class="form-group col-md-4" id="daydata">
                  <label class="control-label">Class Name</label>
                  <select class="form-control" name="clname" id="clname" onblur="">
                  <option value="-1">Class Name</option>
                  <?php
                  if(count($classdata)>0)
                  {
                    foreach ($classdata as $ckey => $cvalue) {
                      echo "<option>".$cvalue['class']."</option>";
                    }
                 } ?>
                  </select>
                </div>

 <div class="form-group row col-md-12" id="classdiv" style="display: none;">


                <div class="form-group col-md-4" id="classsub" >
                  <label class="control-label">Subject Name</label>
                  <select class="form-control" name="sname" id="sname" onblur="">
                  <option value="-1">SubjectName</option>
                  <?php
                  if(count($subdata)>0)
                  {
                    foreach ($subdata as $skey => $svalue) {

                      echo "<option>".$svalue['subject']."</option>";
                    }
                 } ?>
                  </select>
                </div>
           
     <div class="form-group col-md-4" id="classtea" >
                  <label class="control-label">Teacher</label>
                  <select class="form-control" name="tname" id="tname" onblur="">
                  <option value="-1">Teacher Name</option>
                  
                 <?php
                  if(count($staffdata)>0)
                  {
                    foreach ($staffdata as $stkey => $stvalue) {
                      echo "<option>".$stvalue['tname']."</option>";
                    }
                 } ?>
                  </select>
                </div>
                    
          </div>

             <div class="form-group row col-md-12" id="labdiv" style="display: none;" >
              
<div class="form-group row col-md-12">

                <div class="form-group col-md-4" >
                  <label class="control-label"> Batch 1 Lab Name</label>
                  <select class="form-control" name="clname1" id="clname1" onblur="">
                  <option value="-1">Lab Name</option>
                <?php
                  if(count($labdata)>0)
                  {
                    foreach ($labdata as $l1key => $l1value) {
                      echo "<option>".$l1value['lab']."</option>";
                    }
                 } ?>
                  </select>
                </div>
       

           <div class="form-group col-md-4" >
                  <label class="control-label">Batch 1 Subject Name</label>
                  <select class="form-control" name="sname1" id="sname1" onblur="">
                  <option value="-1">SubjectName</option>
               <?php
                  if(count($subdata)>0)
                  {
                    foreach ($subdata as $skey => $svalue) {

                      echo "<option>".$svalue['subject']."</option>";
                    }
                 } ?>
                  </select>
                </div>
          

                <div class="form-group col-md-4" >
                  <label class="control-label">Batch 1 Teacher</label>
                  <select class="form-control" name="tname1" id="tname1" onblur="">
                  <option value="-1">Teacher Name</option>
                    <?php
                  if(count($staffdata)>0)
                  {
                    foreach ($staffdata as $stkey => $stvalue) {
                      echo "<option>".$stvalue['tname']."</option>";
                    }
                 } ?>
                  </select>
                </div>
              </div>

              

            <div class="form-group row col-md-12">

                <div class="form-group col-md-4" >
                  <label class="control-label">Batch 2 Lab Name</label>
                  <select class="form-control" name="clname2" id="clname2" onblur="">
                  <option value="-1">Lab Name</option>
                <?php
                  if(count($labdata)>0)
                  {
                    foreach ($labdata as $l1key => $l1value) {
                      echo "<option>".$l1value['lab']."</option>";
                    }
                 } ?>
                  </select>
                </div>
       

           <div class="form-group col-md-4" >
                  <label class="control-label">Batch 2 Subject Name</label>
                  <select class="form-control" name="sname2" id="sname2" onblur="">
                  <option value="-1">SubjectName</option>
               <?php
                  if(count($subdata)>0)
                  {
                    foreach ($subdata as $skey => $svalue) {

                      echo "<option>".$svalue['subject']."</option>";
                    }
                 } ?>
                  </select>
                </div>
          

                <div class="form-group col-md-4" >
                  <label class="control-label">Batch 2 Teacher</label>
                  <select class="form-control" name="tname2" id="tname2" onblur="">
                  <option value="-1">Teacher Name</option>
                    <?php
                  if(count($staffdata)>0)
                  {
                    foreach ($staffdata as $stkey => $stvalue) {
                      echo "<option>".$stvalue['tname']."</option>";
                    }
                 } ?>
                  </select>
                </div>
              </div>    

  
<div class="form-group row col-md-12">

                <div class="form-group col-md-4" >
                  <label class="control-label">Batch 3 Lab Name</label>
                  <select class="form-control" name="clname3" id="clname3" onblur="">
                  <option value="-1">Lab Name</option>
                <?php
                  if(count($labdata)>0)
                  {
                    foreach ($labdata as $l1key => $l1value) {
                      echo "<option>".$l1value['lab']."</option>";
                    }
                 } ?>
                  </select>
                </div>
       

           <div class="form-group col-md-4" >
                  <label class="control-label">Batch 3 Subject Name</label>
                  <select class="form-control" name="sname3" id="sname3" onblur="">
                  <option value="-1">SubjectName</option>
               <?php
                  if(count($subdata)>0)
                  {
                    foreach ($subdata as $skey => $svalue) {

                      echo "<option>".$svalue['subject']."</option>";
                    }
                 } ?>
                  </select>
                </div>
          

                <div class="form-group col-md-4" >
                  <label class="control-label">Batch 3 Teacher</label>
                  <select class="form-control" name="tname3" id="tname3" onblur="">
                  <option value="-1">Teacher Name</option>
                    <?php
                  if(count($staffdata)>0)
                  {
                    foreach ($staffdata as $stkey => $stvalue) {
                      echo "<option>".$stvalue['tname']."</option>";
                    }
                 } ?>
                  </select>
                </div>

              </div>
                        
</div>


              <div class="form-group col-md-2">
                <a href="">   <button class="btn btn-success formsubmit" type="submit" name="submit" id="submit"  ><i class="fa fa-fw fa-lg fa-check-circle" ></i>submit</button></a>
               </div>


         


           </form>
         </div></div></div>
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

 <?php
include("database.php");

  
/*print_r($connection);
print_r($_POST);*/


if(isset($_POST['submit']))
{
  if($connection)
  {
 $timeslot=$_POST['timeslot'];
 $type=$_POST['type'];
 $day=$_POST['day'];
 $clname=$_POST['clname'];
 if($type==1)
 {
 $tname =$_POST['tname'];

 $sname=$_POST['sname'];


 $query = mysqli_query($connection,"SELECT COUNT(srno) AS totalrec FROM timetable where (timeslot='$timeslot' AND clname='$clname' AND day='$day') OR (timeslot='$timeslot' AND b1_lab='$clname' AND day='$day') OR (timeslot='$timeslot' AND b2_lab='$clname' AND day='$day') OR (timeslot='$timeslot' AND b3_lab='$clname' AND day='$day') OR ( tname = '$tname' AND timeslot='$timeslot' AND day='$day') OR ( b1_teacher = '$tname' AND timeslot='$timeslot' AND day='$day') OR ( b2_teacher = '$tname' AND timeslot='$timeslot' AND day='$day') OR ( b2_teacher = '$tname' AND timeslot='$timeslot' AND day='$day')");

 $row = mysqli_fetch_array($query); 
$a=1;
}else if($type==2)
{
  $tname1 =$_POST['tname1'];
  $clname1=$_POST['clname1'];
  $sname1=$_POST['sname1'];
  $tname2 =$_POST['tname2'];
  $clname2=$_POST['clname2'];
  $sname2=$_POST['sname2'];
  $tname3 =$_POST['tname3'];
  $clname3=$_POST['clname3'];
  $sname3=$_POST['sname3'];

if(($tname1==$tname2) || ($tname1==$tname3) || ($tname2==$tname3) )
{
   echo"<script>";
        echo "alert ('Please Select Unique Teacher')";
        echo"</script>";
       $a=0;
}else if(($clname1==$clname2) || ($clname1==$clname3) || ($clname2==$clname3))
{
    echo"<script>";
        echo "alert ('Please Select Unique Lab')";
        echo"</script>";
       $a=0;
}
else{
 $query = mysqli_query($connection,"SELECT COUNT(srno) AS totalrec FROM timetable where (timeslot='$timeslot' AND b1_lab='$clname1' AND day='$day') OR (timeslot='$timeslot' AND b2_lab='$clname1' AND day='$day') OR (timeslot='$timeslot' AND b3_lab='$clname1' AND day='$day') OR (timeslot='$timeslot' AND b1_lab='$clname2' AND day='$day') OR (timeslot='$timeslot' AND b2_lab='$clname2' AND day='$day') OR (timeslot='$timeslot' AND b3_lab='$clname2' AND day='$day') OR(timeslot='$timeslot' AND b1_lab='$clname3' AND day='$day') OR (timeslot='$timeslot' AND b2_lab='$clname3' AND day='$day') OR (timeslot='$timeslot' AND b3_lab='$clname3' AND day='$day') OR (timeslot='$timeslot' AND clname='$clname' AND day='$day') OR(timeslot='$timeslot' AND clname='$clname' AND day='$day') OR( tname = '$tname1' AND timeslot='$timeslot' AND day='$day') OR ( tname = '$tname2' AND timeslot='$timeslot' AND day='$day') OR ( tname = '$tname3' AND timeslot='$timeslot' AND day='$day') OR ( b1_teacher = '$tname1' AND timeslot='$timeslot' AND day='$day') OR ( b2_teacher = '$tname1' AND timeslot='$timeslot' AND day='$day') OR ( b3_teacher = '$tname1' AND timeslot='$timeslot' AND day='$day') OR ( b1_teacher = '$tname2' AND timeslot='$timeslot' AND day='$day') OR ( b2_teacher = '$tname2' AND timeslot='$timeslot' AND day='$day') OR ( b3_teacher = '$tname2' AND timeslot='$timeslot' AND day='$day') OR ( b1_teacher = '$tname3' AND timeslot='$timeslot' AND day='$day') OR ( b2_teacher = '$tname3' AND timeslot='$timeslot' AND day='$day') OR ( b3_teacher = '$tname3' AND timeslot='$timeslot' AND day='$day')");

 $row = mysqli_fetch_array($query);
 $a=1; 
}
}
 
 
 //selct all records
 
 //check for select query


if($a==1)
{
if($row['totalrec'] >0){
  echo"<script>";
  echo " alert('Teacher already assign for this timeslot OR assign other timeslot.. Please Check Existing Timetable')";
  echo"</script>";
 
}else{

if($type==1)
 {
  $query=mysqli_query($connection,"INSERT INTO timetable (timeslot,day,clname,sname,tname,type) VALUES('$timeslot','$day','$clname','$sname','$tname',$type) ");
}else if($type==2)
{
    $query=mysqli_query($connection,"INSERT INTO timetable (timeslot,day,clname,type,b1_lab,b1_sub,b1_teacher,b2_lab,b2_sub,b2_teacher,b3_lab,b3_sub,b3_teacher) VALUES('$timeslot','$day','$clname',$type,'$clname1','$sname1','$tname1','$clname2','$sname2','$tname2','$clname3','$sname3','$tname3') ");
  }

  if($query)
    {
      echo"<script>";
        echo "alert ('teacher assign successfully')";
        echo"</script>";
    }    
    else{
 echo"<script>";
        echo "alert ('Problem In Timetable assignment')";
        echo"</script>";
       
    }
}
} 
}
}

?>
 
    
    