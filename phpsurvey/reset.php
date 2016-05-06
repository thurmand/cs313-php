<?php
    
    session_start();
    
    $_SESSION['visit'] = false;
    
    header('Location: /phpsurvey');
?>