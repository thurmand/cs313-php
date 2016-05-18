<?php

$username = htmlspecialchars($_POST['usernam']);
$p = htmlspecialchars($_POST['pass']);

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD'); 

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword););

$result = $db->query('SELECT id FROM users WHERE username=:userName AND password=:password');
$stmt->execute(array(':username' => $username, ':passwrod' => $password));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $result;

?> 
