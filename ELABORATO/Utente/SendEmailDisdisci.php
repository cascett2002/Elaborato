<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;

include("connessione.php");
$NameDB = "assistenza";
connetti_db($NameDB, $con);
$email=$_GET['email'];


  $subject = "Messaggio";

  $body = "L'assistenza è conclusa. Torna in negozio per ritirare il tuo dispositivo";


  require_once("PHPMailer/PHPMailer.php");
  require_once("PHPMailer/SMTP.php");
  require_once("PHPMailer/Exception.php");

  $mail = new PHPMailer();

  //SMTP Settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "micheleplay02@gmail.com";
  $mail->Password = 'ResidentEvil6';
  $mail->Port = 465; //587
  $mail->SMTPSecure = "ssl"; //tls

  //Email Settings
  $mail->isHTML(true);
  $mail->setFrom("micheleplay02@gmail.com", "TuttoInformaticaAssistenza");
  $mail->addAddress($email);
  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->send();

  header('Location: assistenze.php');
?>