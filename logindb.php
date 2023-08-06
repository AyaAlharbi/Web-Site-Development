<?php
include_once 'dbcon.php';
$db = new Conn();
$db->getConnection();
session_start();
if (isset($_POST['checklogin'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$query = "select * from users where (email='$email' or UserName='$email') and password='$pass'";
	$num_row = $db->getRows($query);
	if ($num_row > 0) {
		$query = "select * from users where (email='$email' or UserName='$email') and password='$pass'";
		$row = $db->SelectQuery($query);
		$id = $row['UserId'];
		$name = $row['UserName'];
		$AccountType = $row['AccountType'];
		$img = $row['img'];
		$_SESSION['Id'] = $id;
		$_SESSION['AccountType'] = $AccountType;
		if ($img == "")
			$_SESSION['img'] = 'img/logo.jpg';
		else
			$_SESSION['img'] = $img;
		$_SESSION['Name'] = $name;
		$_SESSION['start'] = time(); 
		$_SESSION['expire'] = $_SESSION['start'] + ((60 * 60 * 24) * 30);
		echo "success";
		exit();
	} else {
		echo "Sure From Password Or Email and Name ";
	}
} else
	echo "Can't Connected DataBase";
