<?php
    ob_start();
 session_start();
include "../../connect_db.php";
include '../../validate_input.php';
//session_start();
   //echo "hey";
if(isset($_SESSION["student_id"])&& !empty($_SESSION["student_id"]))
{
   $student_id = $_SESSION["student_id"];
  // die($leave_id);
     //echo "hey2";

  if(isset($_POST["name"]) && isset($_POST["number"]) && isset($_POST["email"]) && isset($_POST["course"]) && isset($_POST["branch"]) && isset($_POST["year"]) && isset($_POST["username"]) && isset($_POST["hostel_name"]) && isset($_POST["room_number"]) && isset($_POST["home_address"]) && isset($_POST["father_name"]) && isset($_POST["father_number"]))
  {
 	 $check = 1;
                                
 $name = $_POST["name"];
 $number = $_POST["number"];
 $email = $_POST["email"];
 $course = $_POST["course"];
 $branch =  $_POST["branch"];
 $year =  $_POST["year"];
 $username =  $_POST["username"];
 $hostel_name = $_POST["hostel_name"];
 $room_number = $_POST["room_number"];
 $home_address = $_POST["home_address"];
 $father_name = $_POST["father_name"];
 $father_number = $_POST["father_number"];
 

if(!empty($name) && !empty($number) && !empty($email) && !empty($course) && !empty($branch) && !empty($year) && !empty($username) && !empty($hostel_name) && !empty($room_number) && !empty($home_address) && !empty($father_name) && !empty($father_number))
  {
  	$name = test_input($_POST["name"]);
    $number = test_input($_POST["number"]);
    $email = test_input($_POST["email"]);
    $course = test_input($_POST["course"]);
    $branch =  test_input($_POST["branch"]);
    $year =  test_input($_POST["year"]);
    $username =  test_input($_POST["username"]);
    $hostel_name = test_input($_POST["hostel_name"]);
    $room_number = test_input($_POST["room_number"]);
    $home_address = test_input($_POST["home_address"]);
    $father_name = test_input($_POST["father_name"]);
    $father_number = test_input($_POST["father_number"]);
    
 
  	if(!preg_match("/^[a-zA-Z ]+$/", $name))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the name.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[0-9]+$/", $number) || strlen($number)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid contact number.</div>';
    }
    else
    {
      $check = 1;

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
       {
        $check = 0;
        echo '<div class="alert alert-danger">Invalid Email</div>';
       }
    else{
       $check = 1;
    }  
    if(!preg_match("/^[a-zA-Z- ]+$/", $course))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the course.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[a-zA-Z ]+$/", $branch))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the branch.</div>';
    }  else
      {
         $check = 1;
      }  
     if(!preg_match("/^[1-4]+$/", $year))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">letters or numbers only.</div>';
    }  else
      {
         $check = 1;
      }
      if(!preg_match("/^[0-9]+$/", $username) || strlen($username)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid University Roll Number.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[1-3]+$/", $hostel_name))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Invalid hostle name format.</div>';
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
    if(!preg_match("/^[a-zA-Z0-9, ]+$/", $home_address))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">letters numbers or , only.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[a-zA-Z ]+$/", $father_name))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the name.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[0-9]+$/", $father_number) || strlen($father_number)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid contact number.</div>';
    }
    else
    {
      $check = 1;

    }

     if($check == 1)
   {

$query = "UPDATE student_detail SET name = '$name',
                                  number = '$number',
                                  email = '$email',
                                  course = '$course',
                                  branch = '$branch',
                                  year = '$year',
                                  username = '$username',
                                  hostel_name = '$hostel_name',
                                  room_number = '$room_number',
                                  home_address = '$home_address',
                                  father_name = '$father_name',
                                  father_number = '$father_number'
          WHERE id = '$student_id' ";
		  
if(mysqli_query($conn,$query))
{
  echo "100";
  //echo '<div class="alert alert-success">Details Changed</div>';
}
else {
  echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
  	//echo 'Data cannot be updated, try again later.';
  }

}  //check

  } //empty
  else
  {
    echo 'All fields are required!!';
  }
   
 } 	//set

}	//student id session
else
   {
    echo 'SESSION UNDEFINED!!';
   }

  mysqli_close($conn);

?>