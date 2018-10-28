<?php
ob_start();
session_start();
include "../../connect_db.php";
include '../../validate_input.php';
//include "../header.php";
  
  if(isset($_POST["student_id"]))
{
  $student_id = $_POST["student_id"];         //session set for the leave id since there may b multiple entries for the same person in leave_detail
  $_SESSION["student_id"] = $student_id;
  //die($_SESSION["leave_id"]);     this is been set properly!!
  
  $output = array();
 
 $sql = "SELECT * FROM student_detail
		 WHERE id = '".test_input($_POST["student_id"])."' 
         LIMIT 1";
 if($result = mysqli_query($conn, $sql))
{ 	

 while($row = mysqli_fetch_assoc($result))
 { //die("hey");
  $output["name"] = $row["name"];
  $output["number"] = $row["number"];
  $output["email"] = $row["email"];
  $output["course"] = $row["course"];
  $output["branch"] = $row["branch"];
  $output["year"] = $row["year"];
  $output["username"] = $row["username"];
  $output["hostel_name"] = $row["hostel_name"];
  $output["room_number"] = $row["room_number"];
  $output["home_address"] = $row["home_address"];
  $output["father_name"] = $row["father_name"];
  $output["father_number"] = $row["father_number"];
 }
  echo json_encode($output);
 }
 //else{ die(mysqli_error($conn)); }
}
 //else{ die("leave id not set"); }

 mysqli_close($conn);
?>