<?php
include '../../connect_db.php';
include '../../validate_input.php';

    function redirect(){

    	header('Location: index.php');
    	exit();
    }

  if(!isset($_GET["email"]) || !isset($_GET["token"]))
  {
      redirect();
  }
  else{
        $default = 0;

       $email = test_input($_GET["email"]);
	   $email = mysqli_real_escape_string($conn,$email);

	   $token = test_input($_GET["token"]);
	   $token = mysqli_real_escape_string($conn,$token);

	   $query = "SELECT id FROM warden_detail WHERE email = ? AND token = ? AND is_email_confirmed = ?";

	   $query_prepare_statement = mysqli_prepare($conn,$query);
      mysqli_stmt_bind_param($query_prepare_statement, "ssi", $email,$token,$default);

      if(mysqli_stmt_execute($query_prepare_statement))
    {
        mysqli_stmt_store_result($query_prepare_statement);
      $query_num_rows = mysqli_stmt_num_rows($query_prepare_statement);

      if($query_num_rows > 0)
      { 
        $query = "UPDATE warden_detail SET is_email_confirmed = '1' , token = '' WHERE email = '$email' ";
        mysqli_query($conn,$query);
         header('Location: registered.php');
         //echo "YOU HAVE NOW BEEN SUCCESSFULLY REGISTERED, PLEASE WAIT FOR WARDEN VERIFICATION!!";
      }
      else{
      	  redirect();
      }
    }
     
  }


?>  

