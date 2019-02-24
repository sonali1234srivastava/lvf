<?php
include '../../connect_db.php';
include '../../validate_input.php';
include '../../email_configuration.php';
                                  //'".$faculty_username."'
if(isset($_POST["student_id"]))
{
	$student_id = $_POST["student_id"];

   $query = "SELECT * FROM student_detail WHERE id = '$student_id' "; 
   $result = mysqli_query($conn,$query);
   $row = mysqli_fetch_assoc($result);
   $student_name = $row["name"];
   $hostel_name = $row["hostel_name"];
   $room_number = $row["room_number"];
   $student_email = $row["email"];

   $email_subject = "Warden response for ".$student_name."";
$email_body = "
              Warden cordially welcomes you to AKGEC Girls' Hostel <b>GH".$hostel_name."</b> in room number <b>".$room_number."</b> for the upcoming year, hope you enjoy your stay!!<br>
             For sending any hostel leave request in future, kindly <a href = 'http://13.232.76.179/leave_form/login/index.php'>LOG IN</a> and send the request!!" ;

$mail->Subject = $email_subject;
$mail->Body    = $email_body;

    /*$query = "SELECT * FROM warden_detail WHERE hostel_name = '".$hostel_name."' ";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){
	$warden_email = $row["email"];*/
	
     $mail->addBCC($student_email);
   //}  
    if($mail->send())
   { 	

	$query = "UPDATE student_detail SET verify = '1' WHERE id = '$student_id'";
	if(mysqli_query($conn,$query))
		{
			echo '101';
		}
	else{
		//die("Connection failed: " . mysqli_error($conn));
		echo "Connection failed, warden approval response cannot be send properly now, try again later.";
	   }
  }
  else {
 	  echo 102;
    }
 }  //isset
    mysqli_close($conn);

?>	