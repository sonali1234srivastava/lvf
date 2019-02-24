<?php
    //ob_start();
 session_start();
include "../../connect_db.php";
include '../../validate_input.php';
//session_start();
   //echo "hey";
if(isset($_SESSION["leave_id"])&& !empty($_SESSION["leave_id"]))
{
   $leave_id = $_SESSION["leave_id"];
  // die($leave_id);
     //echo "hey2";

  if(isset($_POST["name"]) && isset($_POST["room_number"]) && isset($_POST["roll_number"]) && isset($_POST["student_number"]) && isset($_POST["course"]) && isset($_POST["semester"]) && isset($_POST["hostel_name"]) && isset($_POST["leave_period"]) && isset($_POST["days_from"]) && isset($_POST["days_to"]) && isset($_POST["reason"]) && isset($_POST["visiting_person"]) && isset($_POST["relation"]) && isset($_POST["visiting_person_address"]) && isset($_POST["applicant_number"]) && isset($_POST["residence_address"]) && isset($_POST["student_signature"]) && isset($_POST["date"]))
  {
 	 $check = 1;
                                
 $name = $_POST["name"];
 $room_number = $_POST["room_number"];
 $roll_number = $_POST["roll_number"];
 $student_number = $_POST["student_number"];
 $course = $_POST["course"];
 $semester =  $_POST["semester"];
 $hostel_name = $_POST["hostel_name"];
 $leave_period = $_POST["leave_period"];
 $days_from = $_POST["days_from"];
 $days_to = $_POST["days_to"];
 $reason = $_POST["reason"];
 $visiting_person = $_POST["visiting_person"];
 $relation = $_POST["relation"];
 $visiting_person_address = $_POST["visiting_person_address"];
 $applicant_number = $_POST["applicant_number"];
 $residence_address = $_POST["residence_address"];
 $student_signature = $_POST["student_signature"];
 $date = $_POST["date"];


   if(!empty($name) && !empty($room_number) && !empty($roll_number) && !empty($student_number) && !empty($course) && !empty($semester) && !empty($hostel_name) && !empty($leave_period) && !empty($days_from) && !empty($days_to) && !empty($reason) && !empty($visiting_person) && !empty($relation) && !empty($visiting_person_address) && !empty($applicant_number) && !empty($residence_address) && !empty($student_signature) && !empty($date))
  {
  	$name = test_input($_POST["name"]);
    $room_number = test_input($_POST["room_number"]);
    $roll_number = test_input($_POST["roll_number"]);
    $student_number = test_input($_POST["student_number"]);
    $course = test_input($_POST["course"]);
    $semester =  test_input($_POST["semester"]);
    $hostel_name = test_input($_POST["hostel_name"]);
    $leave_period = test_input($_POST["leave_period"]);
    $days_from = test_input($_POST["days_from"]);
    $days_to = test_input($_POST["days_to"]);
    $reason = test_input($_POST["reason"]);
    $visiting_person = test_input($_POST["visiting_person"]);
    $relation = test_input($_POST["relation"]);
    $visiting_person_address = test_input($_POST["visiting_person_address"]);
    $applicant_number = test_input($_POST["applicant_number"]);
    $residence_address = test_input($_POST["residence_address"]);
    $student_signature = test_input($_POST["student_signature"]);
    $date = test_input($_POST["date"]);

    
 
  	if(!preg_match("/^[a-zA-Z ]+$/", $name))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the name.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[0-9]+$/", $room_number) || strlen($room_number)!=3)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid room number.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[0-9]+$/", $roll_number) || strlen($roll_number)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid University Roll Number.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[0-9a-zA-Z]+$/", $student_number) || strlen($student_number)!=7)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid student number.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[a-zA-Z\/ ]+$/", $course))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the course.</div>';
    }  else
      {
         $check = 1;
      }
      if(!preg_match("/^[1-8]+$/", $semester) || strlen($semester)!=1)
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only valid semester.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[1-3]+$/", $hostel_name) || strlen($hostel_name)!=1)
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Incorrect hostel name.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[0-9]+$/", $leave_period) || strlen($leave_period)>2)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid leave days count, maximum of 3 months only.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[a-zA-Z ]+$/", $reason))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the reason.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[a-zA-Z ]+$/", $visiting_person))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the name.</div>';
    }  else
      {
         $check = 1;
      } 
    if(!preg_match("/^[a-zA-Z ]+$/", $relation))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the relation.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[a-zA-Z0-9,.\/()\- ]+$/", $visiting_person_address))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">letters numbers or ,./-() only.</div>';
    }  else
      {
         $check = 1;
      } 
    if(!preg_match("/^[0-9]*$/", $applicant_number) || strlen($applicant_number)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid contact number.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[a-zA-Z0-9,.\/()\- ]+$/", $residence_address))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">letters numbers or ,./-() only.</div>';
    }  else
      {
         $check = 1;
      } 
    if(!preg_match("/^[a-zA-Z ]+$/", $student_signature))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the name.</div>';
    }  else
      {
         $check = 1;
      }

     if($check == 1)
   {

$query = "UPDATE leave_detail SET student_name = '$name',
                                  room_number = '$room_number',
                                  roll_number = '$roll_number',
                                  student_number = '$student_number',
                                  course_branch = '$course',
                                  semester = '$semester',
                                  hostel_name = '$hostel_name',
                                  leave_period = '$leave_period',
                                  day_from = '$days_from',
                                  day_to = '$days_to',
                                  reason = '$reason',
                                  visiting_person_name = '$visiting_person',
                                  relation = '$relation',
                                  address_contact_number = '$visiting_person_address',
                                  applicant_mobile_number = '$applicant_number',
                                  residence_address_number = '$residence_address',
                                  student_signature = '$student_signature',
                                  nowdate = '$date' 
		  WHERE leave_id = '$leave_id' ";
		  
if(mysqli_query($conn,$query))
{
  echo "100";
  //echo '<div class="alert alert-success">Details Changed</div>';
}
else {
  //echo '<div class="alert alert-danger">' . mysqli_error($connect) . '</div>';
  	echo 'Data cannot be updated, try again later.';
  }

}  //check

  } //empty
  else
  {
    echo 'All fields are required!!';
  }
 
 } 	//set

}	//leave session
else
   {
    echo 'SESSION UNDEFINED!!';
   }

  mysqli_close($conn);

?>