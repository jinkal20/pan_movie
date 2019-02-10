<?php
	require_once('scripts/config.php');
	confirm_logged_in();
?>
<!Doctype html>
<html>
<head>
	<meta charset="utf-8"></meta>
	<title>Welcome to your Admin Pannel</title>
</head>
<body>
	<style type="text/css">
		a:hover{
			background-color: black;
			color:white;
		}
	</style>
	<h1>Admin Dashboard</h1>
	<h2>Welcome <?php echo $_SESSION['user_name'];?></h2>

	   <?php
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    //Code for timing message based on timing
    $time = date("H");
    
    $timezone = date("e");
    
    if ($time < "12") {
        echo "Good morning";
    } else
    
    if ($time >= "12" && $time < "17") {
        echo "Good afternoon";
    } else
    
    if ($time >= "17" && $time < "19") {
        echo "Good evening";
    } else
    
    if ($time >= "19") {
        echo "Good night";
    }
    ?>

	<nav>
		<ul>
			<li><a href="#">Create User</a></li>
			<li><a href="#">Edit User</a></li>
			<li><a href="#">Delete User</a></li>
			<li><a href="scripts/caller.php?caller_id=logout">Sign Out</a></li>
			<p>Last Login <?php echo $_SESSION['last_login'];?></p>
		</ul>
	</nav>
</body>
</html>