<?php
function login($username, $password){
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
		echo 'login succesfully!';
		}
	}

	
	else{
		echo 'user not exists';
	}
}
?>