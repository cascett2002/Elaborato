
<?php    
    
    session_start();
    include("connessione.php");
    $NameDB = "assistenza";
    connetti_db($NameDB, $con);
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `appuntamenti` WHERE `fkcliente`='$username'";
    $rs = mysqli_query($con, $sql) or die("Query fallita: lettura appuntamenti fallita");
    $row = mysqli_num_rows($rs);
    if ($row > 0) {
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
    } else {
        echo "Non sono presenti prenotazioni <br>";
        header("refresh:5;url=iniziale.html");
        echo "<a href=\"iniziale.html\" target='down'>Clicca subito qui per non essere portato alla pagina principale</a>.";
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