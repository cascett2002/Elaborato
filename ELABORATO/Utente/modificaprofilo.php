<?php
    echo"<div class='wrapper'>";
	echo"<div class='container'>";
    session_start();
    include("connessione.php");
    $NameDB = "assistenza";
    connetti_db($NameDB, $con);
    $username=$_SESSION['username'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $mail = $_POST['email'];
    $telefono = $_POST['telefono'];
    $nascita = $_POST['nascita'];
    $cf = $_POST['cf'];
    $sql="UPDATE `clienti` SET `nome`='$nome', `cognome`='$cognome', `email`='$mail', `telefono`='$telefono', `nascita`='$nascita', `cf`='$cf' WHERE `username`='$username'";
    $rs=mysqli_query($con,$sql) or die("query fallita");
    printf( "<script language='javascript'>"."self.location='iniziale.html'"."</script>");
?>

<style>

* { margin: 0; padding: 0; }
body {
    background: #F6F9FE;
    color: #69B1D9;
    font-family: Verdana, sans-serif;
    font-size: 12px;
}
form { margin: 20px; }
fieldset { border: none; }
legend { font-size: 16px; font-weight: bold; }
fieldset fieldset legend {
    font-size: 12px;
    font-weight: bold;
    padding: 5px 0;
}
ul li { list-style: none; margin: 20px 10px; }

input, textarea, select {
    border: 3px solid #C6CFE2;
    background: #F7FBFE;
    padding: 2px;
}
label {
    padding: 2px;
    width: 80px;
    display: block;
    float: left;
    font-weight: bold;
}
fieldset fieldset label {
    margin-left: 50px;
    width: 30px;
}
fieldset fieldset input {
    border: none;
    float: left;
    margin: 0 20px 0 15px;
}
#submit {
    background: #69B1D9;
    color: #fff;
    font-weight: bold;
    padding: 2px 10px;
}


</style>    
