<?php

$username = htmlspecialchars($_POST['username']);
$p = htmlspecialchars($_POST['pass']);

echo $username;
echo $p;

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$dbName = 'death_watch';

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND password=:password");
$stmt->execute(array(':username' => $username, ':password' => $p));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($rows);

if(sizeof($rows) == 1){
  echo "you made it";

}
else
{

}

?>
