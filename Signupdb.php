<?php
include_once 'dbcon.php';
$db = new Conn();
$db->getConnection();
session_start();

$target_dir = "img/users/";
$target_file = $target_dir . basename($_FILES["image_file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$temp = explode(".", $_FILES["image_file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_dir . $newfilename)) {
} else {
    echo "Sorry, there was an error uploading your file.";
    exit();
}

$name = $_POST['UserName'];
$email = $_POST['email'];
$pass = $_POST['password'];
$img = $target_dir . $newfilename;
$query = "select * from users where email='$email' or UserName='$name'";
$num_row = $db->getRows($query);
if ($num_row > 0) {
    echo "the email or name already exists";
} else {
    $query = "insert into users(AccountType,UserName,Email,PassWord,img,IsActive)values(2,'$name','$email','$pass','$img',1)";
    $result = $db->insert($query);
    if ($result) {
        $query = "select UserId from users where email='$email'";
        $row = $db->SelectQuery($query);
        $id = $row['UserId'];
        $_SESSION['Id'] = $id;
        $_SESSION['AccountType'] = 2;
        $_SESSION['img'] = $img;
        $_SESSION['Name'] = $name;
        $_SESSION['start'] = time(); 
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
        echo "success";
        exit();
    }
}
