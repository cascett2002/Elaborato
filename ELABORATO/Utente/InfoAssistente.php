<html>

<head>
    
</head>

<body>
    <?php
  session_start();
  $username = $_SESSION['assistenti'];
  include("connessione.php");
  include("stampa.php");
  $NomeDB = "assistenza";
  connetti_DB($NomeDB, $con);
  $sql = "SELECT * from `assistenti` where `nome`='$username'";
  $rs = MySqli_query($con, $sql) or die("Query fallita");
  echo "<center>";
  echo "<h2>Informazioni: </h2>";
  StampaRecordSet($con, $rs);
  echo "</center>";
  ?>
</body>

</html>

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