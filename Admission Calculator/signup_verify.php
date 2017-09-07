<?php
try {
	$dbUsers = new PDO ('mysql:host=localhost;dbname=users','root','/-/-/-/-/');

	$username = $_POST["uname"];

	$userQuery = "SELECT * FROM user_data WHERE username = '$username' ";
	$userGet = $dbUsers->query($userQuery);
	$userData = $userGet->fetch();
	if ($userData == null) {
		$page = "profile_details.php?uname=$username" ;
	}
	else{
		$error = "Username_taken";
		$page = "home.php?error=$error";
	}

	header("Location: ".$page);
	die();

} catch (Exception $e) {
	print_r($e);
}
?>
