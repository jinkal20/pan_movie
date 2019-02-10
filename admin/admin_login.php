<?php
	require_once('scripts/config.php');
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$ip = $_SERVER['REMOTE_ADDR'];

		$message = login($username,$password,$ip);
	}else{
		if(isset($_POST['username']) || isset($_POST['password']))
		$message = 'Please fill login page';
	}
?>
<!--
<?php
	if ($_SESSION['failed_login'] > 3) {
	$error[] = 'U failed to login 3 times ' . $_SESSION['failed_login'];
	} 
?>-->
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
</head>
<body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/css/foundation-float.min.css.map"></script>
	<?php if(!empty($message)):?>
	<p><?php echo $message;?></p>
	<?php endif;?>
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
