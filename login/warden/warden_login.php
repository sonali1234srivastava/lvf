<?php
ob_start();
session_start();
 require '../../connect_db.php';

  // echo "4";
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
   
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username) || strlen($username)!=7)
    {
      $check = 0;
      echo '<div class = "alert alert-danger">Only valid student number.</div>';
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

    if($check == 1)
    {
      $get_warden_id_query = "SELECT id, is_email_confirmed FROM warden_detail WHERE username = ? AND password = ?";
      $query_prepare_statement = mysqli_prepare($conn,$get_warden_id_query);
      mysqli_stmt_bind_param($query_prepare_statement, "ss", $username , $password_hash);

      if(mysqli_stmt_execute($query_prepare_statement))
      {
        mysqli_stmt_store_result($query_prepare_statement);
        $query_num_rows = mysqli_stmt_num_rows($query_prepare_statement);

        mysqli_stmt_bind_result($query_prepare_statement, $warden_id , $is_email_confirmed);
        mysqli_stmt_fetch($query_prepare_statement);

        if($query_num_rows > 0)
        {
          if($is_email_confirmed == '1')
          {
            $_SESSION["warden_id"] = $warden_id;
            if(isset($_SESSION["warden_id"])&& !empty($_SESSION["warden_id"]))
              {
                echo "100";
              }
          } 
          else{  
                 echo 'Please first verify your EMAIL Detail!!' ;
              } 
        }
        else {
         echo 'Incorrect Username and Password combination.';
       }

      }

       mysqli_stmt_close($query_prepare_statement);

    }

  }  //all fields required
  else
  {
    echo 'All fields are required.';
  }
 }    //all fields are set

?>