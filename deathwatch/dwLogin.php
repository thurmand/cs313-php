<?php
require("dbConnect.php");
require("password.php");
session_start();

$username = htmlspecialchars($_POST['username']);
$p = htmlspecialchars($_POST['pass']);

$db = connectToDb();

$stmt = $db->prepare("SELECT id, password FROM users WHERE username=:username AND password=:password");
$stmt->execute(array(':username' => $username, ':password' => $p));
$userID = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (password_verify($p, $userID[0]['password'])) {
    // Correct Password
    $_SESSION['userID'] = $userID[0]['id'];
    header('Location: /deathwatch/dashboard/index.php');
} else {
    // Wrong password
    header('Location: index.html');
}

?>
