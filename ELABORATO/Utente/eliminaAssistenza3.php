<?php
session_start();
include("connessione.php");
$NomeDB = "assistenza";
connetti_db($NomeDB, $con);
$assistenti = $_SESSION['assistenti'];
echo "<center>";
if (isset($_POST['scelta'])) {
    
    $scelta = $_POST['scelta'];
   
        $sql="SELECT clienti.email, clienti.username from clienti INNER JOIN appuntamenti ON clienti.username=appuntamenti.fkcliente AND appuntamenti.num='$scelta'";
        $rs=MySqli_query($con,$sql);
        echo MySqli_error($con);
        $row=MySqli_fetch_row($rs);
        $email=$row[0];
        echo $email;
        
        $sel = "DELETE FROM `appuntamenti` WHERE appuntamenti.num='$scelta'";
        $rs = MySqli_query($con, $sel) or die("Eliminazione fallita");
        header ("Location: SendEmailDisdisci.php?email=$email");

    
     

}

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