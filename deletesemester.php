<?php

$id = $_GET['id'];
include "database.php";
include "config.php";

$sql = mysqli_query($connection,"DELETE FROM semesters WHERE id='$id'");

if($sql) {
			echo " Subject Deleted successfully..."; ?>
			 <script type="text/javascript">
           location.href = 'semester.php';
       </script>
       <?php
		}
		else
		{
			echo "ERROE:: while deleting record.";
		}
	
 
?>
