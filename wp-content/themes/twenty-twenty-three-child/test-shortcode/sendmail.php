<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$param = json_decode($_REQUEST["param"]);

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
$mail->IsHTML(true);

$mail->setFrom("snapnake@gmail.com","Test message");
$mail->addAddress($param->email);
$mail->Subject = "Test message";


$body = "<h1>Test Message</h1>";
$body .= "<p>Name: ".$param->name."</p>";
$body .= "<p>Email: ".$param->email."</p>";
$body .= "<p>Phone: ".$param->phone."</p>";
$body .= "<p>Price: ".$param->price."</p>";


$mail->Body = $body;

if(!$mail->send()){
     $message = "&#x26A0; We cannot send you email right now. Use alternative way to contact us";
}else{
    $message = "&#9989; Your email was send successfully";
}

$response = ['message' => $message];
header("Content-type: application/json");
echo json_encode($response);
