<?php 
class validation {
private $firstPwdCorrectness = True;
private $alert_errors = array();
function __construct($username,$password,$username_field_id,$password_field_id){
  $this->username_validation($username,$username_field_id );
  $this->password_validation($password,$password_field_id);
}
  protected function username_validation($username,$username_field_id) {

      $username_pattern = "/^(?=.{8,20}$)(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/i";
      global $js_manipulate;
      global $countJsDisplayedErrors;
      if (preg_match($username_pattern,$username)) {
        array_push($js_manipulate, "document.getElementById('$username_field_id').setAttribute('style','border:1px green solid ')");
      }
      else {
        array_push($js_manipulate,"window.alert('Username must be 8-20 charachters-long,no space in between charachters, no _ or . at the end ')");
        array_push($js_manipulate, "document.getElementById('$username_field_id').setAttribute('style','border:1px red solid ')");
        $countJsDisplayedErrors++;
      }
    }

  protected function password_validation($password,$password_field_id){   
    global $js_manipulate;
    global $countJsDisplayedErrors;
    if(strlen($password) < 8 || strlen($password) >20){
      array_push($this->alert_errors,"window.alert('Password must be between 8 to 20 charachters')");
      array_push($js_manipulate,"document.getElementById('$password_field_id').setAttribute('style','border:1px red solid ')");
      $this->set_firstPwdCorrectness(False);
      $countJsDisplayedErrors++;
    }
    else if (!preg_match("/[a-z]/i", $password)){
      array_push($this->alert_errors,"window.alert('Password must contain at least one letter')");
      array_push($js_manipulate,"document.getElementById('$password_field_id').setAttribute('style','border:1px red solid ');");
      $this->set_firstPwdCorrectness(False);
      $countJsDisplayedErrors++;
    }
    else if(preg_match("/[\s]/", $password)) {
      array_push($this->alert_errors,"window.alert('Password must not have white spaces')");
      array_push($js_manipulate,"document.getElementById('$password_field_id').setAttribute('style','border:1px red solid ');");
      $this->set_firstPwdCorrectness(False);
      $countJsDisplayedErrors++;
    }
    else if(!preg_match("/[\d]/", $password)) {
      array_push($this->alert_errors,"window.alert('Password must contain at least one digit')");
      array_push($js_manipulate,"document.getElementById('$password_field_id').setAttribute('style','border:1px red solid ');");
      $this->set_firstPwdCorrectness(False);
      $countJsDisplayedErrors++;
    }
    else{
      array_push($js_manipulate,"document.getElementById('$password_field_id').setAttribute('style','border:1px green solid ');");
    }
  }
  protected function set_firstPwdCorrectness($boolValue){
    $this->firstPwdCorrectness = $boolValue;
  }
  protected function get_firstPwdCorrectness(){
    return $this->firstPwdCorrectness;
  }
  protected function get_alert_errors(){
    return $this->alert_errors;
  }
}
?>