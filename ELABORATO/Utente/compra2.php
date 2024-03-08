<?php
session_start();
include("connessione.php");
$NomeDB = "assistenza";
connetti_db($NomeDB, $con);
$username = $_SESSION['username'];

echo "<center>";
if (isset($_POST['scelta'])) {
    
    $scelta = $_POST['scelta'];
   
               
        $sql = "DELETE FROM `magazzino` WHERE magazzino.ID='$scelta'";
        $rs = MySqli_query($con, $sql) or die("Eliminazione fallita");
        
        $sql = "SELECT clienti.email from clienti where clienti.username='$username'";
        $rs = MySqli_query($con, $sql) or die("Eliminazione fallita");
        $row=mysqli_fetch_row($rs);
        $email=$row[0];
        
        header ("Location: SendEmailCompra.php?email=$email");

    
     

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