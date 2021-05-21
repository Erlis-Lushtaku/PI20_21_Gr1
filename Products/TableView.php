<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="TableView.css">
    <script src="form_validation.js"></script>
    <link rel="stylesheet" href="SingleProduct.css">
    <link rel="stylesheet" href="navigation.css">
    <title>E-Shopping</title>
    <link rel="shortcut icon" type="image/png" href="../images/3d.png">
    <script type="text/javascript" src="DisplayProducts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script >
function displayColumnNames(divId){
    $(divId).append(
                $("<tr>").append(
                    $("<th>").text("Title"),$("<th>").text("Price"),$("<th>").text("Producer"),$("<th>").text("Category"),$("<th>").text("City"),$("<th>").text("")
                    )
                )
}
function selectProductsWithAJAX(str) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            var ids = ["#art-container","#food-container","#textile-container"];
            var products = JSON.parse(this.responseText);
            for(i=0;i<3;i++){  
                $(ids[i]).empty();
                displayColumnNames(ids[i]);
            }
            display_Products(products,ids);            
      }
    };
    xmlhttp.open("GET", "ajaxRequest.php?titleChar=" + str, true);
    xmlhttp.send();
    
  }
</script>

    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/096e4d997b.js" crossorigin="anonymous"></script>
</head>

<body>

    <section class="section1" style="background:#999999;">
        <header>
            <?php 
            require('../homepage_header.php');
            ?>
            </section>

<section id="seksioni-produktet" style="position: relative; z-index: 4000;">
    <section>

        <div id="icons">
        <input type="text" id="fname" name="fname" placeholder="Search your product." style="float:left;" onkeyup="selectProductsWithAJAX(this.value)">
            <a href="Products.php" title="Gallery View" style="text-shadow: none;"><i class="fas fa-th"></i></a>
            <i class="fas fa-list"></i>
        </div>
        <div id="Art">
            <div>
                <h1 class="category" id="art-h1">ART</h1>
            </div>
            <table id="art-container" class="container">
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Producer</th>
                    <th>Category</th>
                    <th>City</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="Food">
            <div>
                <h1 class="category">CULTURE</h1>
            </div>
            <table id="food-container" class="container">
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Producer</th>
                    <th>Category</th>
                    <th>City</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="Textile">
            <div>
                <h1 class="category">FOODS</h1>
            </div>
            <table id="textile-container" class="container">
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Producer</th>
                    <th>Category</th>
                    <th>City</th>
                    <th></th>
                </tr>
            </table>
        </div>
    </section>

    <div id="yourCart" style="margin-top:20px;  z-index: 4000;">
        <h2 style="text-decoration: underline; color: #333;">Your Cart</h2>
        <div id="scrollable">
            <dl id="cartList">

            </dl>
        </div>
        <div id="bottom">
            <h2 style="color:#333;">Total: <span id="totalPrice"  style="color:#333;">0.00€</span></h2>
            <button id="checkout" onclick="openForm()" style="width: 120px; background-color: #d88e2c;" onMouseOver="this.style.backgroundColor='#333'"
            onMouseOut="this.style.backgroundColor=' #d88e2c'">CHECKOUT</button>
        </div>
    </div>
</section>
 

<div id="bigDiv" style="z-index: 6000;">
    <div class="form-popup" id="myForm" style="border-radius: 15px;">
        <form action="/action_page.php" class="form-container">
            <h4>Contact information</h4>
            <input type="email" id="email" placeholder="Email" name="email">
            <h4>Shipping address</h4>
            <input type="text" id="name" placeholder="Name" name="name">
            <input type="text" id="surname" placeholder="Surname" name="surname">
            <input type="text" id="adress" placeholder="Adress" name="Adress">
            <input type="text" id="pcode" placeholder="Postal Code" name="Postal Code">
            <input type="text" id="_city" placeholder="City" name="city">
            <select id="mySelect" onchange="change_placeholder(this)">
                <option value="">Select your country...</option>
                <option value="Albania">Albania</option>
                <option value="Kosovo">Kosovo</option>
                <option value="Montenegro">Montenegro</option>
                <option value="North Macedonia">North Macedonia</option>
                <option value="Serbia">Serbia</option>
            </select>
            <input type="tel" id="phone" name="phone" placeholder="Phone number">
            <input type="checkbox">
            <p style="color:#201c1c">Save this information for next time</p>
            </br>
            <button type="submit" class="btn" onclick="return validation() ">Submit</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
</div>
<div class="custom-shape-divider-top-1610755808">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V6c0,21.6,291,111.46,741,110.26,445.39,3.6,459-88.3,459-110.26V0Z" class="shape-fill"></path>
    </svg>
</div>
<div class="custom-shape-divider-bottom-1610755546">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V6c0,21.6,291,111.46,741,110.26,445.39,3.6,459-88.3,459-110.26V0Z" class="shape-fill"></path>
    </svg>
</div>
</body>

</html>
<?php require('TableView_real_php.php'); ?>
