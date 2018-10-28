<?php
//ob_start();
session_start();
include "../../connect_db.php";
include '../../validate_input.php';
//include "../header.php";
  
  if(isset($_POST["leave_id"]))
{
  $leave_id = $_POST["leave_id"];         //session set for the leave id since there may b multiple entries for the same person in leave_detail
  $_SESSION["leave_id"] = $leave_id;
  //die($_SESSION["leave_id"]);     this is been set properly!!
  
  $output = array();
 
 $sql = "SELECT * FROM leave_detail
		 WHERE leave_id = '".test_input($_POST["leave_id"])."' 
         LIMIT 1";
 if($result = mysqli_query($conn, $sql))
{ 	

 while($row = mysqli_fetch_assoc($result))
 { //die("hey");
  $output["student_name"] = $row["student_name"];
  $output["room_number"] = $row["room_number"];
  $output["roll_number"] = $row["roll_number"];
  $output["student_number"] = $row["student_number"];
  $output["course_branch"] = $row["course_branch"];
  $output["semester"] = $row["semester"];
  $output["hostel_name"] = $row["hostel_name"];
  $output["leave_period"] = $row["leave_period"];
  $output["day_from"] = $row["day_from"];
  $output["day_to"] = $row["day_to"];
  $output["reason"] = $row["reason"];
  $output["visiting_person_name"] = $row["visiting_person_name"];
  $output["relation"] = $row["relation"];
  $output["address_contact_number"] = $row["address_contact_number"];
  $output["applicant_mobile_number"] = $row["applicant_mobile_number"];
  $output["residence_address_number"] = $row["residence_address_number"];
  $output["student_signature"] = $row["student_signature"];
  $output["nowdate"] = $row["nowdate"];
 }
  echo json_encode($output);
 }
 //else{ die(mysqli_error($conn)); }
}
 //else{ die("leave id not set"); }

 mysqli_close($conn);
?>