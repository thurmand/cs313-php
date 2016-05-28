<?php
require("/deathwatch/dbConnect.php");
session_start();

$username = htmlspecialchars($_POST['username']);
$p = htmlspecialchars($_POST['pass']);

if(!isset($username) || !isset($p)){
    header('Location: index.html');
}

$db = connectToDb();

$stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND password=:password");
$stmt->execute(array(':username' => $username, ':password' => $p));
$userID = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(sizeof($userID) == 1){
    $_SESSION['userID'] = $userID[0]['id'];
    header('Location: /deathwatch/dashboard/index.php');
}
else
{
    header('Location: index.html');
}

?>
