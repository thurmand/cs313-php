<?php

 session_start();


// Required field names
$required = array('pasTime', 'season', 'tbColor', 'date');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
    if (empty($_POST[$field])) {
        $error = true;
  }
}

if($error)
{
    $_SESSION['redo'] = true;
    header('Location: index.php');
}
else{

    $_SESSION['visit'] = true;
    $_SESSION['redo'] = false;
    
    $pasTime = $_POST["pasTime"];
    $season = $_POST["season"];
    $tbColor = htmlspecialchars($_POST["tbColor"]);
    $date = $_POST["date"];

    $line = "<div class='item'>$pasTime </div><div class='item'>" 
        . implode(', ', $season) 
        . "</div><div class='item'>$tbColor</div><div class='item'>$date</div>\n";

    echo("$line");

    file_put_contents("results.txt", $line, FILE_APPEND);

    header('Location: /phpsurvey/phpresults.php');
}

?>