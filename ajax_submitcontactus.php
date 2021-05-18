<?php 

$name=$_POST['name'];
$email=$_POST['email'];
$company=$_POST['company'];
$budget=$_POST['number'];

$headers    = "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers    .= "MIME-Version: 1.0" . "\r\n";
$headers    .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


  $cli_inv=$_POST['person'];
  $subject="Lloji:".$cli_inv;

$message="<html><body>";
$message.="<p><b>Emri:</b>".$name."</p>";
$message.="<p><b>Email:</b>".$email."</p>";
$message.="<p><b>Company:</b>".$company."</p>";
$message.="<p><b>Budget:</b>".$budget."</p>";
if(trim($_POST['details'])!=""){
  $message.="<p><b>Pershkrimi per detajet e projektit:</b>".$_POST['details']."</p>";
}
else{
  $message.="<p><b>Pershkrimi per detajet e projektit:</b>nuk ka</p>";
}
if(trim($_POST['categories-choice'])!=""){
  $message.="<p><b>Cfare po kerkoni:</b>".$_POST['categories-choice']."</p>";
  }
  else{
    $message.="<p><b>Cfare po kerkoni:</b>e pacaktuar</p>";
  }
$message.="</body></html>";

  $to = "donatsinani70@gmail.com";

mail($to,$subject,$message,$headers)

?>