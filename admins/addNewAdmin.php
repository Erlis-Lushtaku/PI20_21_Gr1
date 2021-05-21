<?php
// We need to use sessions, so you should always start sessions using the below code.
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
	<title>New Admin Page</title>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="style.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
<header class="header">
        <a href="./home.php" class="logo">Dashboard Admin</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">

            <li> <a href="./home.php"><i class="fas fa-home"></i>Home</a></li>
            <li> <a href="./index.php"><i class="fas fa-user-circle"></i>Admins</a> </li>
            <li> <a href="./promotions/index.php"><i class="fas fa-image"></i>Promotions</a> </li>
            <li> <a href="#"><i class="fas fa-newspaper"></i>#</a> </li>
            <li> <a href="#"><i class="fas fa-user-circle"></i>#</a> </li>
            <li> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
        </ul>
    </header>
	<div class="content">
		<h2>Add new admin</h2>

		<form method="post" action="">
			username:<br>
			<input type="text" name="username" required>
			<br>
			email:<br>
			<input type="email" name="email" required>
			<br>
			password:<br>
			<input type="password" name="password" required>
			<br>
			<input type="file" name="image_location">
			<br>

			<input type="submit" name="save" value="submit">
		</form>
	</div>


	<?php

	require_once('db.php');

	if (isset($_POST['save'])) {

		move_uploaded_file($_FILES["image_location"]["tmp_name"], "./image/admin/" . $_FILES["image"]["name"]);
		$location = $_FILES["image"]["name"];

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$hashPassword = password_hash($password, PASSWORD_BCRYPT);
		$image_location = $_POST['image_location'];
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO accounts (username, email,password, image_location)
			VALUES ('$username', '$email', '$hashPassword','$image_location')";

		$conn->exec($sql);
		echo "<script>alert('Successfully Added!!!'); window.location='index.php'</script>";
		// }
	}
	// }


	?>
</body>

</html>