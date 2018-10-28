<?php
include '../core_session.php';

if(!loggedin())
{	
  header('Location: login_index.php');
 }
  
//echo "hey";


 
echo "</br></br></br>";
echo '<a href="logout.php"><input type="submit" value="SUBMIT LEAVE"></a>';
//<a href="student_login_form.php" type="button" class="button"><b>I'M STUDENT</b></a>

?>