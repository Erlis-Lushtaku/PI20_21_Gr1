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
      <form class="login-form" action="" method="post">
        
        <input class="user-datas" id="username" type="text" name="username" placeholder="Username" required autofocus>
        <input class="user-datas" id="password" type="password" name="username" placeholder="Password" required>
        <div class="log-in1">
          <label class="remember-me"><input type="checkbox" name="">Remember me</label>
          <a href="#">Forgot your password?</a>
        </div>
        <input class="btn" type="submit" name="login" value="LOGIN" onclick="return validation()">
        <div class="sign-up">
          <p>Not Registered? <a href="#">Create an Account</a></p>
        </div>
      </form>
      
      <form class="signup-form" action="" method="post">
        <input class="user-datas" id="username1" type="text" name="username" placeholder="Username"  required>
        <input class="user-datas" id="email1" type="email" name="email" placeholder="Email Address" required autocomplete="on">
        <input class="user-datas" id="password1" type="password" name="password" placeholder="Password" required>
        <input class="btn" type="submit" name="signup" value="SIGN UP" onclick="return signup_validation()">
        <div class="sign-up">
          <p>Already Registered? <a href="#">Sign In</a></p>
        </div>
      </form>
    </div>

    <script type="text/javascript">
    $('.sign-up a').click(function(){
      $('form').animate({
        height: "toggle", opacity:"toggle",
      }, "slow");
    });
    </script>
    <script>
    var data = new Date();
    document.getElementById("datee").innerHTML = data;
    </script>
    <script src="js/draganddrop.js"></script>
  </body>
</html>