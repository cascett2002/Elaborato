<?php
include("connessione.php");
$NameDB = "assistenza";
session_start();
connetti_db($NameDB, $con);
$username = $_SESSION['username'];
$newpass = md5($_POST['pass']);
$sql = "UPDATE `clienti` SET `password` = '$newpass' WHERE `username`='$username'";
$rs = mysqli_query($con, $sql) or die("Query Fallita");
header('Location:../Utente/login.html');
?>