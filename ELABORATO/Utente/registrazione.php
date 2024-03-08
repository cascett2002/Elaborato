<?php
include("connessione.php");
$username=$_POST['username'];
$password=md5($_POST['password']);
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$mail=$_POST['email'];
$telefono=$_POST['telefono'];
$nascita=$_POST['nascita'];
$cf=$_POST['cf'];
$NameDB="assistenza";
connetti_db($NameDB, $con);
$strsql="INSERT INTO `clienti` (`username`, `nome`, `cognome`, `password`, `email`, `telefono`, `cf`,`nascita`) ";
$strsql.="VALUES ('$username', '$nome', '$cognome','$password', '$mail','$telefono', '$cf', '$nascita')";
$rs=mysqli_query($con,$strsql) or die("query fallita");
printf( "<script language='javascript'>"."self.location='login.html'"."</script>");
?>
