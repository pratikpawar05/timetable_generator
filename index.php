<?php
include "database.php";

if (isset($_POST['btn_login'])) {

    if (isset($_POST['username']) and isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * from staffs where email_id= '$username' and password= '$password'";

        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            //$_SESSION['username'] = $username;
            header("location:dashboard.php");
        } else {

            echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
            //echo "invalid credentials";
            header("location.href= 'index.php';");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Timetable</title>


    <link rel="stylesheet" href="css/login.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <link href="css/fontawesome-all.css" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <script src="css/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="css/jquery.validate.js"></script>

    <style type="text/css">
        .error {
            color: red !important;
        }
    </style>

    <script>
        $("document").ready(function() {
            $('form[id="formval"]').validate({
                rules: {
                    username: 'required',
                    password: {
                        required: true,


                    },
                    messages: {
                        username: 'This field is required',
                        password: {
                            required: 'This field is required',

                        }
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                }
            });
        });
    </script>

</head>

<body class="bg-secondary">
    <!-- <img class="img-fluid" src="img/log2.png" alt="" srcset=""> -->
    <div class="bg-page py-5 main-div">

        <section class="form my-4 mx-5 ">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <img class="img-fluid" src="img/login.jpg" alt="" srcset="">
                    </div>
                    <div class="col-lg-7 px-5 pt-5">
                        <div class="admin-font">
                            <h1 class="font-weight-bold  py-3"> Admin Login</h1>
                        </div>

                        <form method="post" action="">
                            <div class="form-row py-3">
                                <div class="col-lg-7">
                                    <label class="text-control text-input px-4">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" id="username1">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <label class="text-control text-input px-4">password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" id="pass">
                                </div>
                            </div>
                            <div class="form-row py-5">
                                <div class="col-lg-7">
                                    <button type="submit" name="btn_login" class="form-btn" id="login">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>