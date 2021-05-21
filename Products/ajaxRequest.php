<?php
    $q = $_REQUEST["titleChar"];
    
    $host = '127.0.0.1';
    $db_username = 'root';
    $db_password = '1249348089';
    $dbname = 'users';
    $DBconnection = mysqli_connect($host, $db_username, $db_password, $dbname);

    $categories = array('art', 'culture', 'foods');
    $products = array();
    foreach ($categories as $category) {
        ${$category."_query"} = "SELECT * FROM products WHERE category='$category' and title like '".$q."%' order by price asc";
        $result = mysqli_query($DBconnection, ${$category."_query"});
        ${$category."_products"} = $result->fetch_all(MYSQLI_ASSOC);
        $products[] = ${$category."_products"};
    }
    echo json_encode($products);
?>