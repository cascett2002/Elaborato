<?php
session_start();  //DELETEASSISTENTE
include("connessione.php");
$NomeDB = "assistenza";
connetti_db($NomeDB, $con);
$username = $_SESSION['username'];

$sql = "SELECT * FROM `magazzino`";
$rs = MySqli_Query($con, $sql) or die("Query fallita. ");
$fieldinfo = mysqli_fetch_fields($rs);
echo "<center>";
echo "<h3> Cosa desideri comprare?: </h3>";
echo "<form action='compra2.php' method='POST'>";
echo "<TABLE BORDER=1><thead><TR>";
foreach ($fieldinfo as $val)
printf("<TH>%s</TH>", $val->name);
echo "<TH>Scelta</TH>";
echo "</TR></thead>";
echo "<tbody>";
$NumCampi = mysqli_num_fields($rs);
$i = 0;
while ($row = mysqli_fetch_row($rs)) {
    echo "<TR>";
    for ($j = 0; $j < $NumCampi; $j++)
    printf("<TD>%s</TD>", $row[$j]);
    echo "<TD><input type='radio' name='scelta' value='" . $row[0] . "'></TD>";
    echo "</TR>";
    $i++;
  }
echo "</tbody></table> <br> <br>";
echo "<input type='submit' value='Acquista'>";
echo "</form>";
echo "<a href='Acquisti.html' target='down'><font color=black>Indietro</font></a>";
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