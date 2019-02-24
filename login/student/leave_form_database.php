<?php
//echo "100";

 require '../../core_session.php';
require '../../connect_db.php';

  
//input validations start
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
if(loggedin())
{  
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
        echo '<div class = "alert alert-danger">Only valid semester number.</div>';
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
   /* if(!preg_match("/^[0-9 ]+$/", $days_from))
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid date.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[0-9 ]+$/", $days_to))
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid date.</div>';
    }
    else
    {
      $check = 1;

    }*/
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
    /*if(!preg_match("/^[0-9/: ]+$/", $date))
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid date.</div>';
    }
    else
    {
      $check = 1;

    }*/
   
    //enter into db now....
    if($check == 1)
   {
    
     $query = "INSERT INTO leave_detail 
        (student_name,room_number,roll_number,student_number,course_branch,semester,hostel_name,leave_period,day_from,day_to,reason,visiting_person_name,relation,address_contact_number,applicant_mobile_number,residence_address_number,student_signature,nowdate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";  
        $query_prepare_statement = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($query_prepare_statement, "siissiiissssssisss", $name,$room_number,$roll_number,$student_number,$course,$semester,$hostel_name,$leave_period,$days_from,$days_to,$reason,$visiting_person,$relation,$visiting_person_address,$applicant_number,$residence_address,$student_signature,$date); 

      //$query = "INSERT INTO leave_detail (student_name,room_number,roll_number) VALUES(?,?,?)" ;   //tried both quotes notations. 
       // $query = "INSERT INTO leave_detail (student_name,room_number,roll_number) VALUES($name,$room_number,$roll_number)";
         // $query_prepare_statement = mysqli_prepare($conn,$query);
        //if($query_prepare_statement)
      //{ 
        //if(mysqli_stmt_bind_param($query_prepare_statement, "sii", $name,$room_number,$roll_number))

         //{  //if($query_run = mysqli_query($conn,$query))

        if(mysqli_stmt_execute($query_prepare_statement))
       {
         echo "100";
         //header('Location: registered.php');     //on successful registration
       }
       else
       {
         //echo "unable to execute query";
         echo mysqli_error($conn);
        //echo "Sorry couldn\'t place your leave request, try again later.";  //this is not working well
       }

      //}else{
       // echo "unable to bind properly";
      //}
      
     //}
     //else
       //{
        //echo "query not prepared";
         //echo "mysqli_error($conn)";
       // echo "Sorry couldn\'t place your leave request, try again later.";  //this is not working well
       //}

   }

  }  //!empty if closes
  else
  {
    echo 'All fields are required!!';
  }

  }   //set if closes

}   //loggedin() if closes
else
   {
    echo 'User NOT LOGGED IN!!';
    //header('Location: login_index.php');
   }

   mysqli_stmt_close($query_prepare_statement);
 
// Close connection
  mysqli_close($conn);

?>