<?php
/*require("/deathwatch/dbConnect.php");
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

$username = htmlspecialchars($_GET['username']);
$stmt = $db->prepare("SELECT username 
                        FROM  users
                        WHERE username = :username;");
    $stmt->execute(array(':username' => $username));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($result) == 0)
    {
        echo false;
    }
    else
    {
        echo true;
    }
?>