<?php

$pasTime = $_POST["pasTime"];
$season = $_POST["season"];
$tbColor = htmlspecialchars($_POST["tbColor"]);
$date = $_POST["date"];

$line = "$pasTime $season $tbColor $date\n";

echo("$line");

file_put_contents("results.txt", $line, FILE_APPEND);

?>