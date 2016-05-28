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

$username = ['uN'];
$pass = $_POST['ps'];

$stmt = $db->prepare("INSERT INTO users (username, password) 
                        VALUES (:username, :pass);");
    $stmt->execute(array(':username' => $username, ':pass' => $pass));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
header("location: /deathwatch/index.html");
?>