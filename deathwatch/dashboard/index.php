<?php
    session_start();
    
    //if session is not set redirect
    $userID = $_SESSION['userID'];

    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $dbName = 'death_watch';

    try{
    $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch(PDOException $ex) 
    {  
        echo 'Error!: ' . $ex->getMessage();
        die(); 
    }

    /*$stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND password=:password");
    $stmt->execute(array(':username' => $username, ':password' => $p));
    $userID = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/dashboardstyle.css">
        <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </head>

<body>

    <header>
        Dashboard
    </header>
    
    <div id="sideBar">
    </div>
    
    <main>
        <div id="skills"></div>
        <div id="armour"></div>
        <div id="weapons"></div>
    </main>

    <footer>
    </footer>

</body>

</html>