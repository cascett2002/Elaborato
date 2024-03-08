<?php
session_start();
include("connessione.php");
$NameDB="assistenza";
connetti_db($NameDB, $con);
$user=$_POST['username'];
$_SESSION['username']=$user;
$password=md5($_POST['pass']);
if (isset($_POST['Tipologia'])) {
		$_SESSION['assistenti'] = $user;
		$sql = "SELECT assistenti.password from `assistenti` where `nome` = '$user'";
		$rs = mysqli_query($con, $sql) or die("Query fallita");
		$nrow = mysqli_num_rows($rs);
		if ($nrow > 0) {
			$row = mysqli_fetch_row($rs);
			if ($password == $row[0])
				printf("<script language='javascript'>" . "self.location='benvenutoassistente.php?nome=$user'</script>");
			else {
				echo "<center>";
				echo "La password inserita non è corretta<br>";
				echo "Clicca <a href='javascript:history.back()'><font color=black>qui</font></a> per tornare indietro<br>";
				echo "</center>";
			}
		} else {
			echo "<center>";
			echo "Username inesistente<br>";
			echo "Clicca <a href='javascript:history.back()'><font color=black>qui</font></a> per tornare indietro <br>";
			echo "</center>";
		}
	}
	else{
	$_SESSION['user'] = $user;
$sql="SELECT clienti.password FROM `clienti` WHERE `username`='$user'";
$rs=mysqli_query($con, $sql) or die("Query fallita");
$num=mysqli_num_rows($rs);
if ($num>0) { 
	$row=mysqli_fetch_row($rs);
	if ($password==$row[0]) 
	printf("<script language='javascript'>" . "self.location='index.html?nome=$user'</script>");else {
			echo "<center>";
			echo "La password inserita non è corretta<br>";
			echo "Clicca <a href='javascript:history.back()'><font color=black>qui</font></a> per tornare indietro<br>";
			echo "</center>";
		}
	} else {
		echo "<center>";
		echo "Username inesistente<br>";
		echo "Clicca <a href='javascript:history.back()'><font color=black>qui</font></a> per tornare indietro <br>";
		echo "</center>";
	}
}
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