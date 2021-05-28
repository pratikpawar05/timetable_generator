

<html>
<html lang="en">

<head>
    <title>Govpolytt</title>
    
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js"></script>
    <style type="text/css">
        .error{
            color: red !important;
        }
    </style>
    <script>
        
    
    $("document").ready(function(){
        $('form[id="formval"]').validate({
          rules: {
            username: 'required',           
            password: {
              required: true,
              
              
          },
          messages: {
            username: 'Please enter username.',         
            password: {
              required:'This field is password',
              
            }
          },
          submitHandler: function(form) {
            form.submit();
          }
        }
        });
    });
    </script>


     <script>
        $(document).ready(function(){
                $("#logout").click(function(){
                    <?php
                    session_destroy();
                    ?>
                });
            });
    </script>

    
    
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
    
    
    
</head>


<body>
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
  // print_r($_SESSION);die;
    //Select customer records and show table wise records of customer
    
        //$SQL="SELECT * from";
    header("location:dashboard.php");
}
else
{
    $_REQUEST['invalddata']="invalid";
    //echo BASEURL."/ad.php";die;
    header("location:".BASEURL."login.php?invalddata=invalid");
    echo "invalid credentials";
}
}

    ?>


    <div class="bg-page py-5" style="background-color: #3c8dbc " >
        <div class="container">
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Admin Login</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action=""  method="post" id="formval" >
                    <div class="form-group">
                          <!-- <?php
                        if ($_REQUEST['invalddata']=="invalid") {
                        ?>
                        <p style="color: red">Invalid Username or Password.</p>
                        <?php
                        }
                        ?>  --> 
                         
                        <label style="color: black">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label style="color: black">Password</label>
                        <input type="password"  name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        
                    </div><br>
                    <button type="submit" name="btn_login" class="btn btn-warning">Login</button>
                </form>
                
                
            </div>

        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
    <script src="js/jquery.validate.js"></script>
</body>

</html>


