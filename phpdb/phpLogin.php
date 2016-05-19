<?php

$username = htmlspecialchars($_POST['username']);
$p = htmlspecialchars($_POST['pass']);

if(!isset($username) || !isset($p)){
    header('Location: index.html');
}

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$dbName = 'death_watch';

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND password=:password");
$stmt->execute(array(':username' => $username, ':password' => $p));
$userID = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(sizeof($userID) == 1){
    header('Location: /phpdb/dashboard/index.html');
}
else
{
     header('Location: index.html');
}

?>
