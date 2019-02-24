<?php
include '../../connect_db.php';
include '../../validate_input.php';


$student_email = test_input($_POST["student_email"]);
$student_email = mysqli_real_escape_string($conn,$student_email);
$student_token = test_input($_POST["student_token"]);
$student_token = mysqli_real_escape_string($conn,$student_token);

//echo $hod_reset_password ."<br>". $hod_confirm_reset_password ."<br>". $hod_email ."<br>". $hod_token;


$check = 1;
   if (empty($_POST["student_reset_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $student_reset_password = test_input($_POST["student_reset_password"]);
      $student_reset_password = mysqli_real_escape_string($conn,$student_reset_password);
      if (strlen($student_reset_password)<7)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 7 Characters !</div>';
       }
	   $student_reset_password=md5($student_reset_password);
     }
	 
   if (empty($_POST["student_confirm_reset_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $student_confirm_reset_password = test_input($_POST["student_confirm_reset_password"]);
      $student_confirm_reset_password = mysqli_real_escape_string($conn,$student_confirm_reset_password);
      if (strlen($student_confirm_reset_password)<7)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 7 Characters !</div>';
       }
	   $student_confirm_reset_password=md5($student_confirm_reset_password);
     }
	 
	   if (empty($_POST["student_token"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Link Expired !</div>';
     }

if($check==1 && $student_reset_password==$student_confirm_reset_password){
	
			  $query = "SELECT * FROM student_detail WHERE email = ? AND token = ?";  
				$query_prepare_statement = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($query_prepare_statement, "ss", $student_email, $student_token); 
				if ( mysqli_stmt_execute($query_prepare_statement)) {  
				
				  mysqli_stmt_store_result($query_prepare_statement);
				  $count = mysqli_stmt_num_rows($query_prepare_statement); 
                if($count > 0)  {
					
					     $query = "UPDATE student_detail
                        SET  password = ? , password_again = ? 
                        WHERE email = '$student_email' AND token = '$student_token'";
                        $query_prepare_statement = mysqli_prepare($conn, $query);
		                mysqli_stmt_bind_param($query_prepare_statement, "ss", $student_reset_password, $student_confirm_reset_password);
                        if (mysqli_stmt_execute($query_prepare_statement)){
							$query = "UPDATE student_detail SET token = '' WHERE email = '$student_email'";
							mysqli_query($conn,$query);
							echo '<div class="alert alert-success">Password Reset Successfully, <a href = "http://13.232.76.179/leave_form/login/student/index.php">Click Here</a> to LOGIN.</div>';
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

