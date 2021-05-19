<?php
try {
    $DBconnection = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'users' );
} catch (Exception $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
$username = "";             //e perdorum me ru username in nqs shtypet submit po forma nuk eshte plotsu mire
$email_address = "";
$errors = array();
$js_manipulate = array();
$countJsDisplayedErrors = 0;
if(isset($_POST['signup']))
{
    
                           //duhet me fshi
    $email_address = mysqli_real_escape_string($DBconnection,$_POST['email']);
    $username = mysqli_real_escape_string($DBconnection,$_POST['username']);
    $password = mysqli_real_escape_string($DBconnection,$_POST['password']);
    $password2 = mysqli_real_escape_string($DBconnection,$_POST['password2']);
    
    //E kryejme validimin e formes

    include("signUp_validation.php");
    new signup_validation($username,$password,'username1','password1',$password2, $email_address);
    $checkExistenceOfUserOrEmail = "SELECT * FROM users WHERE username='$username' OR email_address='$email_address'";
    $result = mysqli_query($DBconnection, $checkExistenceOfUserOrEmail);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
        if ($user['username'] == $username) {
            array_push($errors, "This username is already taken.");
            array_push($js_manipulate,"document.getElementById('username1').setAttribute('style','border:1px red solid ');");
        }
        if ($user['email_address'] == $email_address) {
            array_push($errors, "This email is being used by another user");
            array_push($js_manipulate,"document.getElementById('email1').setAttribute('style', 'border:1px red solid ');");
        }
    }
    if(count($errors)==0 and $countJsDisplayedErrors==0){
        $salt = strval(rand(100000,1000000));
        $saltedpassword = $password.$salt ;
        $query = "insert into users values('$username','$email_address', sha1('$saltedpassword'), '$salt');"; 
        mysqli_query($DBconnection, $query);
        $path = 'http://127.0.0.1:8080/PI20_21_Gr1/login.php';
        header("Location: $path");                    // duhemi me caktu cka me bo nese regjistrohet me sukses userri 
 
    }
}

if(isset($_POST['login']))
{

    $username = mysqli_real_escape_string($DBconnection,$_POST['username']);
    $password = mysqli_real_escape_string($DBconnection,$_POST['password']);

    include("login_validation.php");
    new validation($username,$password,'username','password');

    if(count($errors)==0 and $countJsDisplayedErrors==0){
        $salt = "";
        $passwordFromDb = "";
        $query = "select * from users where username='$username'";
        $result = mysqli_query($DBconnection,$query);
        $user = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result)==1){
            $salt = $user["salt"];
            $passwordFromDb = $user["password"];
            $saltedpassword = $password.$salt ;
            $hashedpassword = sha1($saltedpassword);
            if($hashedpassword == $passwordFromDb)
            {
                echo "Logged in successfully!";
                $path = 'http://127.0.0.1:8080/PI20_21_Gr1/homepage.php';
                header("Location: $path");                    // duhemi me caktu cka me bo nese regjistrohet me sukses userri 
            }
            else {
                array_push($errors, "Wrong username-password combination.");
                array_push($js_manipulate,"document.getElementById('username').setAttribute('style','border:1px red solid ');");
                array_push($js_manipulate,"document.getElementById('password').setAttribute('style','border:1px red solid ');");
            }
        }
        else {
            array_push($errors, "Wrong username-password combination.");
            array_push($js_manipulate,"document.getElementById('username').setAttribute('style','border:1px red solid ');");
            array_push($js_manipulate,"document.getElementById('password').setAttribute('style','border:1px red solid ');");
        }
   
    }


}


?>