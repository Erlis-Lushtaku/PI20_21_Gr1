<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
function sendmail($adress,$message,$subject,$username,$password){

    $mail = new PHPMailer(true);
    try {
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true; 
    $mail->Username   = $username;                 
    $mail->Password   = $password;
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587; 
    $mail->setFrom($username);         
    $mail->addAddress($adress);
    $mail->isHTML(true);  
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
       }
}
?>