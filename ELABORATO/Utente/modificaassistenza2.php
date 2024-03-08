<?php
    session_start();
    include("connessione.php");
    $NameDB = "assistenza";
    connetti_db($NameDB, $con);
    if (!empty($_POST['scelta'])) {
        $scelta=$_POST['scelta'];
        foreach ($scelta as $indice => $valore){
            $_SESSION['num'] = $valore;
            $sql="SELECT * FROM `appuntamenti` WHERE `num`='$valore'";
            $rs=mysqli_query($con,$sql) or die("query fallita");
        }
        $num=mysqli_num_rows($rs);
        if ($num>0){
        $row=mysqli_fetch_row($rs);
        echo "<form method='post' action='modificaassistenza3.php'>";
        echo "Data <input type='date' name='data' value='".$row[3]."'><br>";
        echo "Ora <input type='time' name='ora' value='".$row[4]."'><br>";
        echo "<input type='submit' value='Applica modifiche'>";
        echo "</form>";
        }
        else  {
            echo "Non hai selezionato nessun appuntamento <br> <br>";
            header( "refresh:5;url=login.html" );
            echo "<a href=\"iniziale.html\">Clicca subito qui per non essere portato alla pagina principale</a>.";
        }
    }
?>
<script language="javascript">
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd
  }
  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy + '-' + mm + '-' + dd;
  var maxday = (yyyy + 1) + '-' + mm + '-' + dd;
  document.getElementById("txtdate").setAttribute("min", today);
  document.getElementById("txtdate").setAttribute("max", maxday);
</script>

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
}

td input {
width: 100%;
box-sizing: border-box;
}

button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>    
