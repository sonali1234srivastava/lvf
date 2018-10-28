<?php
 include '../../core_session.php';
 require '../../connect_db.php';


 function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["username"]) && isset($_POST["password"]))
 {
 	 $check = 1;

 $username =$_POST["username"];
 $password = $_POST["password"];

  if(!empty($username) && !empty($password))
  {
  	$username =test_input($_POST["username"]);
    $password = test_input($_POST["password"]);   
   
    if(!preg_match("/^[0-9]+$/", $username) || strlen($username)!=10)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid University Roll Number.</div>';
    }
    else
    {
      $check = 1;

    }
    if(!preg_match("/^[a-zA-Z0-9$@# ]+$/", $password) || strlen($password)<7)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Invalid Password.</div>';
    }
    else
    {
      $check = 1;
      $password_hash = md5($password);
    }

    if($check == 1)
    {
      
      //$get_student_id_query = "SELECT username FROM student_detail WHERE username = ? AND password = ?";   AND password = ? AND is_email_confirmed = ?
      $get_student_id_query = "SELECT id , is_email_confirmed , verify FROM student_detail WHERE username = ? AND password = ? ";
      $query_prepare_statement = mysqli_prepare($conn,$get_student_id_query);
  
      mysqli_stmt_bind_param($query_prepare_statement, "is", $username , $password_hash);

      if(mysqli_stmt_execute($query_prepare_statement))
      {
        mysqli_stmt_store_result($query_prepare_statement);
        $query_num_rows = mysqli_stmt_num_rows($query_prepare_statement);

        mysqli_stmt_bind_result($query_prepare_statement, $student_id , $is_email_confirmed , $verify);
        mysqli_stmt_fetch($query_prepare_statement);
      
        if($query_num_rows > 0)
      {
          if($is_email_confirmed == '1')
          {
              if($verify == '1')
              {  
                  $_SESSION["student_id"] = $student_id;
          
                  echo "100" ;
              }  // not verified by warden
              else{
                echo 'Please wait for warden verification first.' ;
              }    
          }// not verified
          else{  
                 echo 'Please first verify your EMAIL Detail!!' ;
              }
      }  // only one row fetched
       else{
               echo 'Incorrect Student Credentials!!';
           }

      }
      /*else{
            //echo "error in connection";
           $string = mysqli_stmt_error($query_prepare_statement);
            echo $string;
          //echo "";   look for error mssg connection function with prepared statements... ITS DONE 

      }*/

      mysqli_stmt_close($query_prepare_statement);
   
     
      

    }

  }  //all fields required
  else
  {
    echo 'All fields are required.';
  }
 }    //all fields are set

?>