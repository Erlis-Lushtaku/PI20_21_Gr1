<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Join Us</title>
    <link rel="shortcut icon" type="image/png" href="images/3d.png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="login_validation.js"></script>
    <script src="signup_validation.js"></script>
  </head>
  <body>
      <div class="gray-div">
        <p id="datee" style="font-size:10px; margin-top:610px; text-shadow: 1px 0.1px 2px black;"></p>
        <div class="p1">JOIN</div>
        <div class="p2">US</div>
        <div class="empty1">
        </div>
        <div class="empty">
          <div class="fill" draggable="true"> </div> <!-- draggable is a html5 property-->
        </div>
        <div class="empty">
        </div>
        <div class="empty">
        </div>
      </div>
    <div class="form">
      <?php include("php_files/signUp.php"); ?>   
      <form class="login-form" action="login.php" method="post">
      <?php include("php_files/displayTextual_errors.php");display_errors($errors); ?>  
        <input class="user-datas" id="username" type="text" name="username" value="<?php if(isset($_COOKIE["username"])){echo $_COOKIE["username"];} else{echo $username;} ?>" placeholder="Username" required autofocus>
        <input class="user-datas" id="password" type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"  placeholder="Password"  required>
        <div class="log-in1">
          <label class="remember-me"><input type="checkbox" name="remember">Remember me</label>
          <a href="#">Forgot your password?</a>
        </div>
        <input class="btn" type="submit" name="login" value="LOGIN" >
        <div class="sign-up">
          <p>Not Registered? <a href="signup_form.php">Create an Account</a></p>
        </div>
        <?php include('php_files/displayJs.php'); ?>
      </form>
    </div>

    <script>
    var data = new Date();
    document.getElementById("datee").innerHTML = data;
    </script>
    <script src="js/draganddrop.js"></script>
  </body>
</html>
