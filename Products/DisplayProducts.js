function display_Products(_CategoryProducts,_ids){
    for(i=0;i<3;i++){
        $.each(_CategoryProducts[i], function (index, item) {
            $(_ids[i]).append(
                $("<tr>").append(
                    $("<a>")
                        .click(function () {
                            localStorage.setItem('prod', JSON.stringify(item));
                        })
                        .attr("href", "SingleProduct.php")
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
    }
}

function display_ProductsGrid(_CategoryProducts,_ids){
    for(i=0;i<3;i++){
        $.each(_CategoryProducts[i], function (index, item) {
            // Create and append HTML tags filled out with the data
            $(_ids[i]).append(
              $("<div>")
                .attr("class", "product")
                .append(
                  $("<div>")
                    .attr("class", "product-header")
                    .append($("<a>")
                      .click(function () {
                        localStorage.setItem('prod', JSON.stringify(item));
                      })
                      .attr("href", "SingleProduct.php")
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
                      .attr("href", "SingleProduct.php")
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
    }
}
