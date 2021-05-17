<?php 
include("login_validation.php");
class signup_validation extends validation {
  function __construct($username, $password, $username_field_id, $password_field_id, $password2, $email_address ){
    parent::__construct($username,$password,$username_field_id,$password_field_id);
    $this->email1_validation($email_address);
    $this->ChckPwdIfIdentical($password,$password2);
  }

 private function email1_validation($email_address) {
    global $js_manipulate;
    global $countJsDisplayedErrors;
      $email_pattern = "/^[^ ]+@[^ ]+\.[a-z]{2,3}$/";
      if (preg_match($email_pattern,$email_address)) {
          array_push($js_manipulate,"document.getElementById('email1').setAttribute('style', 'border:1px green solid ');");
      }
      else {
          array_push($js_manipulate,"window.alert('Email format: someone@example.com')");
          array_push($js_manipulate,"document.getElementById('email1).setAttribute('style', 'border:1px red solid ');");
          $countJsDisplayedErrors++;
      }
    }
  private function ChckPwdIfIdentical($password,$password2) {
      global $js_manipulate;
      global $errors;
        if($password==$password2){
            $_firstPwdCorrectness = $this->get_firstPwdCorrectness();
            if($_firstPwdCorrectness)
              array_push($js_manipulate,"document.getElementById('password2').setAttribute('style', 'border:1px green solid ');");
            else
              array_push($js_manipulate,"document.getElementById('password2').setAttribute('style', 'border:1px red solid ');");
               
        }
        else {
            array_push($errors,"Passwords do not match!");
            array_push($js_manipulate,"document.getElementById('password1').setAttribute('style', 'border:1px red solid ');");
            array_push($js_manipulate,"document.getElementById('password2').setAttribute('style', 'border:1px red solid ');");
        }
    }
  function __destruct(){
    $_alert_errors = $this->get_alert_errors();
    global $js_manipulate;
    foreach ($_alert_errors as $error){
      array_push($js_manipulate,$error);
    }
  }
}

?>
