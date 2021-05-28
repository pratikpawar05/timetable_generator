
 <?php
 include("database.php");
     if(isset($_POST['submit']))
     {
        $srno=$_POST['srno'];
        $timeslot=$_POST['timeslot'];
        $tname =$_POST['tname'];
        $cname=$_POST['cname'];
        $slname=$_POST['slname'];
        $day=$_POST['day'];
        


        $updatequery=mysqli_query($connection,"UPDATE timetable SET timeslot='$timeslot',tname='$tname',cname='$cname',slname='$slname',day='$day'WHERE srno=$srno");

        if($updatequery)
        {
            setcookie("docmsg","Updated successfully...!!!!", time()+1);
            header("location:dashboard.php");
        }else
        {
             setcookie("docmsg","Problem In Updation...!!!!", time()+1);
            header("location:dashboard.php");

        }

     }
       
                
    ?>
 