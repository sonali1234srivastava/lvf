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
   $hostel_name = $row["hostel_name"];
   $student_roll_number = $row["roll_number"];

   $email_subject = "Warden response for ".$student_name."";
$email_body = "
              Student <b>".$student_name."</b> , resident of hostel <b>GH".$hostel_name."</b> is being Denied of the leave for <b>".$leave_period."</b> day(s) from <b>".$day_from."</b> to <b>".$day_to."</b> on account of some Verification issue!!<br>
              So kindly meet the warden in person for the clearification. " ;


$mail->Subject = $email_subject;
$mail->Body    = $email_body;

    $query = "SELECT * FROM student_detail WHERE username = '".$student_roll_number."' ";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){
	$student_email = $row["email"];
	
     $mail->addBCC($student_email);
   }  
    if($mail->send())
   { 	

	$query = "UPDATE leave_detail SET accept = '2' WHERE leave_id = '$leave_id'";
	if(mysqli_query($conn,$query))
		{
			echo '101';
		}
	else{
		//die("Connection failed: " . mysqli_error($conn));
		echo "Connection failed, warden leave refusal response cannot be send properly now, try again later.";
	   }
  }
  else {
 	  echo 102;
    }
 }  //isset
    mysqli_close($conn);

?>	