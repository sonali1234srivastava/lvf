<?php
include '../../connect_db.php';

// die($student_id);
//$verify = $_POST["verify"];
if(isset($_POST["student_id"]))
{
	$student_id = $_POST["student_id"];
	
	$query = "DELETE FROM student_detail WHERE id = '$student_id'";
	if(mysqli_query($conn,$query))
		{
			echo 'Data Deleted';
		}
	else{
		die("Connection failed: " . mysqli_error($conn));
	}
}
?>	