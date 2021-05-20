<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail2=new PHPMailer(true);

$name=htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$company=htmlspecialchars($_POST['company']);
$budget=htmlspecialchars($_POST['number']);

$cli_inv=htmlspecialchars($_POST['person']);
$subject="Lloji:".$cli_inv;

$message="<html><body>";
$message.="<p><b>Emri:</b>".$name."</p>";
$message.="<p><b>Email:</b>".$email."</p>";
$message.="<p><b>Company:</b>".$company."</p>";
$message.="<p><b>Budget:</b>".$budget."</p>";

if(htmlspecialchars(trim($_POST['details']))!=""){
  $message.="<p><b>Pershkrimi per detajet e projektit:</b>".htmlspecialchars($_POST['details'])."</p>";
}
else{
  $message.="<p><b>Pershkrimi per detajet e projektit:</b>nuk ka</p>";
}
if(htmlspecialchars(trim($_POST['categories-choice']))!=""){
  $message.="<p><b>Cfare po kerkoni:</b>".htmlspecialchars($_POST['categories-choice'])."</p>";
  }
  else{
    $message.="<p><b>Cfare po kerkoni:</b>e pacaktuar</p>";
  }
$message.="</body></html>";

try {
  //$mail->SMTPDebug = 2;                                       
  $mail->isSMTP();                                            
  $mail->Host       = 'smtp.gmail.com';                    
  $mail->SMTPAuth   = true;                             
  $mail->Username   = 'donat.sinani@student.uni-pr.edu';                 
  $mail->Password   = '1232400192';                        
  $mail->SMTPSecure = 'tls';                              
  $mail->Port       = 587;  
  $mail->setFrom('donat.sinani@student.uni-pr.edu');         
  $mail->addAddress('donatsinani70@gmail.com');
     
  $mail->isHTML(true);                                  
  $mail->Subject = $subject;
  $mail->Body    = $message;
  $mail->AltBody = 'Body in plain text for non-HTML mail clients';
  $mail->send();
  $variabla=true;
  echo "<script>document.getElementById('persend').innerHTML='Message sent!'</script>";
} catch (Exception $e) {
  echo "<script>document.getElementById('persend').innerHTML='Message could not be sent!'</script>";
//  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
$variabla=false;
}

$subject2="Dear visitor";
$body2="<html><body>
<p>As it is said in our webpage, it will take up to 24 hours for us to come to you with a plan(in case you do not get a response in 24 hours, make sure to contact us again!).</p>
<p>Thank you for trusting us!</p>
<p><b>BPA staff</b></p>
<p><b>Phone:</b>Phone:+38344111222,
Hand:+38345121212</p>
<p><b>Adress:</b>Bregu i Diellit, p.n.10000
Prishtinë</p>
<p><b>Email:</b>contactbusiness@gmail.com
</p>
</body></html>";

$mail2->isSMTP();                                            
  $mail2->Host       = 'smtp.gmail.com';                    
  $mail2->SMTPAuth   = true;                             
  $mail2->Username   = 'donat.sinani@student.uni-pr.edu';                 
  $mail2->Password   = '1232400192';                        
  $mail2->SMTPSecure = 'tls';                              
  $mail2->Port       = 587;  
  $mail2->setFrom('donat.sinani@student.uni-pr.edu');         
  $mail2->addAddress($email);
  $mail2->isHTML(true);                                  
  $mail2->Subject = $subject2;
  $mail2->Body    = $body2;
  $mail2->AltBody = 'Body in plain text for non-HTML mail clients';
  $mail2->send();

?>
