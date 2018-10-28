<?php
     ob_start();
     session_start();
    require 'connect_db.php';
   
   /*$current_file = $_SERVER['SCRIPT_NAME'];
   
   if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
  { $referer = $_SERVER['HTTP_REFERER']; }
*/
   function loggedin()
   {
   if(isset($_SESSION["student_id"])&& !empty($_SESSION["student_id"]))
    return true;
   else
    return false;
   }

/*function getfield($field)
   {   global $conn;
     if(isset($_SESSION['uid']) && !empty($_SESSION['uid']))
    {
      $i = $_SESSION['uid'];
   $q2= "SELECT $field FROM user WHERE id='$i'";
   if($q2_run= mysqli_query($conn,$q2))
     {    $row2 = mysqli_fetch_row($q2_run);
        $n = strtoupper($row2[0]);
    // echo 'Welcome '.$n.' , We have a lot new for you to explore!!!';
      return $n;
     }
    }
   }
*/
   
?>

