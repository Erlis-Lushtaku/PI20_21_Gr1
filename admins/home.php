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
	<title>Home Page</title>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">

	<header class="header">
		<a href="home.php" class="logo">Dashboard Admin</a>
		<input class="menu-btn" type="checkbox" id="menu-btn" />
		<label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
		<ul class="menu">

			<li> <a href="home.php"><i class="fas fa-home"></i>Home</a></li>
			<li> <a href="./addNewAdmin.php"><i class="fas fa-user-circle"></i>Admins</a> </li>
			<li> <a href="#"><i class="fas fa-image"></i>#</a> </li>
			<li> <a href="#"><i class="fas fa-newspaper"></i>#</a> </li>
			<li> <a href="#"><i class="fas fa-user-circle"></i>#</a> </li>
			<li> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
		</ul>
	</header>
	<div class="content">

		<h2>Home Page</h2>
		<button type="button" class="close" data-dismiss="alert">
			<a href="../index.html"><i class="fas fa-home"></i>Go in Website</a>
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
						<th style="text-align:center;">Title</th>
						<th style="text-align:center;">Content</th>
						<th style="text-align:center;">Delete</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>

		</div>
	</div>
</body>

</html>
    
