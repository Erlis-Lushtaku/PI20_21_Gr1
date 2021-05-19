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

$.each(artProducts, function (index, item) {
    $("#art-container").append(
        $("<tr>").append(
            $("<a>")
                .click(function () {
                    localStorage.setItem('prod', JSON.stringify(item));
                })
                .attr("href", "SingleProduct.html")
                .append(
                    $("<td>").text(item.title)),
            $("<td>").text(item.price),
            $("<td>").text(item.producer),
            $("<td>").text(item.category),
            $("<td>").text(item.city),
            $("<button>", {
                text: "+",
                click: function () {
                    if (!exists(item.title)) {
                        $("#cartList").append(
                            $("<button>")
                                .attr("id", "btn" + index)
                                .click(function () { removeItem("btn" + index) })
                                .append($("<i>").attr("class", "fas fa-times")),
                            $("<dt>").text(item.title),
                            $("<dd>").text('x1').attr('class', 'inline'),
                            $("<dd>").text(parseFloat(item.price.slice(0, -1)).toFixed(2) + '$')
                        )
                    }
                    else {
                        calcQuantity(item.title, item.price)
                    }
                    calcTotal()
                }
            })
        )
    )
});

$.each(cultureProducts, function (index, item) {
    $("#food-container").append(
        $("<tr>").append(
            $("<a>")
                .click(function () {
                    localStorage.setItem('prod', JSON.stringify(item));
                })
                .attr("href", "SingleProduct.html")
                .append(
                    $("<td>").text(item.title)),
            $("<td>").text(item.price),
            $("<td>").text(item.producer),
            $("<td>").text(item.category),
            $("<td>").text(item.city),
            $("<button>", {
                text: "+",
                click: function () {
                    if (!exists(item.title)) {
                        $("#cartList").append(
                            $("<button>")
                                .attr("id", "btn" + index)
                                .click(function () { removeItem("btn" + index) })
                                .append($("<i>").attr("class", "fas fa-times")),
                            $("<dt>").text(item.title),
                            $("<dd>").text('x1').attr('class', 'inline'),
                            $("<dd>").text(parseFloat(item.price.slice(0, -1)).toFixed(2) + '$')
                        )
                    }
                    else {
                        calcQuantity(item.title, item.price)
                    }
                    calcTotal()
                }
            })
        )
    )
});

$.each(foodProducts, function (index, item) {
    $("#textile-container").append(
        $("<tr>").append(
            $("<a>")
                .click(function () {
                    localStorage.setItem('prod', JSON.stringify(item));
                })
                .attr("href", "SingleProduct.html")
                .append(
                    $("<td>").text(item.title)),
            $("<td>").text(item.price),
            $("<td>").text(item.producer),
            $("<td>").text(item.category),
            $("<td>").text(item.city),
            $("<button>", {
                text: "+",
                click: function () {
                    if (!exists(item.title)) {
                        $("#cartList").append(
                            $("<button>")
                                .attr("id", "btn" + index)
                                .click(function () { removeItem("btn" + index) })
                                .append($("<i>").attr("class", "fas fa-times")),
                            $("<dt>").text(item.title),
                            $("<dd>").text('x1').attr('class', 'inline'),
                            $("<dd>").text(parseFloat(item.price.slice(0, -1)).toFixed(2) + '$')
                        )
                    }
                    else {
                        calcQuantity(item.title, item.price)
                    }
                    calcTotal()
                }
            })
        )
    )
});

function CartProd(title, quantity, price) {
    Product.call(this, title, price);
    this.quantity = quantity;
}

var cart = JSON.parse(<?php echo $_SESSION["cart"]; ?>)

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
    <?php 
        if(!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = echo "<script>JSON.stringify(cart)</script>";
        }
        $cart = $_SESSION["cart"];
    ?>
}

function removeItem(elementId) {
    $("#" + elementId).next().remove();
    $("#" + elementId).next().remove();
    $("#" + elementId).next().remove();
    $("#" + elementId).remove();
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
</script>