<?php

include("database.php");
include("config.php");
if (!empty($_post))
{
 $username=$_request['admin'];
    $password=$_request['admin123'];
if($_POST['username'] == ADMINUNM && $_POST['password'] == ADMINPWD)
{
   //start session here
    session_start();
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];
    //print_r($_SESSION);die;*/
    //Select customer records and show table wise records of customer
    
        //$SQL="SELECT * from";
}
else
{
    //$_REQUEST['invalddata']="invalid";
    //echo BASEURL."/ad.php";die;
    header("location:".BASEURL."login.php?invalddata=invalid");
    //echo "invalid credentials";
}
}

	?>