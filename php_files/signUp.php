<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     }
    
    require_once 'db.php';

    try {
        $DBconnection = mysqli_connect($host, $db_username, $db_password, $dbname );
    } catch (Exception $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
    $username = "";             //e perdorum me ru username in nqs shtypet submit po forma nuk eshte plotsu mire
    $email_address = "";
    $errors = array();
    $js_manipulate = array();
    $countJsDisplayedErrors = 0;
    $productRegistraionErrors = array();
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
    if(isset($_POST['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        if(isset($_COOKIE["username"]) and isset($_COOKIE["password"])){
            echo "asfawfa";
            setcookie("username",$_COOKIE["username"],time()-1);
            setcookie("password",$_COOKIE["password"],time()-1);
        }
        $path = 'http://127.0.0.1:8080/PI20_21_Gr1/login.php';
         header("Location: $path");                    // duhemi me caktu cka me bo nese regjistrohet me sukses userri 

    }
    if(isset($_POST['registerBtn'])){
        $title = mysqli_real_escape_string($DBconnection,$_POST['title']);

        $price = mysqli_real_escape_string($DBconnection,$_POST['price'])."€";
        $producer = mysqli_real_escape_string($DBconnection,$_POST['producer']);
        $category = mysqli_real_escape_string($DBconnection,$_POST['categorySelect']);
        $city = mysqli_real_escape_string($DBconnection,$_POST['city']);
        $destination = "../images/".$_FILES['image']['name'];
        if ( strcmp( $_FILES['image']['type'] , "image/png" )!=0 and strcmp( $_FILES['image']['type'] , "image/jpeg" )!=0  and strcmp( $_FILES['image']['type'] , "image/gif" )!=0  and strcmp( $_FILES['image']['type'] , "image/raw" )!=0  ) { 
            array_push($productRegistraionErrors, "Fajlli duhet te jete foto png ose jpeg ose gif ose raw.");
        } 
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) { 
            array_push($productRegistraionErrors, "Image couldn't be moved to the desired destination");
        } 
        
        
        if (empty($title)) { array_push($productRegistraionErrors, "Title is required"); }
        if (empty($price)) { array_push($productRegistraionErrors, "Price is required"); }
        if (empty($producer)) { array_push($productRegistraionErrors, "Producer is required"); }
        if (empty($category)) { array_push($productRegistraionErrors, "Category must be ART,CULTURE OR FOODS."); }
        if (empty($city)) { array_push($productRegistraionErrors, "City is required"); }

        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }

        $query_userRegiteredProduct = "SELECT * FROM products WHERE username='$username' AND title='$title'";
        $result = mysqli_query($DBconnection, $query_userRegiteredProduct);
         if (mysqli_num_rows($result)==0 and count($productRegistraionErrors)==0){
            $query_registerProduct = "INSERT INTO products values ('$username','$title','$price','$destination','$producer','$category','$city')";
            $result = mysqli_query($DBconnection, $query_registerProduct);
            $path = 'http://127.0.0.1:8080/PI20_21_Gr1/login.php';
            header("Location: $path");
        }else if(mysqli_num_rows($result)>0){
            array_push($productRegistraionErrors, "A Product with this titile is already registered.");
        } 

        
    }
    if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($DBconnection,$_POST['username']);
        $password = mysqli_real_escape_string($DBconnection,$_POST['password']);

        include("login_validation.php");
        new validation($username,$password,'username','password');
        if(isset($_POST["remember"])){
            setcookie("username",$_POST['username'],time()+3600*24*31);
            setcookie("password",$_POST['password'],time()+3600*24*31);

        }
        if(count($errors)==0 and $countJsDisplayedErrors==0){
            $salt = "";
            $passwordFromDb = "";
            $query = "select * from users where username='$username'";
            $result = mysqli_query($DBconnection,$query);
            if (mysqli_num_rows($result)==1){
                $user = mysqli_fetch_assoc($result);
                $salt = $user["salt"];
                $passwordFromDb = $user["password"];
                $saltedpassword = $password.$salt ;
                $hashedpassword = sha1($saltedpassword);
                if($hashedpassword == $passwordFromDb)
                {   
                
                    $_SESSION['username'] = $username;
         
                    $path = 'http://127.0.0.1:8080/PI20_21_Gr1/products/registerproducts.php';
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