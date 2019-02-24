<?php
include '../../connect_db.php';
include '../../validate_input.php';


$warden_email = test_input($_POST["warden_email"]);
$warden_email = mysqli_real_escape_string($conn,$warden_email);
$warden_token = test_input($_POST["warden_token"]);
$warden_token = mysqli_real_escape_string($conn,$warden_token);

//echo $hod_reset_password ."<br>". $hod_confirm_reset_password ."<br>". $hod_email ."<br>". $hod_token;


$check = 1;
   if (empty($_POST["warden_reset_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $warden_reset_password = test_input($_POST["warden_reset_password"]);
      $warden_reset_password = mysqli_real_escape_string($conn,$warden_reset_password);
      if (strlen($warden_reset_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters !</div>';
       }
	   $warden_reset_password=md5($warden_reset_password);
     }
	 
   if (empty($_POST["warden_confirm_reset_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $warden_confirm_reset_password = test_input($_POST["warden_confirm_reset_password"]);
      $warden_confirm_reset_password = mysqli_real_escape_string($conn,$warden_confirm_reset_password);
      if (strlen($warden_confirm_reset_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters !</div>';
       }
	   $warden_confirm_reset_password=md5($warden_confirm_reset_password);
     }
	 
	   if (empty($_POST["warden_token"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Link Expired !</div>';
     }

if($check==1 && $warden_reset_password==$warden_confirm_reset_password){
	
			  $query = "SELECT * FROM warden_detail WHERE email = ? AND token = ?";  
				$query_prepare_statement = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($query_prepare_statement, "ss", $warden_email, $warden_token); 
				if ( mysqli_stmt_execute($query_prepare_statement)) {  
				
				  mysqli_stmt_store_result($query_prepare_statement);
				  $count = mysqli_stmt_num_rows($query_prepare_statement); 
                if($count > 0)  {
					
					     $query = "UPDATE warden_detail
                        SET  password = ? , password_again = ? 
                        WHERE email = '$warden_email' AND token = '$warden_token'";
                        $query_prepare_statement = mysqli_prepare($conn, $query);
		                mysqli_stmt_bind_param($query_prepare_statement, "ss", $warden_reset_password, $warden_confirm_reset_password);
                        if (mysqli_stmt_execute($query_prepare_statement)){
							$query = "UPDATE warden_detail SET token = '' WHERE email = '$warden_email'";
							mysqli_query($conn,$query);
							echo '<div class="alert alert-success">Password Reset Successfully, <a href = "http://13.232.76.179/leave_form/login/warden/index.php">Click Here</a> to LOGIN.</div>';
		                }
		                else{
							echo '<div class="alert alert-danger">' . mysqli_error($connect) . '</div>';
		                }
					
				}
				else{
					echo '<div class="alert alert-danger">Link Expired!!</div>'; 
				}
	         }
	
}
  mysqli_close($conn);	 

?>

