<?php
	require_once('scripts/config.php');
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

		login($username,$password);
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
</head>
<body>
	<form action="admin_login.php" method="POST">
		<h2>Admin Login</h2>
	<label>Usernane:
		<input type="text" name="username" value="">
	</label>
	<br>
	<label>Password:
		<input type="password" name="password" value="">
	</label>
	<br>
	<button type="submit">Login</button>
	</form>
</body>
</html>
