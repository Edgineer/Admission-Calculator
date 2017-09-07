<?php
try {
	$dbUsers = new PDO ('mysql:host=localhost;dbname=users','root','/-/-/-/-/');

	$username = $_POST["uname"];
	$password = $_POST["psw"];

	$userQuery = "SELECT * FROM user_data WHERE username = '$username' AND password = '$password' ";
	$userGet = $dbUsers->query($userQuery);
	$userData = $userGet->fetch();
	if ($userData == null) {
		$error = 'Incorrect_Password_or_Username';
		$page = "home.php?error=$error";
	}
	else{
		$page = "profile.php?uname=$username";
	}

	header("Location: ".$page);
	die();

} catch (Exception $e) {
	print_r($e);
}
?>