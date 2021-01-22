<?php
	include('config.php');
	session_start();

	$user_check = $_SESSION['user'];

	$check = mysqli_query($link,"select user_id,user_email from users where user_email = '$user_check' ");

	$row = mysqli_fetch_array($check,MYSQLI_ASSOC);

	$login_session = $row['email'];
	$user_id = $row['id'];
	$ip = "";

	if (!empty($_SERVER["HTTP_CLIENT_IP"]))
	{
		// Check for IP address from shared Internet
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
	{
		// Check for the proxy user
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else
	{
		$ip = $_SERVER["REMOTE_ADDR"];
	}

	if(!isset($_SESSION['user'])){
	  header("location:".ROOTDIR."/account");
	  die();
	}
	
	$sql = "SELECT cart_id FROM cart WHERE user_id = '$user_id'";
	$result = mysqli_query($link, $sql);
	$count = mysqli_num_rows($result);
	if($count != 1){
		$sql = "INSERT INTO `cart` ( `user_id`) VALUES ( '$user_id');";
		$link->query($sql);
	}
	
	$link->query($sql);
?>