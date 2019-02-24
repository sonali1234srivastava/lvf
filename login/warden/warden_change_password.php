<?php
include '../../core_session.php';
include "../../connect_db.php";
include '../../validate_input.php';
include '../../email_configuration.php';   
  //session_start();
  // echo "hello";
 if (isset($_POST["change_password_operation"]))
 { //echo "hello2";
 $check = 1;
 $warden_id = $_SESSION["warden_id"];
 //echo $warden_id;
 if (empty($_POST["warden_old_change_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $warden_old_change_password = test_input($_POST["warden_old_change_password"]);
      if (strlen($warden_old_change_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters !</div>';
       }
	   $warden_old_change_password=md5($warden_old_change_password);
     }
	 
	  if (empty($_POST["warden_new_change_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $warden_new_change_password = test_input($_POST["warden_new_change_password"]);
      if (strlen($warden_new_change_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters !</div>';
       }
	   $warden_new_change_password=md5($warden_new_change_password);
     }
	 
	  if (empty($_POST["warden_confirm_change_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $warden_confirm_change_password = test_input($_POST["warden_confirm_change_password"]);
      if (strlen($warden_confirm_change_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters!!</div>';
       }
	  $warden_confirm_change_password = md5($warden_confirm_change_password);
     }
	 
	 // Logic of Change Password Begin
	 if($check==1 && $warden_new_change_password==$warden_confirm_change_password){
		 
		  $query = "SELECT name,email FROM warden_detail WHERE id = ? AND password = ?";  
				$query_prepare_statement = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($query_prepare_statement, "is", $warden_id, $warden_old_change_password); 
				if ( mysqli_stmt_execute($query_prepare_statement)) {  
				
				  mysqli_stmt_store_result($query_prepare_statement);

          /* bind result variables */
                  mysqli_stmt_bind_result($query_prepare_statement, $warden_name, $warden_email);  //two step security

                   /* fetch value */
                  mysqli_stmt_fetch($query_prepare_statement);

				  $count = mysqli_stmt_num_rows($query_prepare_statement); 
                if($count > 0)  {

               $email_subject = "LVF Digitalisation Security";
                    $email_body = "
                    <b>".$warden_name."</b> your password was successfully reset<br>
                    Hope that you have reset your password.<br>
                    Hi <b>".$warden_name."</b>,<br>
                    You have successfully changed your LVF password.<br>
                    Thanks for using LVF Digitalisation!!<br>
                    Regards Team CSI
                  ";

                    $mail->Subject = $email_subject;
                    $mail->Body    = $email_body;
                    $mail->addBCC($warden_email);     
					
					     $query = "UPDATE warden_detail
                        SET  password = ? , password_again = ?
                        WHERE id = '$warden_id'";
                        $query_prepare_statement = mysqli_prepare($conn, $query);
		                mysqli_stmt_bind_param($query_prepare_statement, "ss", $warden_new_change_password, $warden_confirm_change_password);
                        if (mysqli_stmt_execute($query_prepare_statement)){

							               if($mail->send()){
                                 echo '<div class="alert alert-success">Password has been Changed!!</div>';
                             }
                             else{
                               echo '<div class="alert alert-success">Your password has been Changed but due to some network problem you could not receive the Security mail.<br> Hope that you yourself have changed the password. </div>';
                             }    

		                }
		                else{
							echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
		                }
					
				}
				else{
					echo '<div class="alert alert-danger">Wrong Password!!</div>'; 
				}
	   }
		       
	 }else{
       echo '<div class="alert alert-danger">New Password do not match, write again!!</div>';
   }

 }  //isset
  mysqli_close($conn);
?>