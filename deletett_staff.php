<?php

$srno = $_GET['srno'];
include "database.php";
include "config.php";

$sql = mysqli_query($connection,"DELETE FROM timetable WHERE srno='$srno'");

if($sql) {
			echo " Time Table Data Deleted successfully..."; ?>
			 <script type="text/javascript">
           location.href = 'stafftt.php';
       </script>
       <?php
		}
		else
		{
			echo "ERROE:: while deleting record.";
		}
	
 
?>
