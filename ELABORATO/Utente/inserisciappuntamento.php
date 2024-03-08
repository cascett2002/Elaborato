<?php
echo"<div class='wrapper'>";
	echo"<div class='form'>";
        session_start();
    include("connessione.php");
    $NameDB = "assistenza";
    connetti_db($NameDB, $con);
    $data = $_POST['data'];
    $ora = $_POST['ora'] . ":00";
    $assistente = $_POST['assistente'];
    $username = $_SESSION['username'];
    $sql = "SELECT count(*) AS tot FROM assistenti,appuntamenti WHERE assistenti.nm=appuntamenti.fkassistente AND assistenti.nm='$assistente' AND appuntamenti.data='$data' AND appuntamenti.ora='$ora'";
    $rs = mysqli_query($con, $sql) or die("Query fallita: ottenimento appuntamenti fallito");
    $row = mysqli_fetch_assoc($rs);
    $righe = $row['tot'];
    if ($righe == 0) {
        $sql = "INSERT INTO appuntamenti (`fkassistente`, `fkcliente`, `data`, `ora`)";
        $sql .= " VALUES ('$assistente', '$username', '$data', '$ora')";
        $rs = mysqli_query($con, $sql) or die("Query fallita: inserimento fallito");
        echo "Operazione completata <br>";
        header( "refresh:5;url=iniziale.html" );
        echo "<a href=\"iniziale.html\">Clicca subito qui per non essere portato alla pagina principale</a>.";
    } else {
        echo "Orario non disponibile";
    }
?>

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