<?php

/*require '/deathwatch/dbConnect.php';
$db = connectToDb();*/

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

$username = htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['pass']);

try{
$stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :pass);");
    $stmt->execute(array(':username' => $username, ':pass' => $pass));

$stmt = $db->prepare("INSERT INTO skills(user_id) VALUES ((SELECT id FROM users WHERE username=:username))");
    $stmt->execute(array(':username' => $username));
}
catch(PDOExeption $ex)
{
     echo 'Error!: ' . $ex->getMessage();
       die(); 
}

header("location: /deathwatch/index.html");
?>