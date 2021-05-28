<?php

$id = $_GET['id'];
include "database.php";
include "config.php";

$sql = mysqli_query($connection,"DELETE FROM departments WHERE id='$id'");

if($sql) {
			echo " Subject Deleted successfully..."; ?>
			 <script type="text/javascript">
           location.href = 'department.php';
       </script>
       <?php
		}
		else
		{
			echo "ERROE:: while deleting record.";
		}
	
 
?>
