<?php
function login($username, $password,$ip){
	require_once('connect.php');

	$check_exist_query ='SELECT COUNT(*) FROM tbl_user WHERE user_name=:user_name';
	$user_set = $pdo->prepare($check_exist_query);

	$user_set->execute(
		array(
			':user_name'=>$username
			)
		);

	if($user_set->fetchColumn()>0){
		$get_user_query ='SELECT * FROM  tbl_user WHERE user_name=:username AND user_pass=:password ';
		$get_user_set = $pdo->prepare($get_user_query);

		$get_user_set->execute(
		array(
			':username'=>$username,
			':password'=>$password
			)
		);
		while($found_user = $get_user_set->fetch(PDO::FETCH_ASSOC)){
			$id =$found_user['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $found_user['user_fname'];
			$_SESSION['last_login'] = $found_user['last_login'];


			$update_ip_query = 'UPDATE tbl_user SET user_ip=:ip WHERE user_id ='.$id;
			$update_ip_set=$pdo->prepare($update_ip_query);
			$update_ip_set->execute(
				array(
					':ip'=>$ip,
					':id'=>$id
				)
			);

			$update_login = 'UPDATE tbl_user SET last_login = CURRENT_TIMESTAMP WHERE user_id ='.$id;
			$get_log = $pdo->query($update_login);

		}
		if(empty($id)){
			$message = 'Login Failed';
			return $message;
		}
		redirect_to('index.php');
	}
	
	else{
		$message = 'user not exists';
		return $message;
	}
}
?>