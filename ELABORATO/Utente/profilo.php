<?php
    session_start();
    include("connessione.php");
    $NameDB="assistenza";
    connetti_db($NameDB, $con);
    $username=$_SESSION['username'];
    $sql="SELECT * FROM `clienti` WHERE `username`='$username'";
    $rs=mysqli_query($con,$sql) or die ("Query fallita: errore nella lettura dei clienti");
    $row=mysqli_fetch_row($rs);
    
    echo "<center>"; echo "<br><br><br>";
    echo "<form method='post' action='modificaprofilo.php'>";
    echo "Nome <input type='text' name='nome' size='30' maxlenght='100' value='".$row[1]."'><br><br>";
    echo "Cognome <input type='text' name='cognome' size='30' maxlenght='100' value='".$row[2]."'><br><br>";
    echo "Email <input type='text' name='email' size='30' maxlenght='100' value='".$row[4]."'><br><br>";
    echo "Telefono <input type='text' name='telefono' size='30' maxlenght='100' value='".$row[5]."'><br><br>";
    echo "Codice Fiscale <input type='text' name='cf' size='30' maxlenght='100' value='".$row[6]."'><br><br>";
    echo "Data di Nascita <input type='date' name='nascita' value='".$row[7]."'><br><br>";
    echo "<input type='submit' value='Applica modifiche'>";
    echo "</form>";
	echo"</div>"; echo"</div>";
?>

<style>

* { margin: 0; padding: 0; }
body {
    background: #acd6e8;
    color: #000;
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