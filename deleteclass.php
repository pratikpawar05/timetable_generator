<?php

$srno = $_GET['srno'];
include "database.php";

$sql = mysqli_query($connection,"DELETE FROM classes WHERE id='$srno'");

if($sql) {
			echo " Subject Deleted successfully..."; ?>
			 <script type="text/javascript">
           location.href = 'classroom.php';
       </script>
       <?php
		}
		else
		{
			echo "ERROE:: while deleting record.";
		}
	
 
?>
