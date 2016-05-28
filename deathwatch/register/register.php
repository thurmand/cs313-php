<?php

require '/deathwatch/dbConnect.php';
$db = connectToDb();

$username = ['uN'];
$pass = $_POST['ps'];

$stmt = $db->prepare("INSERT INTO users (username, password) 
                        VALUES (:username, :pass);");
    $stmt->execute(array(':username' => $username, ':pass' => $pass));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
header("location: /deathwatch/index.html");
?>