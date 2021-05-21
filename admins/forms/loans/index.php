<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Loans form</title>
    <link href="../../../style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">

    <header class="header">
        <a href="home.php" class="logo">Dashboard Admin</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">

            <li> <a href="../../home.php"><i class="fas fa-home"></i>Home</a></li>
            <li> <a href="../../index.php"><i class="fas fa-user-circle"></i>Admins</a> </li>
            <li> <a href="../../promotions/index.php"><i class="fas fa-image"></i>Promotions</a> </li>
            <li> <a href="#"><i class="fas fa-newspaper"></i>#</a> </li>
            <li> <a href="#"><i class="fas fa-user-circle"></i>#</a> </li>
            <li> <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
        </ul>
    </header>
    <div class="content">

        <h2>Loans Page</h2>
        <button type="button" class="close" data-dismiss="alert">
			<a href="../../../index.php"><i class="fas fa-home"></i>Go in Website</a>
			
		</button>
		<button type="button" class="close" data-dismiss="alert">
		<a href="index.php"><i class="fas fa-newspaper"></i>Loans-Form</a>
		</button>
		<button type="button" class="close" data-dismiss="alert">
			<a href="../investment/index.php"><i class="fas fa-newspaper"></i>Investment-Form</a>
		</button>
		<button type="button" class="close" data-dismiss="alert">
			<a href="../grants/index.php"><i class="fas fa-newspaper"></i>Grants-Form</a>
		</button>

        <div class="content-1">
            <p>Welcome back, <?= $_SESSION['name'] ?>!</p>
            <h4>Message</h4>
            <!-- PHP -->
            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example">

                <thead>
                    <tr>
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">Surname</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Phone</th>
                        <th style="text-align:center;">Subject</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../../db.php');
                    $result = $conn->prepare("SELECT * FROM loansform ORDER BY id DESC");
                    $result->execute();
                    for ($i = 0; $row = $result->fetch(); $i++) {
                        $id = $row['id'];
                    ?>
                        <tr>
                            <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row['id']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row['name']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:500px;"> <?php echo $row['surname']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:500px;"> <?php echo $row['email']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:500px;"> <?php echo $row['phone']; ?></td>
                            <td style="text-align:center; word-break:break-all; width:500px;"> <?php echo $row['subject']; ?></td>
                            <td style="text-align:center; word-break:break-all;"><a href=" delete-loans.php?id=<?php echo $row["id"]; ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</body>


</html>