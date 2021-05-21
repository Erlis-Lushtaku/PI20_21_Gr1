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
        $query = "DELETE FROM products WHERE username='$username' AND title='$title'";
        $result = mysqli_query($DBconnection, $query);
        $hisProducts = $result->fetch_all(MYSQLI_ASSOC);
        
        $rsp = "false";
        if ($result) {
            $rsp = "true";
        }
        
        echo $rsp;
    }
    else
        echo "nuk hini";
?>