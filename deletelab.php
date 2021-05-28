<?php

$srno = $_GET['srno'];
include "database.php";
include "config.php";

$sql = mysqli_query($connection,"DELETE FROM lab WHERE srno='$srno'");

if($sql) {
			echo " Subject Deleted successfully..."; ?>
			 <script type="text/javascript">
           location.href = 'lab.php';
       </script>
       <?php
		}
		else
		{
			echo "ERROE:: while deleting record.";
		}
	
 
?>
