function Product(title, price, image, producer, category, city) {
    this.title = title;
    this.price = price;
    this.image = image;
    this.producer = producer;
    this.category = category;
    this.city = city;
}

var art = {
    "products": [
        new Product("Mild Interruption", "100\u20ac", "../Images/abstract2.jpg", "Paint Me", "ART", "Prishtina"),
        new Product("Mona Lisa and the Cat Lady", "130\u20ac", "../Images/abstract4.jpg", "Paint Me", "ART", "Prishtina"),
        new Product("An Instinct for Dragons", "180\u20ac", "../Images/abstract3.jpg", "Paint Me", "ART", "Prishtina"),
        new Product("Bucket Hat", "20\u20ac", "../Images/yarny2.png", "Yarnyhandmade", "ART", "Vushtrri"),
        new Product("Crop Top", "25\u20ac", "../Images/yarny3.png", "Yarnyhandmade", "ART", "Vushtrri"),
        new Product("Crop Top", "35\u20ac", "../Images/yarny4.png", "Yarnyhandmade", "ART", "Vushtrri")
      ]
}

var food = {
    "products": [
        new Product("Pite", "50\u20ac", "../Images/abstract2.jpg", "Coloring Prishtina", "CULTURE", "Prishtina"),
        new Product("Pite", "50\u20ac", "../Images/abstract2.jpg", "Coloring Prishtina", "CULTURE", "Prishtina"),
        new Product("Pite", "50\u20ac", "../Images/abstract2.jpg", "Coloring Prishtina", "CULTURE", "Prishtina"),
        new Product("Pite", "50\u20ac", "../Images/abstract2.jpg", "2cm Humans", "CULTURE", "Prishtina"),
        new Product("Pite", "50\u20ac", "../Images/abstract2.jpg", "2cm Humans", "CULTURE", "Prishtina"),
        new Product("Pite", "50\u20ac", "../Images/abstract2.jpg", "2cm Humans", "CULTURE", "Prishtina")
      ]
}

var textile = {
    "products": [
        new Product("Bakllav", "30\u20ac", "../Images/bakllav.png", "Flizza", "FOODS", "Prishtina"),
        new Product("Fli", "25\u20ac", "ProductsImages/2.jfif", "Flizza", "FOODS", "Prishtina"),
        new Product("Kadaif", "20\u20ac", "../Images/kadaif.jpg", "Flizza", "FOODS", "Prishtina"),
        new Product("Chocolate Cake", "20\u20ac", "../Images/chocolate.jpg", "Dolcetto Vjosa", "FOODS", "Prishtina"),
        new Product("Fruit Cake", "20\u20ac", "../Images/heart.jpg", "Dolcetto Vjosa", "FOODS", "Prishtina"),
        new Product("Harry Potter and the Cake of Secrets", "25\u20ac", "../Images/hp.jpg", "Dolcetto Vjosa", "FOODS", "Prishtina")
      ]
}

$.each(art.products, function (index, item) {
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

$.each(food.products, function (index, item) {
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

$.each(textile.products, function (index, item) {
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

{/* <table>
      <tr>
          <th>Title</th>
          <th>Price</th>
          <th>Producer</th>
          <th>Category</th>
          <th>City</th>
      </tr>
      <tr>
          <td></td>
      </tr>
  </table> */}

{/* 
    <div id="art-container">
        <div class="product">
            <div class="product-header">
                <img src=${image} alt="product"></img>
            </div>
            <div class="product-footer">
                <h3>${title}</h3>
                <h4>${price}</h4>
            </div>
        </div> 
    </div>
    */}