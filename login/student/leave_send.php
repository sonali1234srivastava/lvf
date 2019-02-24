<?php
include '../../connect_db.php';
include '../../validate_input.php';
include '../../email_configuration.php';
                                  //'".$faculty_username."'
if(isset($_POST["leave_id"]))
{
	$leave_id = $_POST["leave_id"];

   $query = "SELECT * FROM leave_detail WHERE leave_id = '$leave_id' "; 
   $result = mysqli_query($conn,$query);
   $row = mysqli_fetch_assoc($result);
   $student_name=$row["student_name"];
   $leave_period = $row["leave_period"];
   $day_from = $row["day_from"];
   $day_to = $row["day_to"];
   $reason = $row["reason"];
   $hostel_name = $row["hostel_name"];

   $email_subject = "A Leave Request from ".$student_name."";
$email_body = "

    A student, <b>".$student_name."</b> is requesting for a leave of <b>".$leave_period."</b> day(s) from <b>".$day_from."</b> to <b>".$day_to."</b> on the account of <b>".$reason."</b>.</br>
      For detailed information, kindly <a href = 'http://13.232.76.179/leave_form/login/index.php'>LOGIN</a> and consider the request!!" ;

$mail->Subject = $email_subject;
$mail->Body    = $email_body;

    $query = "SELECT * FROM warden_detail WHERE hostel_name = '".$hostel_name."' ";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){
	$warden_email = $row["email"];
	
     $mail->addBCC($warden_email);
   }  
    if($mail->send())
   { 	

	$query = "UPDATE leave_detail SET status = '1' WHERE leave_id = '$leave_id'";
	if(mysqli_query($conn,$query))
		{
			echo '101';
		}
	else{
		//die("Connection failed: " . mysqli_error($conn));
		echo "Connection failed, leave request cannot be send properly now, try again later.";
	   }
  }
  else {
 	  echo 102;
    }
 }  //isset
    mysqli_close($conn);

?>	