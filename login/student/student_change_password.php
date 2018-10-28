<?php
include '../../core_session.php';
include "../../connect_db.php";
include '../../validate_input.php';
  
  //session_start();
  // echo "hello";
 if (isset($_POST["change_password_operation"]))
 { //echo "hello2";
 $check = 1;
 $student_id = $_SESSION["student_id"];
 //echo $student_id;
 if (empty($_POST["student_old_change_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $student_old_change_password = test_input($_POST["student_old_change_password"]);
      if (strlen($student_old_change_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters !</div>';
       }
	   $student_old_change_password=md5($student_old_change_password);
     }
	 
	  if (empty($_POST["student_new_change_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $student_new_change_password = test_input($_POST["student_new_change_password"]);
      if (strlen($student_new_change_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters !</div>';
       }
	   $student_new_change_password=md5($student_new_change_password);
     }
	 
	  if (empty($_POST["student_confirm_change_password"]))
     {
      $check = 0;
      echo '<div class="alert alert-danger">Password is required</div>';
     }
    else
     {
      $student_confirm_change_password = test_input($_POST["student_confirm_change_password"]);
      if (strlen($student_confirm_change_password)<6)
       {
        $check = 0;
        echo '<div class="alert alert-danger">Password must be of minimum 6 Characters!!</div>';
       }
	  $student_confirm_change_password = md5($student_confirm_change_password);
     }
	 
	 // Logic of Change Password Begin
	 if($check==1 && $student_new_change_password==$student_confirm_change_password){
		 
		  $query = "SELECT * FROM student_detail WHERE id = ? AND password = ?";  
				$query_prepare_statement = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($query_prepare_statement, "is", $student_id, $student_old_change_password); 
				if ( mysqli_stmt_execute($query_prepare_statement)) {  
				
				  mysqli_stmt_store_result($query_prepare_statement);
				  $count = mysqli_stmt_num_rows($query_prepare_statement); 
                if($count > 0)  {
					
					     $query = "UPDATE student_detail
                        SET  password = ? , password_again = ?
                        WHERE id = '$student_id'";
                        $query_prepare_statement = mysqli_prepare($conn, $query);
		                mysqli_stmt_bind_param($query_prepare_statement, "ss", $student_new_change_password, $student_confirm_change_password);
                        if (mysqli_stmt_execute($query_prepare_statement)){
							echo '<div class="alert alert-success">Password Changed!!</div>';
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