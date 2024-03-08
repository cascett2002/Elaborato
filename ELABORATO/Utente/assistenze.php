<?php
session_start();
$username = $_SESSION['assistenti'];
include("connessione.php");
include("stampa.php");
$NomeDB = "assistenza";
connetti_db($NomeDB, $con);
$assistente = $_SESSION['assistenti'];
echo " <h2> Assistente: " . $assistente . " </h2>";
$sql = "SELECT appuntamenti.num,appuntamenti.fkcliente, appuntamenti.data, appuntamenti.ora from appuntamenti join assistenti where (assistenti.nm=appuntamenti.fkassistente AND assistenti.nome='$assistente')";
$rs = MySqli_query($con, $sql) or die("Query fallita");
echo "<center>";
$numrighe = MySqli_num_rows($rs);
if ($numrighe > 0) {
    echo "<h1>Lista delle assistenze: </h1>";
    StampaRecordSet($con, $rs);
    echo "<br><br>";
    echo "<form name=vito method=post action=deleteAssistente.php target='down'>";
    echo "<input type='submit' value='Elimina'>";
    echo "</form>";
} else echo "Nessun assistenza prenotata";
echo "</center>";
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