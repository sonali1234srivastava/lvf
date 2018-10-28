<?php

require '../../core_session.php';
require '../../connect_db.php';
include '../../email_configuration.php';

//input validations start
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
//if(!loggedin())
//{

     $secret = '6LdGFXcUAAAAAFo6gxzF4zK8lMW_DQZzmu4EvjDN';
       $response = $_POST['g-recaptcha-response'];
       $remoteip = $_SERVER['REMOTE_ADDR'];

       $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
       $result = json_decode($url, TRUE);

       if($result['success'] == 1)
{  //captcha ....


  if(isset($_POST["name"]) && isset($_POST["number"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password_again"]) && isset($_POST["hostel_name"]) && isset($_POST["home_address"]) )
 {
 	 $check = 1;

 $name = $_POST["name"];
 $number = $_POST["number"];
 $email = $_POST["email"];
 /*$course = $_POST["course"];
 $branch = $_POST["branch"];
 $year =  $_POST["year"];*/
 $username = $_POST["username"];
 $password = $_POST["password"];
 $password_again = $_POST["password_again"];
 $hostel_name = $_POST["hostel_name"];
 $home_address = $_POST["home_address"];
/*$father_name = $_POST["father_name"];
 $father_number = $_POST["father_number"];*/



  if(!empty($name) && !empty($number) && !empty($email) && !empty($username) && !empty($password) && !empty($password_again) && !empty($hostel_name) && !empty($home_address) )
  {
  	$name =test_input($_POST["name"]);
    $number = test_input($_POST["number"]);
    $email = test_input($_POST["email"]);
   /* $course = test_input($_POST["course"]);
    $branch = test_input($_POST["branch"]);
    $year =  test_input($_POST["year"]);*/
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $password_again = test_input($_POST["password_again"]);
    $hostel_name = test_input($_POST["hostel_name"]);
    $home_address = test_input($_POST["home_address"]);
    /*$father_name = test_input($_POST["father_name"]);
    $father_number = test_input($_POST["father_number"]);*/


   
    if(!preg_match("/^[a-zA-Z ]+$/", $name))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the name.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[0-9]*$/", $number) || strlen($number)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid contact number.</div>';
    }
    else
    {
      $check = 1;

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
       {
        $check = 0;
        echo '<div class="alert alert-danger">Invalid Email</div>';
       }
    else{
       $check = 1;
    }  
    /*if(!preg_match("/^[a-zA-Z ]+$/", $course))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the course.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[a-zA-Z ]+$/", $branch))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the branch.</div>';
    }  else
      {
         $check = 1;
      }  
     if(!preg_match("/^[a-zA-Z1-4 ]+$/", $year))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">letters or numbers only.</div>';
    }  else
      {
         $check = 1;
      }*/

      if(!preg_match("/^[a-zA-Z0-9]*$/", $username) || strlen($username)<7)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid warden userid.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[a-zA-Z0-9$@# ]*$/", $password) || strlen($password)<7)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Invalid Password.</div>';
    }
    else
    {
      $check = 1;
      $password_hash = md5($password);
    }
    if(!preg_match("/^[a-zA-Z0-9$@# ]*$/", $password_again) || strlen($password_again)<7)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Invalid Password.</div>';
    }
    else
    {
      $check = 1;
      $password_again_hash = md5($password_again);
    }
    if(!preg_match("/^[1-3]+$/", $hostel_name))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Invalid hostel name format.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[a-zA-Z0-9, ]+$/", $home_address))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">letters numbers or , only.</div>';
    }  else
      {
         $check = 1;
      }
    /*if(!preg_match("/^[a-zA-Z ]+$/", $father_name))
    {
        $check = 0;
        echo '<div class = "alert alert-danger">Only letters in the name.</div>';
    }  else
      {
         $check = 1;
      }
    if(!preg_match("/^[0-9]*$/", $father_number) || strlen($father_number)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid contact number.</div>';
    }
    else
    {
      $check = 1;

    }*/
    
   //input validations closes 
  
    if($check == 1)
   {
 
    if($password == $password_again)
     {

      $get_warden_username_query = "SELECT username FROM warden_detail WHERE username = ? ";
      $query_prepare_statement = mysqli_prepare($conn,$get_warden_username_query);
      mysqli_stmt_bind_param($query_prepare_statement, "s", $username);

      if(mysqli_stmt_execute($query_prepare_statement))
    {
        mysqli_stmt_store_result($query_prepare_statement);
      $query_num_rows = mysqli_stmt_num_rows($query_prepare_statement);

      if($query_num_rows == 0)
      {
        $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
        $token = str_shuffle($token);
        $token = substr($token,0,10);
         $default = 0 ;

        $query = "INSERT INTO warden_detail 
        (name,number,email,username,password,password_again,hostel_name,home_address,is_email_confirmed,token) VALUES(?,?,?,?,?,?,?,?,?,?)" ;
        $query_prepare_statement = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($query_prepare_statement, "sissssisis", $name,$number,$email,$username,$password_hash,$password_again_hash,$hostel_name,$home_address,$default,$token);

        if(@mysqli_stmt_execute($query_prepare_statement))
       {
         //echo "100";
         //header('Location: registered.php');     //on successful registration
         $mail->Subject = "Please verify your Email ".$name." !!";
         $mail->Body = "
                Please click on the link below :<br/><br/>
             <center><a href = 'http://localhost/leave_form/registration/warden/confirm.php?email=$email&token=$token'>Click Here</a></center>
         ";
        $mail->addBCC($email);
         if($mail->send())
         echo "100";
         else
          echo "Mailer Error: " . $mail->ErrorInfo;
       }
       else
       {
        echo "Sorry couldn\'t be registered now, try again later.";
       }

      }
      else
      {
        echo 'Username '.$username.' already exists!';
      }

     }
    
   }
    else
    {
      echo "Passwords don\'t match each other.";
    }  
       
  }


 }  //!empty if closes
  else
  {
    echo 'All fields are required.';
  }


  }   //set if closes

}   //... captcha if closes 

/*}   //!loggedin() if closes
else
   {
    echo 'User already LOGGED IN!!';
   }*/

?>   
  