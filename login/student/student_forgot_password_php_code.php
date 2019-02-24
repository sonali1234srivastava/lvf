<?php
include '../../connect_db.php';
include '../../validate_input.php';
include '../../email_configuration.php';
if(isset($_POST["username_email"])){
	$username_email = test_input($_POST["username_email"]);
	$username_email = mysqli_real_escape_string($conn,$username_email);
	//echo '<span class="text-success"><b>'.$hod_username_email.'</b></span>';
	$query = "SELECT id,email FROM student_detail WHERE username = ?";  
				$query_prepare_statement = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($query_prepare_statement, "i", $username_email);  
                if ( mysqli_stmt_execute($query_prepare_statement)) {  
				
				  mysqli_stmt_store_result($query_prepare_statement);  //single step security
				  
				   /* bind result variables */
                  mysqli_stmt_bind_result($query_prepare_statement, $student_id, $student_email);  //two step security

                   /* fetch value */
                  mysqli_stmt_fetch($query_prepare_statement);
				  
                $count = mysqli_stmt_num_rows($query_prepare_statement); 
                if($count > 0)  
                {  
                    $str= "123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
					$str = str_shuffle($str);
					$str = substr($str,0,10);
					//$url = "http://localhost/leave_form/login/student_reset_password.php?token=$str&email=$student_email";
					$email_subject = "Password Reset Link for LVF";
                    $email_body = "
                    Click on the link below to reset your password!!<br><br>
                    <center><a href = 'http://13.232.76.179/leave_form/login/student/student_reset_password.php?token=$str&email=$student_email'>Click Here</a></center>
                    ";

                    $mail->Subject = $email_subject;
                    $mail->Body    = $email_body;
                    $mail->addBCC($student_email);	
					 if($mail->send())
                       {                 //  "UPDATE student_detail SET is_email_confirmed = '1' , token = '' WHERE email = '$email' "    sent to "$student_email" 
                     	  $query = "Update student_detail SET token = '$str' WHERE id = '$student_id'";
					mysqli_query($conn,$query);
					
					$output["message"] = '<span class="text-success"><b> Kindly check your registered email,  '.$student_email.'  to reset your password!!</b></span>';
					$output["number"] = "100";
                       }
                       else {
	                     $output["message"] = '<span class="text-danger"><b>Kindly refresh the page and Try Again !</b></span>';  
						 $output["number"] = "101";
                       }
					
					
                }  
                else  
                {  
                     $output["message"] = '<span class="text-danger"><b>Wrong Username or Email Credentials!!</b></span>';  
					 $output["number"] = "101";
                } 
		        }
}else{
	$output["message"] = '<span class="text-danger"><b>This field is required !</b></span>';
	$output["number"] = "101";
}
echo json_encode($output);	
mysqli_close($conn);
?>