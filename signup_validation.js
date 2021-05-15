var submit_form = new Array();

var users = new Array();
if(JSON.parse(localStorage.getItem('users'))!=null) {
  users = JSON.parse(localStorage.getItem('users'));
}

console.log(JSON.parse(localStorage.getItem('users')))
console.log(users)
function signup_validation() {  
  username1_validation();
  password1_validation();
  email1_validation();
  for (var i = 0; i < submit_form.length; i++) {
    if (submit_form[i] == false)
      return false;
  }
  addUser();
  return true;
}

function username1_validation() {

  var username_pattern = new RegExp(/^(?=.{8,20}$)(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/);
  var username = document.getElementById("username1").value;

  if (username.match(username_pattern)) {
    $("#username1").css("border", "1px solid green")
    submit_form[0] = true;
  }
  else {
    window.alert("Username must be 8-20 charachters-long,no space in between charachters, no _ or . at the end ")
    document.getElementById("username1").setAttribute("style", "border:1px red solid ");
    submit_form[0] = false;
  }
}

function password1_validation(){
  
  var password = document.getElementById("password1").value;
 

 if(password.length < 8 || password.length >20){
   window.alert("Password must be between 8 to 20 charachters")
   document.getElementById("password1").setAttribute("style","border:1px red solid ");
   submit_form[1] = false;
 }
 else if (!(/[a-z]/i).test(password)){
  window.alert("Password must contain at least one letter")
   document.getElementById("password1").setAttribute("style","border:1px red solid ");
   submit_form[1] = false;
 }
 else if((/[\s]/).test(password)) {
  window.alert("Password must not have white spaces")
   document.getElementById("password1").setAttribute("style","border:1px red solid ");
   submit_form[1] = false;
 }
 else if(!(/[\d]/).test(password)) {
  window.alert("Password must contain at least one digit")
   document.getElementById("password1").setAttribute("style","border:1px red solid ");
   submit_form[1] = false;
 }
 else {
  document.getElementById("password1").setAttribute("style","border:1px green solid ");
  submit_form[1] = true;
 }
}

function email1_validation() {
  const email_pattern = new RegExp(/^[^ ]+@[^ ]+\.[a-z]{2,3}$/);
  const email = document.getElementById("email1").value;
  if (email.match(email_pattern)) {
    document.getElementById("email1").setAttribute("style", "border:1px green solid ");
    submit_form[0] = true;
  }
  else {
    window.alert("Email format: someone@example.com")
    document.getElementById("email1").setAttribute("style", "border:1px red solid ");
    submit_form[0] = false;
  }
}

function User(id, username, email, password) {
  this.id = id;
  this.username = username;
  this.email = email;
  this.password = password;
}

function addUser() {
  let username = document.getElementById("username1").value;
  let email = document.getElementById("email1").value;
  let password = document.getElementById("password1").value;

  let user = new User(users.length, username, email, password);
  users.push(user);
}

window.onbeforeunload = function () {
    localStorage.setItem('users', JSON.stringify(users));
};
