<?php
    session_start();
	
    include("connessione.php");
    $NameDB = "assistenza";
    connetti_db($NameDB, $con);
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `appuntamenti` WHERE `fkcliente`='$username'";
    $rs = mysqli_query($con, $sql) or die("Query fallita: ottenimento prenotazioni fallito");
    $row = mysqli_num_rows($rs);
    if ($row > 0) {
        echo "<form method='post' action='modificaassistenza2.php'>";
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
            print "<td><input type='radio' name='scelta[" . $i . "]' value=" . $row[0] . "></td></tr>";
            $i++;
        }
        echo "</table><br>";
        print "<input type='submit' value='Conferma'>";
        print " ";
        print "<input type='reset' value='Annulla'>";
        echo "</form>";
    } else {
        echo "Non sono presenti prenotazioni<br>";
        header("refresh:5;url=iniziale.html");
        echo " <a href=\"iniziale.html\" target='bottom'>Clicca subito qui per non essere portato alla pagina principale</a>.";
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
width: 250px;
height: 40px;
white-space:inherit;
text-align:center;
}

td input {
width: 100%;
box-sizing: border-box;
text-align:center;
}

button {
  background-color: #4CAF50; /* Green */
  
  border: none;
  color: white;
  padding: 15px 32px;
  margin-left: 30px
  text-decoration: none;
  display: inline-block;
  
  font-size: 16px;
}

#submit {
    background: #69B1D9;
    color: #fff;
    font-weight: bold;
    padding: 2px 10px;
}

</style>    