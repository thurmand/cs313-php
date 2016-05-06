<?php

 session_start();

$_SESSION['visit'] = true;

$pasTime = $_POST["pasTime"];
$season = $_POST["season"];
$tbColor = htmlspecialchars($_POST["tbColor"]);
$date = $_POST["date"];

$line = "<div class='item'>$pasTime </div><div class='item'>" 
    . implode(', ', $season) . "</div><div class='item'>$tbColor</div><div class='item'>$date</div>\n";

echo("$line");

file_put_contents("results.txt", $line, FILE_APPEND);

header('Location: /phpsurvey/phpresults.php');

?>