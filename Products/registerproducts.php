<?php session_start();
if (!isset($_SESSION['username'])) {
    $path = 'http://127.0.0.1:8080/PI20_21_Gr1/login.php';
    header("Location: $path");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="Products.css">
    <link rel="stylesheet" type="text/css" href="SingleProduct.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    
    <link rel="shortcut icon" type="image/png" href="images/3d.png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>E-Shopping</title>
    <link rel="shortcut icon" type="image/png" href="../images/3d.png">
    <script src="form_validation.js"></script>
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/096e4d997b.js" crossorigin="anonymous"></script>
</head>

<body>

<div id="" style=" z-index: 6000;">
    <div class="form-popup" id="myForm" style="border-radius: 15px; height: 700px">
    <?php require("../php_files/signUp.php"); ?>
        <form enctype="multipart/form-data"action="registerproducts.php" class="form-container" method="post" style="height: 690px">
        <?php  if (isset($_SESSION['username'])) : ?>
    	<h3 >Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
        <?php endif ?>
        <?php include("../php_files/displayTextual_errors.php"); display_errors($productRegistraionErrors);?>  

            <h4 style="padding-top:20px;padding-bottom:0px;">Product information</h4>
            <input type="text" id="title" placeholder="Title" name="title" style="padding-left:15px;">
            <input type="text" id="price" placeholder="Price" name="price">
            <p>Upload an image of the product</p>
            <input type="file"   name="image"  style="display: block; margin-right: auto; margin-left: auto; padding:10px"/>
            <input type="text" id="producer" placeholder="Producer" name="producer">
            <select id="mySelect" name="categorySelect" >
                <option value="">Select the category of the product...</option>
                <option value="ART">ART</option>
                <option value="CULTURE">CULTURE</option>
                <option value="FOODS">FOODS</option>
            </select>
            <input type="text" id="city" name="city" placeholder="City">
            <input type="checkbox">
            <p style="color:#201c1c">Save this information for next time</p>
            </br>

            <h4>or add multiple products from file:</h4>
            <input type="file" name="fileToUpload" id="fileToUpload" style="display: block; margin-right: auto; margin-left: auto;">
            <button type="submit" class="btn cancel" name="registerBtn">Register Product</button>

            <button type="submit" class="btn" name="logout">Logout</button>
        </form>
    </div>
</div>
</body>
</html>
