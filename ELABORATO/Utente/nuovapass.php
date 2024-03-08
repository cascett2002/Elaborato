<?php
session_start();
  include("connessione.php");
  $NameDB = "assistenza";
  connetti_db($NameDB, $con);

  $username = $_SESSION['username'];
  if (isset($_POST['OTP']))
  {
  $code = $_POST['OTP'];
$_SESSION['code']=$code;
  }
  else $code=$_SESSION['code'];


  $sql = "SELECT count(*) as tot from `clienti` WHERE `username`='$username' AND `OTPCode`='$code'";
  $rs = mysqli_query($con, $sql);
  $num = mysqli_fetch_assoc($rs);
  $righe = $num['tot'];
  if ($righe > 0) {
	  echo "<center>"; echo"<br> <br> <br> <br>";
    echo "<table>";
    echo "<form name='newpass' method='post' action='updatepass.php'>";
    echo "<tr><td>Inserisci la nuova password</td><td><input type='password' name='pass' required></td></tr>";
	echo "<tr><td>Reinserisci la password</td><td> <input type='password' name='cnfpass' required></td></tr>";
    echo "<tr><td><input type='submit' value='conferma' onClick='ControlloPass()'></td><td> <input type='reset' value='cancella'></td></tr>";
    echo "</form></table>";
  } else {
    echo "OTP errato. <br>";
    echo "Clicca <a href='javascript:history.back()'>qui</a> per tornare indietro<br>";
  }
?>

<script language="javascript">
  function ControlloPass() {

    var pass = document.newpass.pass.value;
    var cnfpass = document.newpass.cnfpass.value;


    if (!ValidaPassword(pass)) {
      document.newpass.pass.focus();
      document.newpass.action = "../PHP/nuovapass.php";
      document.newpass.submit();
      return false;
    }

    //Controllo uguaglianza pass e cnfpass
    else if (pass != cnfpass) {
      alert("La password confermata e' diversa da quella scelta, controllare.");
      document.newpass.pass.focus();
      document.newpass.action = "../PHP/nuovapass.php";
      document.newpass.submit();
      return false;
    }


    //Invio newpass
    else {
      document.newpass.action = "updatepass.php";
      document.newpass.submit();
    }

  }

  function ValidaPassword(pass) {
    lunghezza = pass.length;
    if (!(pass.match(/\d/))) {
      alert("La password deve contenere almeno un numero");
      return false;
    }
    if (!(pass.match(/[A-Z]/))) {
      alert("La password deve contenere almeno una lettera maiuscola");
      return false;
    }

    if (!(pass.match(/[a-z]/))) {
      alert("La password deve contenere almeno una lettera minuscola");
      return false;
    }

    if (!(pass.match(/\W+/))) {
      alert("La password deve contenere almeno un carattere speciale");
      return false;
    }
    if (!(lunghezza >= 8)) {
      alert("La password deve contenere almeno 8 caratteri");
      return false;
    }

    return true;

  }
</script>

<style>

* { margin: 0; padding: 0; }
body {
  background: -webkit-linear-gradient(top left, #acd6e8 0%, #fff 100%);
background: -moz-linear-gradient(top left, #acd6e8 0%, #fff 100%);
background: -o-linear-gradient(top left, #acd6e8 0%, #fff 100%);
background: linear-gradient(to bottom right, #acd6e8 0%, #fff 100%);
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
