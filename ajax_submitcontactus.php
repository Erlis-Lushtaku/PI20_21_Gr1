<?php 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function email_validation($email){
return (!preg_match("/^[^ ]+@[^ ]+\.[a-z]{2,3}$/",$email))? FALSE: TRUE;
}

function name_validation($name){
return (!preg_match("/^([a-zA-Z]){2,30}$/",$name))? FALSE: TRUE;
}

function company_validation($company){
return (!preg_match("/^([a-zA-Z ]){2,30}$/",$company))?FALSE:TRUE;
}

function budget_validation($budget){
  return (!preg_match("/^[1-9]+\.?[0-9]*$/",$budget))? FALSE:TRUE;
  } 
$errarray=array();

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    array_push($errarray,$nameErr);
  } else {
    $name = test_input($_POST["name"]);
    if(!name_validation($name)){
      $nameErr = "Name is required";
      array_push($errarray,$nameErr);
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    array_push($errarray,$emailErr);
  } 
  else {
    $email = test_input($_POST["email"]);
    if(!email_validation($email)){
      $emailerr="Email is required";
      array_push($errarray,$emailerr);
  }
  }

    if (empty($_POST["company"])) {
      $companyErr = "Company is required";
      array_push($errarray,$companyErr);
    } else {
      $company = test_input($_POST["company"]);
      if(!company_validation($company)){
        $companyErr = "Company is required";
        array_push($errarray,$companyErr);
      }
    }
  
    if (empty($_POST["number"])) {
      $budgetErr = "budget is required";
      array_push($errarray,$budgetErr);
    } else {
      $budget = test_input($_POST["number"]);
      if(!budget_validation($budget)){
        $budgetErr = "budget is required";
        array_push($errarray,$budgetErr);
      }
    }
    
if(!empty($errarray)){
 //Mos bo kurgjo nese ka elemente n array 
}
else{
$cli_inv=test_input($_POST['person']);
$subject="Lloji:".$cli_inv;

$message="<html><body>";
$message.="<p><b>Emri:</b>".$name."</p>";
$message.="<p><b>Email:</b>".$email."</p>";
$message.="<p><b>Company:</b>".$company."</p>";
$message.="<p><b>Budget:</b>".$budget."</p>";

if(test_input(trim($_POST['details']))!=""){
  $message.="<p><b>Pershkrimi per detajet e projektit:</b>".test_input($_POST['details'])."</p>";
}
else{
  $message.="<p><b>Pershkrimi per detajet e projektit:</b>nuk ka</p>";
}
if(test_input(trim($_POST['categories-choice']))!=""){
  $message.="<p><b>Cfare po kerkoni:</b>".test_input($_POST['categories-choice'])."</p>";
  }
  else{
    $message.="<p><b>Cfare po kerkoni:</b>e pacaktuar</p>";
  }
$message.="</body></html>";
include('emailfunc.php');
sendmail('BPAContactBusiness@gmail.com',$message,$subject,'BPAContactBusiness@gmail.com','bpa1234.');

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
sendmail($email,$body2,$subject2,'BPAContactBusiness@gmail.com','bpa1234.');
}
?>
