<?php
error_reporting(0);
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add photo</title>
    
    <link href="../../style.css" rel="stylesheet" type="text/css">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
    <header class="header">
        <a href="../home.php" class="logo">Dashboard Admin</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">

            <li> <a href="../home.php"><i class="fas fa-home"></i>Home</a></li>
            <li> <a href="../index.php"><i class="fas fa-user-circle"></i>Admins</a> </li>
            <li> <a href="./index.php"><i class="fas fa-image"></i>Promotions</a> </li>
            <li> <a href=".#"><i class="fas fa-newspaper"></i>#</a> </li>
            <li> <a href="#"><i class="fas fa-user-circle"></i>#</a> </li>
            <li> <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
        </ul>
    </header>
    <div class="content">
        <!-- Modal -->
        <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">

                <h3 id="myModalLabel">Add new Photo</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="upload.php" enctype="multipart/form-data">
                    <table class="table1">
                        <tr>
                            <td><label style="color:#3a87ad; font-size:18px;">Submited by:</label></td>
                            <td width="30"></td>
                            <td><input type="text" name="Submited" placeholder="You Name" required /></td>
                        </tr>
                        <tr>
                            <td><label style="color:#3a87ad; font-size:18px;">Photo's name:</label></td>
                            <td width="30"></td>
                            <td><input type="text" name="Photos_name" placeholder="Photo's name" required /></td>
                        </tr>
                        <tr>
                            <td><label style="color:#3a87ad; font-size:18px;">Select your Image</label></td>
                            <td width="30"></td>
                            <td><input type="file" name="image"></td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="submit" name="Submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</body>

</html>