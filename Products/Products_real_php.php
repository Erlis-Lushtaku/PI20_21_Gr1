<?php
    $host = '127.0.0.1';
    $db_username = 'root';
    $db_password = 'root';
    $dbname = 'users';
    $DBconnection = mysqli_connect($host, $db_username, $db_password, $dbname);

    $categories = array('art', 'culture', 'foods');
    foreach ($categories as $category) {
        ${$category."_query"} = "SELECT * FROM products WHERE category='$category'";
        $result = mysqli_query($DBconnection, ${$category."_query"});
        ${$category."_products"} = $result->fetch_all(MYSQLI_ASSOC);
    }

?>

<script>

  var artProducts = <?php echo json_encode($art_products) ?>;
  var cultureProducts = <?php echo json_encode($culture_products) ?>;
  var foodProducts = <?php echo json_encode($foods_products) ?>;


// Loop through each JSON item
$.each(artProducts, function (index, item) {
  // Create and append HTML tags filled out with the data
  $("#art-container").append(
    $("<div>")
      .attr("class", "product")
      .append(
        $("<div>")
          .attr("class", "product-header")
          .append($("<a>")
            .click(function () {
              localStorage.setItem('prod', JSON.stringify(item));
            })
            .attr("href", "SingleProduct.html?")
            .append($("<img>")
              .attr("src", item.image)
            )
          ),
        $("<div>")
          .attr("class", "product-footer")
          .append($("<a>")
            .click(function () {
              localStorage.setItem('prod', JSON.stringify(item));
            })
            .attr("href", "SingleProduct.html?")
            .append($("<h3>").text(item.title))
          )
          .append($("<h4>").text(item.price))
          .append(
            $("<button>", {
              attr: "btn",
              text: "ADD TO CART",
              click: function () {
                if (!exists(item.title)) {
                  $("#cartList").append(
                    $("<button>")
                      .attr("id", "btn" + index)
                      .click(function () { removeItem("btn" + index) })
                      .append($("<i>").attr("class", "fas fa-times")),
                    $("<dt>").text(item.title),
                    $("<dd>").text('x1').attr('class', 'inline'),
                    $("<dd>").text(parseFloat(item.price.slice(0, -1)).toFixed(2) + '\u20ac')
                  )
                }
                else {
                  calcQuantity(item.title, item.price);
                }
                calcTotal();
                if (document.getElementById("newTotal").innerHTML != "") {
                  console.log(document.getElementById("discount").innerHTML.slice(3, -1));
                  console.log(document.getElementById("totalPrice").innerHTML.slice(0, -1));
                  document.getElementById("newTotal").innerHTML = " = " + (document.getElementById("totalPrice").innerHTML.slice(0, -1) - document.getElementById("discount").innerHTML.slice(3, -1)).toString() + "\u20ac"
                }
              }
            })
          )
      )
  );
});

$.each(cultureProducts, function (index, item) {
  // Create and append HTML tags filled out with the data
  $("#food-container").append(
    $("<div>")
      .attr("class", "product")
      .append(
        $("<div>")
          .attr("class", "product-header")
          .append($("<a>")
            .click(function () {
              localStorage.setItem('prod', JSON.stringify(item));
            })
            .attr("href", "SingleProduct.html?")
            .append($("<img>")
              .attr("src", item.image)
            )
          ),
        $("<div>")
          .attr("class", "product-footer")
          .append($("<a>")
            .click(function () {
              localStorage.setItem('prod', JSON.stringify(item));
            })
            .attr("href", "SingleProduct.html?")
            .append($("<h3>").text(item.title))
          )
          .append($("<h4>").text(item.price))
          .append(
            $("<button>", {
              attr: "btn",
              text: "ADD TO CART",
              click: function () {
                if (!exists(item.title)) {
                  $("#cartList").append(
                    $("<button>")
                      .attr("id", "btn" + index)
                      .click(function () { removeItem("btn" + index) })
                      .append($("<i>").attr("class", "fas fa-times")),
                    $("<dt>").text(item.title),
                    $("<dd>").text('x1').attr('class', 'inline'),
                    $("<dd>").text(parseFloat(item.price.slice(0, -1)).toFixed(2) + '\u20ac')
                  )
                }
                else {
                  calcQuantity(item.title, item.price);
                }
                calcTotal();
                if (document.getElementById("newTotal").innerHTML != "") {
                  console.log(document.getElementById("discount").innerHTML.slice(3, -1));
                  console.log(document.getElementById("totalPrice").innerHTML.slice(0, -1));
                  document.getElementById("newTotal").innerHTML = " = " + (document.getElementById("totalPrice").innerHTML.slice(0, -1) - document.getElementById("discount").innerHTML.slice(3, -1)).toString() + "\u20ac"
                }
              }
            })
          )
      )
  );
});

$.each(foodProducts, function (index, item) {
  // Create and append HTML tags filled out with the data
  $("#textile-container").append(
    $("<div>")
      .attr("class", "product")
      .append(
        $("<div>")
          .attr("class", "product-header")
          .append($("<a>")
            .click(function () {
              localStorage.setItem('prod', JSON.stringify(item));
            })
            .attr("href", "SingleProduct.html?")
            .append($("<img>")
              .attr("src", item.image)
            )
          ),
        $("<div>")
          .attr("class", "product-footer")
          .append($("<a>")
            .click(function () {
              localStorage.setItem('prod', JSON.stringify(item));
            })
            .attr("href", "SingleProduct.html?")
            .append($("<h3>").text(item.title))
          )
          .append($("<h4>").text(item.price))
          .append(
            $("<button>", {
              attr: "btn",
              text: "ADD TO CART",
              click: function () {
                if (!exists(item.title)) {
                  $("#cartList").append(
                    $("<button>")
                      .attr("id", "btn" + index)
                      .click(function () { removeItem("btn" + index) })
                      .append($("<i>").attr("class", "fas fa-times")),
                    $("<dt>").text(item.title),
                    $("<dd>").text('x1').attr('class', 'inline'),
                    $("<dd>").text(parseFloat(item.price.slice(0, -1)).toFixed(2) + '\u20ac')
                  )
                }
                else {
                  calcQuantity(item.title, item.price);
                }
                calcTotal();
                if (document.getElementById("newTotal").innerHTML != "") {
                  console.log(document.getElementById("discount").innerHTML.slice(3, -1));
                  console.log(document.getElementById("totalPrice").innerHTML.slice(0, -1));
                  document.getElementById("newTotal").innerHTML = " = " + (document.getElementById("totalPrice").innerHTML.slice(0, -1) - document.getElementById("discount").innerHTML.slice(3, -1)).toString() + "\u20ac"
                }
              }
            })
          )
      )
  );
});

function CartProd(title, quantity, price) {
  Product.call(this, title, price);
  this.quantity = quantity;
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

function passCart() {
  const cart = [];

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
  $("#" + elementId).next().remove();
  $("#" + elementId).next().remove();
  $("#" + elementId).next().remove();
  $("#" + elementId).remove();
  calcTotal();
  if (document.getElementById("newTotal").innerHTML != "") {
    console.log(document.getElementById("discount").innerHTML.slice(3, -1));
    console.log(document.getElementById("totalPrice").innerHTML.slice(0, -1));
    document.getElementById("newTotal").innerHTML = " = " + (document.getElementById("totalPrice").innerHTML.slice(0, -1) - document.getElementById("discount").innerHTML.slice(3, -1)).toString() + "\u20ac"
  }
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

function random(min, max) {
  const num = Math.floor(Math.random() * (max - min + 1)) + min;
  return num;
};

function CurrentUser(coupon) {
  this.coupon = coupon;
}

var checkoutClicked;

$("#checkout").click(function () {
  checkoutClicked = localStorage.getItem("checkoutClicked");
  if (checkoutClicked == null) {
    checkoutClicked = "false";
  }
  console.log(checkoutClicked);
  if (checkoutClicked == "false") {
    localStorage.setItem("checkoutClicked", "true");
    console.log(checkoutClicked);
    let rewardPrc = random(5, 25);
    let oldTotal = document.getElementById("totalPrice").innerHTML.slice(0, -1);
    let reward = oldTotal * rewardPrc / 100;
    let newTotal = oldTotal - reward;
    $("#discount").text(" - " + reward + "\u20ac");
    $("#newTotal").text(" = " + newTotal + "\u20ac");
  }
})

</script>
