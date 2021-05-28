<?php

$srno = $_GET['srno'];
include "database.php";
include "config.php";

$sql = mysqli_query($connection,"DELETE FROM timeslot WHERE srno='$srno'");

if($sql) {
            echo " Subject Deleted successfully..."; ?>
             <script type="text/javascript">
           location.href = 'time.php';
       </script>
       <?php
        }
        else
        {
            echo "ERROR:: while deleting record.";
        }
    
 
?>
