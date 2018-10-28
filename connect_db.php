<?php
$mysql_err = 'could not connect';
$mysql_host = 'db4free.net';
$mysql_user = 'sonali1234';
$mysql_pass = '123456789';
$mysql_db = 'hostle_detail';

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(!@mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db) || !@mysqli_select_db($conn,$mysql_db))
{
   die($mysql_err);

}


?>