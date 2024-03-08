<?php
    session_start();
    include("connessione.php");
    $NameDB = "assistenza";
    connetti_db($NameDB, $con);
    $codice=$_SESSION['num'];
    $data = $_POST['data'];
    $ora = $_POST['ora'].":00";
    $sql="UPDATE `appuntamenti` SET `data`='$data', `ora`='$ora' WHERE `num`='$codice'";
    $rs=mysqli_query($con,$sql) or die("query fallita");
    echo "Operazione eseguita con successo. <a href=\"iniziale.html\">Clicca subito qui per non essere portato alla pagina principale</a>.";
?>

<style>
body{
    background: #ACD6E8;
    margin-left: 57px;
    text-align: center
}

td{
border:0px solid #fff;
width: 230px;
height: 40px;
white-space:inherit;
}

td input {
width: 100%;
box-sizing: border-box;
}

button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>    