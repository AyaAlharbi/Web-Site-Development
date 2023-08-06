<?php
define('NameCompany', 'WSD.com');
define('EmailComp', 'eduproject032023@gmail.com');
define('PasswordComp', 'pxedofvwrrbhxvfu');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class sendEmail
{

  private $mail;

  public function sendMessageEmail($email, $name, $subject, $Msg)
  {
    $mail = new PHPMailer(true);

    try {
      $mail->SMTPDebug = 0; 

      $mail->isSMTP();

      $mail->Host = 'smtp.gmail.com';

      $mail->SMTPAuth = true;

      $mail->Username = EmailComp;

      $mail->Password = PasswordComp;

      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

      $mail->Port = 587;

      $mail->setFrom(EmailComp, NameCompany);

      $mail->addAddress($email, $name);

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body    = $Msg;

      $mail->send();

      return true;
      exit();
    } catch (Exception $e) {
      return false;
    }
  }
}
