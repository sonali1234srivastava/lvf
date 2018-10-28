<?php
  require '../../core_session.php';
  include '../../header.php';
  //later send mail to warden here
   session_destroy();
   //header('Location: gratitude.php');
   //window.location.href = "gratitude.php";
   echo '<div class ="alert alert-success" style ="text-align: center;" ><b><i>THANK YOU!!</i></b></div>';
?>