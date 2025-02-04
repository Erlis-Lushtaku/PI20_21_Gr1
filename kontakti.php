<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <script src="Kontakti.js"></script>
  <title>Contact Us</title>
  <link rel="shortcut icon" type="image/png" href="images/3d.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300&family=Roboto+Condensed:ital,wght@1,700&display=swap"
    rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <link rel="stylesheet" href="Kontakti.css">
  <link rel="stylesheet" href="navigation.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
  <title>Contact us</title>

</head>

<body onload="askLocation();checkm()">
<?php require('homepage_header.php');
?>
<div class="lgr1">
    <span>CONTACT US</span>
    <div class="pericon">
      <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-pinterest"></i> </a>
      <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-facebook-f" style="margin-left:120px;"></i>
      </a>
      <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-instagram" style="margin-left:160px;"></i>
      </a>
      <a href="https://www.facebook.com/" target="_blank"> <i class="fab fa-twitter" style="margin-left:200px;"></i>
      </a>
    </div>

    <div class="perform" style="margin-left:850px;">
      <div class="inside">
        <table>
          <tr colspan="2">
            <!-- <td class="lefti"> <i class="fas fa-mail-bulk"></i></td>  -->
            <td colspan="3" style="color:#333; ">Write us a few words about your ideas and we will come up with a plan
              within 24 hours!</td>
          </tr>
        </table>

        <script>
  $(document).ready(function () {
    $('#persubmit').click(function (e) {
      e.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      var number = $('#budget').val();
      var company = $('#company').val();
      var details= $('#details').val();
     var categories=$('#categories-choice').val();
     if($("input[name='person']").is(':checked')){
     var person = $("input[name='person']:checked").val();
    }
    else{
      var person="i pacaktuar";
    }
      $.ajax
        ({
          type: "POST",
          url: "ajax_submitcontactus.php",
          data:{"name":name ,"email":email,"number":number,"company":company,"details":details,"categories-choice":categories,"person":person},
          success:function(){
            $('#persend').html("Message sent if required fields filled!");
          }
        });
    });
  });
</script>
        <form method="post">
          <input type="text" id="name" name="name" class="text-box" placeholder="Your Name" required>
          <input type="email" id="email" name="email" class="text-box" placeholder="Email" required><br />
          <input type="text" id="company" name="company" class="text-box" placeholder="Company" required>
          <input type="text" id="budget" name="number" class="text-box" placeholder="Budget" required><br />
          <textarea name="details" placeholder="Project details (optional)" id="details"></textarea>
          <label for="" id="perlabel">Are you investor or a client?</label><br />
          <input type="radio" id="client" name="person" value="client">
          <label for="" id="l2">Client</label><br />
          <input type="radio" id="investor" name="person" value="investor">
          <label for="" id="l1">Investor</label><br />
          <label for="categories-choice" style="font-size: 17px; padding-left: 18px; padding-top:10px;">What are you
            looking for?</label>
          <input list="categories" id="categories-choice" name="categories-choice" />
          <datalist id="categories">
            <option value="Promote my business">
            <option value="Be part of the funding programs">
            <option value="Be part of the team">
            <option value="Other">
          </datalist>
          <input type="submit" id="persubmit" formtarget="_blank" value="Send" name="submit"
            style="margin-bottom:20px;margin-left:210px;opacity:1;" onclick="return validation()">         
            <div style="margin-left:170px" id="persend"></div>
        </form>       
      </div>
    </div>
  </div>
  <div class="midpart">
    <div class="perimg"><iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11737.935820558094!2d21.167515687511266!3d42.65109881669284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ec5989c3e7b%3A0xdce360181b819e84!2sBregu%20i%20Diellit%2C%20Pristina!5e0!3m2!1sen!2s!4v1610759990601!5m2!1sen!2s"
        width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe></div>
    <p class="paragraph">
      <b> <br />
      </b>
    </p>

    <div class="box">
      <div class="box1"><i class="fas fa-search"></i></div>
      <div id="inside">
        <p style="font-size: 10px; text-align: center; margin-top: 0px;"><output id="searchi"
            onload="checkm()"></output></p>
      </div>
    </div>
    <div class="box" style="margin-top:0px;">
      <div class="box1"> <i class="fas fa-map-marker-alt"></i></div>
      <div id="inside">
        <p id="perjs" style="color:white; text-align: center;"> Visit one of our offices or feel free to contact us
          online!</p>
      </div>
    </div>
    <div class="box" style="margin-top:0px;">
      <div class="box1"><i class="fas fa-euro-sign"></i></div>
      <div id="inside" style="font-size: 10px; text-align: center; margin-top: 5;">Get a promotion if you want to see
        positive results further on with your business!</div>
    </div>
  </div>
  <div class="lastpart">
    <table>
      <tr>
        <td colspan="3" style="font-family:'Lobster',cursive;font-size:22px; color:#333">Get in touch with us!</td>
      </tr>
      <tr>
        <td style=" color:#333"><br />Phone<br />
          <p>Phone:+38344111222</p>
          <p>Hand:+38345121212</p>
        </td>
        <td style="color:#333"><br />Adress<br />
          <adress>Bregu i Diellit, p.n.10000<br> Prishtinë</adress>
        </td>
        <td style="color:#333;"><br />Email<br />
          <p>BPAK@gmail.com</p>
          <p>contactbusiness@gmail.com</p>
        </td>
      </tr>
    </table>
    <div id="perfund">
      <a href="rateus.php" id="perrate"><b>RATE US</b></a>
      <p class="rights">2021 @ ALL RIGHTS RESERVED</p>
    </div>
  </div>
</body>
</html>