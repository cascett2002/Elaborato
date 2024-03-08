<?php
    
	
    session_start();
    include("connessione.php");
    $NameDB="assistenza";
    connetti_db($NameDB, $con);
    $sql="SELECT * FROM `dispositivi`";
    $rs=mysqli_query($con, $sql) or die ("Query fallita: ottenimento dei dispositivi fallito");
    $num=mysqli_num_rows($rs);
if ($num>0) { 
    echo "<form method='post' action='scegliassistente.php'>";
    echo "Scegli il tipo di dispositivo: <br>";
    echo "<br><select size='1' cols='2' name='dispositivo'>";
    while (	$row=mysqli_fetch_row($rs)) {
    echo "<option value='".$row[0]."'>".$row[1]."";
    }
    echo "</select>";
    echo "<br> <br>";
    echo "<input type='submit' value='Conferma'>";
    echo"</form>";
}
else { 
	echo "<b>Non sono presenti dispositivi</b> <br>";
	echo "<a href='javascript:history.back()'>INDIETRO</a><br>";
	echo"</div>"; echo"</div>";
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