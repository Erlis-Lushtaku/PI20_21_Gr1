<head>

	<title>Login</title>
	<link rel="stylesheet" href="style.css">

</head>

<body>
	<div class="container">
		<h1 class="label">Login</h1>
		<form class="login_form" action="../authenticate.php" method="post" name="form" onsubmit="return validated()">
			<div class="font">Username</div>
			<input id="username" type="text" name="username">
			<div id="username_error">Please fill up your username</div>
			<div class="font font2">Password</div>
			<input type="password" name="password" id="password">
			<div id="pass_error">Please fill up your Password</div>
			<button type="submit">Login</button>
		</form>
	</div>

</body>
<script src="validate.js"></script>

</html>