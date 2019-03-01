<?php
	require_once('scripts/config.php');
	confirm_logged_in();

	// below code to get current user info
	$id = $_SESSION['user_id'];
	$tbl = 'tbl_user';
	$col = 'user_id';
	$found_user_set = getsingle($tbl,$col,$id);
	/*if($found_user_set){
		$found_user = $found_user_set->fetch(PDO::FETCH_ASSOC);
		//var_dump($found_user);
		exit;
	}*/
	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        
        //Validation??
        if(empty($username) || empty($password)){
            $message = 'Please fill the required fields!';
        }else{
            //Edit User 
            //$result = createUser($fname,$username,$password,$email);
            $result = editUser($id,$fname,$username,$password,$email);
            $message = $result;
        }

        /*if(isset($_POST['submit'])){

        }*/
        
	}
	if(is_string($found_user_set)){
        	$message = 'failed to get user info';
        }
?>
<!doctype html>
<html>
<head>
	<meta charset="uft-8">
	<title>Edit user</title>
</head>
<body>
	<h3>Edit User</h3>
	<?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
	<?php endif;?>
	<?php if($found_user = $found_user_set->fetch(PDO::FETCH_ASSOC)):?>
	<form action="admin_edituser.php" method="post">
		<label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="fname" value="<?php echo $found_user['user_fname']; ?>"><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $found_user['user_name']; ?>"><br><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="<?php echo $found_user['user_pass']; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $found_user['user_email']; ?>"><br><br>
        <button type="submit" name="submit">Edit User</button>
	</form>
<?php endif;?>
</body>
</html>