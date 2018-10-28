<?php
include '../../connect_db.php';

// die($student_id);
//$verify = $_POST["verify"];
if(isset($_POST["leave_id"]))
{
	$leave_id = $_POST["leave_id"];
	
	$query = "DELETE FROM leave_detail WHERE leave_id = '$leave_id'";
	if(mysqli_query($conn,$query))
		{
			echo 'Data Deleted';
		}
	else{
		die("Connection failed: " . mysqli_error($conn));
	}
}
?>	