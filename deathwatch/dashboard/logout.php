<?php 

    session_start();
    
    $_SESSION['userID'] = null;

    header('location: /deathwatch/index.html');

?>