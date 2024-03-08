<?php
session_start();
include("connessione.php");
include("stampa.php");
$NameDB = "assistenza";
connetti_db($NameDB, $con);
$username = $_SESSION['username'];
$sql = "SELECT * FROM `magazzino`";
$rs = mysqli_query($con, $sql) or die("Query fallita: lettura prodotti fallita");
$row = mysqli_num_rows($rs);

if ($row > 0) {echo "<center>";
    $field = mysqli_fetch_fields($rs);
    echo "<table border=1><tr>";
    foreach ($field as $val)
        printf("<td>%s</td>", $val->name);
    print "</tr><br>";
    $NumCampi = mysqli_num_fields($rs);
    $i = 0;
    while ($row = mysqli_fetch_row($rs)) {
        echo "<tr>";
        for ($j = 0; $j < $NumCampi; $j++) printf("<td>%s</td>", $row[$j]);
        $i++;
    }
    echo "</table><br>";
    
   
    echo "<form name=compra method=post action=compra.php target='down'>";
    echo "<input type='submit' value='Acquista'>";
    echo "</form>";


}
else{
    echo "Non sono presenti prodotti <br>";
        header("refresh:5;url=iniziale.html");
        echo "<a href=\"Iniziale.html\" target='bottom'>Clicca subito qui per non essere portato alla home</a>.";
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