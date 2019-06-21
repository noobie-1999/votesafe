<?php
$otp = rand(1000,9999);
$email = $_GET['email'];
//echo($email);
require_once('PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth= true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'atrichaturvedi@gmail.com';
$mail->Password = 'samosaonchutney';
$mail->SetFrom('no-reply@votesafe.gov');
$mail->Subject = 'Your Vote Safe OTP';
$mail->Body = 'Your OTP is '.$otp;
$mail->AddAddress(''.$email.'');
$mail->Send();
setcookie('otp',$otp);
header('LOCATION: verify.php');

?>
