<?php 
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login/index.php');
    exit;
} ?>
<html>

<head>
    <meta charset="utf-8">
    <title>Gallery Page</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
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
            <li> <a href="#"><i class="fas fa-newspaper"></i>#</a> </li>
            <li> <a href="#"><i class="fas fa-user-circle"></i>#</a> </li>
            <li> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
        </ul>
    </header>
    <div class="content">
        <h2>Gallery Page</h2>

        <button type="button" class="close" data-dismiss="alert">
            <a href="./newphoto.php"><i class="fas fa-images"></i>Add New photo</a>
        </button>

        <div>

            <table cellpadding="0" cellspacing="0" border="1" class="table1 table-striped table-bordered" id="example">

                <thead>
                    <tr>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">Photos uploud</th>
                        <th style="text-align:center;">Author</th>
                        <th style="text-align:center;">Photos name</th>
                        <th style="text-align:center;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../db.php');
                    $result = $conn->prepare("SELECT * FROM gallery ORDER BY tbl_image_id ASC");
                    $result->execute();
                    for ($i = 0; $row = $result->fetch(); $i++) {
                        $id = $row['tbl_image_id'];
                    ?>
                        <tr>
                            <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row['tbl_image_id']; ?></td>
                            <td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
                                <?php if ($row['image_location'] != "") : ?>
                                    <img src="../image/gallery/<?php echo $row['image_location']; ?>" alt=" <?php echo $row['Photos_name']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
                                <?php else : ?>
                                    <img src="../image/gallery/empty.png" alt=" <?php echo $row['Photos_name']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
                                <?php endif; ?>
                            </td>
                            <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row['Submited']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row['Photos_name']; ?></td>
                            <td style="text-align:center; word-break:break-all;"><a href=" delete.php?tbl_image_id=<?php echo $row["tbl_image_id"]; ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>