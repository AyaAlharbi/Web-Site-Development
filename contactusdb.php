<?php
include_once 'session.php';

$email = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$query = "insert into Messages(name,email,subject,message)values('$name','$email','$subject','$message')";
$result = $db->insert($query);
if ($result) {
  echo "success";
  exit();
}
