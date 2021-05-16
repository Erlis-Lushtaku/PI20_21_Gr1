<?php
include 'header.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login/index.php');
    exit;
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>New Admin Page</title>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
    <div class="content">
        <h2>Admin's Page</h2>
        <button type="button" class="close" data-dismiss="alert">
            <a href="addNewAdmin.php"><i class="fas fa-user"></i>Add New Admin</a>
        </button>

        <div>


            <table cellpadding="0" cellspacing="0" border="1" style="margin-top:25px;" id="example">
                <thead>
                    <tr>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">User Image</th>
                        <th style="text-align:center;">Username</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Password</th>
                        <th style="text-align:center;">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('db.php');
                    $result = $conn->prepare("SELECT * FROM accounts ");
                    $result->execute();
                    for ($i = 0; $row = $result->fetch(); $i++) {
                        $id = $row['id'];
                    ?>
                        <tr>
                            <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row['id']; ?></td>
                            <td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
                                <?php if ($row['image_location'] != "") : ?>
                                    <img src="../../images/admin/<?php echo $row['image_location']; ?>" width="40px" height="40px" style="margin-top:30px; border:1px solid #333333;">
                                <?php else : ?>
                                    <img src="../../images/admin/empty.png" width="40px" height="40px" style="border:1px solid #333333;">
                                <?php endif; ?>
                            </td>
                            <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row['username']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row['email']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row['password']; ?></td>
                            <td style="text-align:center; word-break:break-all;"><a href=" delete.php?id=<?php echo $row["id"]; ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
