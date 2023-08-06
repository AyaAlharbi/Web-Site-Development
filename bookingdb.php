<?php
include_once 'session.php';
include_once 'sendEmail.php';
$sendmail = new sendEmail(); 

$studname = $_POST['studname'];
$email = $_POST['email'];
$time = $_POST['time'];
$date = $_POST['date'];
$subject = $_POST['subject'];
$course = $_POST['course'];

$userId = (int)$_SESSION['Id'];
$today = date("Y-m-d H:i:s");
$book_code = substr(number_format(time() * rand(), 0, '', ''), 0, 10);

$subjects = 'Registered Code:' . $book_code;
$msg   = '<div style="background-color: #f1f1f1; padding: 20px;">
	          <h2 style="color: #333333; font-size: 24px; margin-bottom: 10px;">You Have successfully registered for the ' . $course . ' workshop.</h2>
	          <ul style="list-style-type: none; margin: 0; padding: 0;">
			  <li><strong>Name:</strong> ' . $studname . '</li>
	          <li><strong>subject Name:</strong> ' . $subject . '</li>
	          <li><strong>Time:</strong> ' . $time . '</li>
			  <li><strong>Date:</strong> ' . $date . '</li>
	          </ul></div>';

$isSending = $sendmail->sendMessageEmail($email, $studname, $subjects, $msg);
if (!$isSending) {
	echo "Try again, the Booking Data cannot be sent to the email : " . $email;
} else {
	$query = "insert into booktransactions(userId,studname,date,time,subject,course,transDate,email,code,state)"
		. "values($userId,'$studname','$date','$time','$subject','$course','$today','$email','$book_code',0)";
	$result = $db->insert($query);

	if ($result) {
		$query = "select transId from booktransactions where userId='$userId' and code='$book_code'";
		$row = $db->SelectQuery($query);
		$transId = (int)$row['transId'];
		echo "success" . $transId;
		exit();
	} else {
		echo "error data" . $result;
		exit();
	}
}
