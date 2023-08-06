<?php
include_once 'session.php';
if (isset($_POST['checkcomm'])) {
    $Commnt = $_POST['Commnt'];
    $datenow = $_POST['datenow'];
    $corsId = (int)$_POST['corsId'];
    $lesson = (int)$_POST['lesson'];
    $UserId = (int)$_SESSION['Id'];
    $result = $comm->AddCommentsUser($db, $corsId, $lesson, $UserId, $Commnt, $datenow);

    if ($result) {
        echo "success";
        exit();
    } else {
        echo "Try again";
    }
}
