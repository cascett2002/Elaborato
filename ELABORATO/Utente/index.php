<?php
    session_start();
    if($_SESSION['username']==null) header ('location: login.html');
    else header ('location: index.html');
?>