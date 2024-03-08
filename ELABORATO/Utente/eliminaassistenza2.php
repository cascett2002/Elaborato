<?php
    session_start();
    include("connessione.php");
    $NameDB = "assistenza";
    connetti_db($NameDB, $con);
    if (!empty($_POST['scelta'])) {
        $scelta = $_POST['scelta'];
        foreach ($scelta as $indice => $valore) {
            $sql = "DELETE FROM appuntamenti WHERE appuntamenti.num='$valore'";
            $rs = mysqli_query($con, $sql) or die("Query fallita: cancellazione fallita");
        }
    } else {
        echo "Non sono stati scelti appuntamenti da eliminare <br>";
    }
    header("refresh:5;url=menu.htm");
    echo "Cancellazione effettuata <br> <br>";
    echo "<a href=\"iniziale.html\" target='bottom'>Clicca subito qui per non essere portato alla pagina principale</a>.";

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
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-align:center;
  font-size: 16px;
}
</style>    