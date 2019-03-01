<?php 
	require_once('scripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Your Admin Panel</title>
</head>
<body>
	<h1>Admin Dashboard</h1>
	<h2>Welcome <?php echo $_SESSION['user_name'];?></h2>

	<nav>
		<ul>
			<li><a href="admin_createuser.php">Create User</a></li>
			<li><a href="admin_edituser.php">Edit User</a></li>
			<li><a href="#">Delete User</a></li>
			<li><a href="scripts/caller.php?caller_id=logout">Sign Out</a></li>
		</ul>
	</nav>

</body>
</html>