<?php
require 'additional/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'lvfakgec18@gmail.com';               // SMTP username
$mail->Password = 'akgecghaziabad2018';                   // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to then 587

$mail->setFrom('lvfakgec18@gmail', 'LVF');
    												  // Add a recipient           // Name is optional

$mail->isHTML(true);                                  // Set email format to HTML
?>
