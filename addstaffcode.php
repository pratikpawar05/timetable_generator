<?php
include("database.php");

  
//print_r($connection);
/*print_r($_POST);*/


if(isset($_POST['addstaff']))
{
  if($connection)
  {
 $tname=$_POST['tname'];
 $contact=$_POST['contact'];
 $teacherid=$_POST['teacherid'];
 echo $tname."".$contact."".$teacherid;
// echo "INSERT INTO staff (tname,contact,teacherid) VALUES('".$tname."','".$contact."','".$teacherid."')";
// $query=mysqli_query($connection,"INSERT INTO staff (tname,contact,teacherid) VALUES('$tname','$contact','$teacherid')");
 $query=mysqli_query($connection,"INSERT INTO staff (tname,contact,teacherid) VALUES('$tname','$contact','$teacherid')");
   if($query)
    {
        echo "added successful";
    }
    else{

        echo mysqli_error($connection);
    }

}
}

?>