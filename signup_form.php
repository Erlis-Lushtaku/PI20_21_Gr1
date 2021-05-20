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
      <form class="signup-form" action="signup_form.php" method="post">
      <?php include("php_files/displayTextual_errors.php");display_errors($errors); ?>   
          <input class="user-datas" id="username1" type="text" name="username" value="<?php echo $username ?>" placeholder="Username"  required>
          <input class="user-datas" id="email1" type="email" name="email" value="<?php echo $email_address ?>" placeholder="Email Address" required autocomplete="on">
          <input class="user-datas" id="password1" type="password" name="password"  placeholder="Password" required>
          <input class="user-datas" id="password2" type="password" name="password2"  placeholder="Confirm password" required>
          <input class="btn" type="submit" name="signup" value="SIGN UP">
          <?php include('php_files/displayJs.php'); ?>
          <div class="sign-up">
            <p>Already Registered? <a href="login.php">Sign In</a></p>
          </div>
          
        </form>
      </div>

    <script>
    var data = new Date();
    document.getElementById("datee").innerHTML = data;
    </script>
    <script src="js/draganddrop.js"></script>
  </body>
</html>