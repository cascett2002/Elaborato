<?php
session_start();
$_SESSION['username'] = $_POST['username'];

use PHPMailer\PHPMailer\PHPMailer;

include("connessione.php");
$NameDB = "assistenza";
connetti_db($NameDB, $con);
if (isset($_POST['username']))
{
$username = $_POST['username'];
$email = $_POST['email'];
$_SESSION['id']=$username;
$_SESSION['email']=$email;
}
else
{
  $username=$_SESSION['id'];
  $email=$_SESSION['email'];
}

$sql = "SELECT count(*) as tot from `clienti` WHERE `username`='$username' AND `email`='$email'";
$rs = mysqli_query($con, $sql);
$num = mysqli_fetch_assoc($rs);
$righe = $num['tot'];
if ($righe > 0) {
  $subject = "Codice di verifica";
  $numero = null;
  $numero .= rand(1, 9);
  for ($i = 0; $i < 5; $i++) $numero .= rand(0, 9);
  $body = "Il tuo codice e' " . $numero;
  $sql = "UPDATE `clienti` SET `OTPCode`='$numero' WHERE `Username`='$username'";
  $rs = mysqli_query($con, $sql);
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
  if ($mail->send()) {
    echo "<center>";
    $status = "Eseguito. ";
    $response = "Controlla la mail";
    $inviata = true;
  } else {
    $status = "Non eseguito. ";
    $response = "Qualcosa è andato storto: <br><br>" . $mail->ErrorInfo;
    $inviata = false;
  }
  echo $status . " " . $response . "<br><br>";
  if ($inviata) {
    echo "<center>";
    echo "<form name='sendEmail' method='POST' action='nuovapass.php'>";
    echo "<label for='OTPCODE' align='left'>OTPCODE</label> <input type='number' name='OTP' placeholder='Inserisci il codice OTP' required>";
    echo "<input type='submit' value='invia'><br><br>";
  }
} else echo "Hai inserito erroneamente le credenziali. Clicca <a href='javascript:history.back()'>qui</a> per tornare indietro";
?>



<style>
body{
    background: #ACD6E8;
    margin-left: 57px;
    text-align: center
}

td{
border:0px solid #fff;
width: 300px;
height: 40px;
white-space:inherit;
text-align:center;
}

td input {
width: 100%;
box-sizing: border-box;
text-align:center;
}
</style>    