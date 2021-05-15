<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="SingleProduct.css">
    <title>Single Product</title>
    <link rel="shortcut icon" type="image/png" href="../images/3d.png">
    <link rel="stylesheet" type="text/css" href="navigation.css">

    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <script type="text/javascript" src="form_validation.js"></script>
    <script src="https://kit.fontawesome.com/096e4d997b.js" crossorigin="anonymous"></script>
</head>

<body onload="changeBackground()">
    <section class="section1 ">
        <header>
            <div class="containeer">
                <div class="div1"></div><div class="logo">
                    <h4>
                    <span>B</span><span>usiness</span>
                    <span>P</span><span>romotions</span>  
                    <span>A</span><span>gency</span>
                    </h4>
                </div></div>
                <nav class="m-nav">
                    <div class="nav-bar">
                    <ul class="nav-l">
                        <li class="nav-l-i">
                            <a href="../homepage.html" class="link" style="margin-left:140px;">Home</a>
                        </li>
                        <li class="nav-l-i">
                            <a href="../Promotions.html" class="link">Promotions</a>
                        </li>
                        <li class="nav-l-i">
                            <a href="Products.html" class="link">E-Shopping</a>
                        </li>
                        <li class="nav-l-i">
                          <div class="dropdown">
                            <button class="dropbtn"> <a href="../fundingprograms.html" class="link">Funding  <i class="fa fa-caret-down" style="font-size:18px;"></i></a>
                            </button>
                            <div class="dropdown-content">
                              <a href="../loans.html">Loans</a>
                              <a href="../investment.html">Investment Capital</a>
                              <a href="../grants.html">Grants</a>
                            </div>
                          </div> 
                           
                        </li>
                        <li class="nav-l-i">
                            <a href="../Kontakti.html" class="link">Contact Us</a>
                        </li>
                        <li class="tre"><span class="tre3"></span></li>
                    </ul>
                </nav>
            </nav>
            <nav class="account">
              <ul class="nav-l">
                <li class="nav-l-i">
                  <a class="link link_button" href="../login.html">Join Us</a>
                </li>
              </ul>
            </nav>
        </div>
    </div>
    <script>
        window.addEventListener('scroll', function () {
            let header = document.querySelector('header');
            let windowPosition = window.scrollY > 0;
            header.classList.toggle('scrolling-active', windowPosition);
        })
    </script>
            </header>
    </section>

    <div class="flex-container">
        <div id="img-containter">
            <img src="ProductsImages/1.jpg" id="big-img">
        </div>
        <div id="right-div">
            <h1 id="title">Title</h1>
            <h1 id="price" class="red">Price: </h1>
            <p id="producer" class="smaller">Producer: </p>
            <p id="category" class="smaller">Category: </p>
            <p id="city">City: </p>
            <button id="to-cart" class="back-red">ADD TO CART</button>
            <button id="buy-now" class="back-yellow" onclick="openForm()">BUY NOW</button>
        </div>
    </div>

    <div id="bigDiv">
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

    <div id="yourCart">
        <h2 style="text-decoration: underline;">Your Cart</h2>
        <div id="scrollable">
            <dl id="cartList">

            </dl>
        </div>
        <div id="bottom">
            <h2>Total: <span id="totalPrice">0€</span></h2>
            <button id="checkout" onclick="openForm()">CHECKOUT</button>
        </div>
    </div>

    <script>
        var product = JSON.parse(localStorage.getItem('prod'));

        document.getElementById("title").innerHTML = product.title;
        document.getElementById("price").innerHTML += product.price;
        document.getElementById("big-img").src = product.image;
        document.getElementById("producer").innerHTML += product.producer;
        document.getElementById("category").innerHTML += product.category;
        document.getElementById("city").innerHTML += product.city;

        $('#right-div').width($('#buy-now').width() + 30);

        function CartProd(title, quantity, price) {
            this.title = title;
            this.quantity = quantity;
            this.price = price;
        }

        var cart = JSON.parse(sessionStorage.getItem('cart'));

        $.each(cart, function (index, item) {
            $("#cartList").append(
                $("<button>")
                    .attr("id", "btn" + index)
                    .click(function () { removeItem("btn" + index) })
                    .append($("<i>").attr("class", "fas fa-times")),
                $("<dt>").text(item.title),
                $("<dd>").text(item.quantity).attr('class', 'inline'),
                $("<dd>").text(item.price)
            )
        });
        calcTotal();

        $("#to-cart")
            .click(function () {
                if (!exists(product.title)) {
                    let index = cart.length;
                    $("#cartList").append(
                        $("<button>")
                            .attr("id", "btn" + index)
                            .click(function () { removeItem("btn" + index) })
                            .append($("<i>").attr("class", "fas fa-times")),
                        $("<dt>").text(product.title),
                        $("<dd>").text('x1').attr('class', 'inline'),
                        $("<dd>").text(parseFloat(product.price.slice(0, -1)).toFixed(2) + '\u20ac')
                    )
                }
                else {
                    calcQuantity(product.title, product.price);
                }
                calcTotal();
            })

        function passCart() {
            const cart = []

            var cartList = document.getElementById("cartList");
            var titles = cartList.getElementsByTagName("dt");
            var quantities_prices = cartList.getElementsByTagName("dd");

            var ddIndex = 0;
            for (let i = 0; i < titles.length; i++) {
                var product = new CartProd(titles[i].innerHTML, quantities_prices[ddIndex].innerHTML, quantities_prices[ddIndex + 1].innerHTML);
                cart.push(product);
                ddIndex += 2;
            }

            sessionStorage.setItem('cart', JSON.stringify(cart));
        }

        function removeItem(elementId) {
            var element = document.getElementById(elementId);
            element.nextElementSibling.remove();
            element.nextElementSibling.remove();
            element.nextElementSibling.remove();
            element.remove();
            calcTotal();
        }

        function calcQuantity(title, price) {
            var cartList = document.getElementById("cartList").getElementsByTagName("dt");

            for (let i = 0; i < cartList.length; i++) {
                if (cartList[i].innerHTML == title) {

                    let quantity = cartList[i].nextElementSibling;
                    quantity.innerHTML = 'x' + (parseInt(quantity.innerHTML.substring(1)) + 1).toString();

                    let newPrice = quantity.nextElementSibling;
                    newPrice.innerHTML = (parseFloat(price.slice(0, -1)) * parseInt(quantity.innerHTML.substring(1))).toFixed(2) + '\u20ac';

                    break;
                }
            }
        };

        function exists(title) {
            var cartList = document.getElementById("cartList").getElementsByTagName("dt");

            for (let i = 0; i < cartList.length; i++) {
                if (cartList[i].innerHTML == title) {
                    return true;
                }
            }

            return false;
        };

        function calcTotal() {
            var cartList = document.getElementById("cartList").getElementsByTagName("dd");
            var total = 0;

            for (let i = 0; i < cartList.length; i++) {
                if (i % 2 == 1) {
                    total += parseFloat(cartList[i].innerHTML.slice(0, -1))
                }
            }

            document.getElementById("totalPrice").innerHTML = total.toFixed(2).toString() + "\u20ac"
        };

        window.onbeforeunload = function () {
            passCart();
        };

        /* var queryString = location.search.substring(1);
        var data = queryString.split("|");

        document.getElementById("title").innerHTML = data[0].replace(/%20/g, " ");
        document.getElementById("price").innerHTML += data[1];
        document.getElementById("big-img").src = data[2];
        document.getElementById("producer").innerHTML += data[3].replace(/%20/g, " ");
        document.getElementById("category").innerHTML += data[4];
        document.getElementById("city").innerHTML += data[5]; */

    </script>
</body>

</html>