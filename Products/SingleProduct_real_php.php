<?php
    // $title = isset($_POST['title']) ? $_POST['title'] : "";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $title = $_REQUEST["title"];
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $host = '127.0.0.1';
        $db_username = 'root';
        $db_password = 'root';
        $dbname = 'users';
        $DBconnection = mysqli_connect($host, $db_username, $db_password, $dbname);
        // $title = "<script>document.write(product.title);</script>";
        // $title= $_COOKIE["title"];
        $query = "SELECT * FROM products WHERE username='$username'";
        $result = mysqli_query($DBconnection, $query);
        $hisProducts = $result->fetch_all(MYSQLI_ASSOC);
        
        $rsp = "false";
        foreach ($hisProducts as $product) {
            if (strcmp($product["title"], $title) == 0) {
                $rsp = "true";
                break;
            }
        }
        
        echo $rsp;
    }
    else
        echo "nuk hini";
?>