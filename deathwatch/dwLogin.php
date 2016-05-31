<?php
//require("/deathwatch/dbConnect.php");
session_start();

$username = htmlspecialchars($_POST['username']);
$p = htmlspecialchars($_POST['pass']);

if(!isset($username) || !isset($p)){
    header('Location: index.html');
}

 try{
        $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
        $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
        $dbName = 'death_watch';
        $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch(PDOException $ex) 
    {
       echo 'Error!: ' . $ex->getMessage();
       die(); 
    }

$stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND password=:password");
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


/*if(sizeof($userID) == 1){
    $_SESSION['userID'] = $userID[0]['id'];
    header('Location: /deathwatch/dashboard/index.php');
}
else
{
    header('Location: index.html');
}*/

?>
