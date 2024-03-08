<?php
    session_start();
    include("connessione.php");
    $NameDB="assistenza";
    connetti_db($NameDB, $con);
    $assistente=$_POST['assistente'];
    echo "<form method='post' action='inserisciappuntamento.php'>";
    echo "Scegli un'ora<br>";
    echo "Data <input type='date' name='data' id='txtdate' required><br>";
    echo "Ora <input type='time' name='ora' min='08:30' max='20:30' step='1800' required><br>";
    echo "<input type='hidden' value='$assistente' name='assistente'>";
    echo "<input type='submit' value='Conferma'>";  
    echo"</form>";
?>

<script language="javascript">
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd
  }
  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy + '-' + mm + '-' + dd;
  var maxday = (yyyy + 1) + '-' + mm + '-' + dd;
  document.getElementById("txtdate").setAttribute("min", today);
  document.getElementById("txtdate").setAttribute("max", maxday);
</script>

<style>
* { margin: 0; padding: 0; }
body {
    background: #acd6e8;
    color: #000;
    font-family: Verdana, sans-serif;
    font-size: 12px;
    text-align:center;
    
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