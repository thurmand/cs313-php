<?php
    session_start();
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $dbName = 'death_watch';

    $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    /*$stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND password=:password");
    $stmt->execute(array(':username' => $username, ':password' => $p));
    $userID = $stmt->fetchAll(PDO::FETCH_ASSOC);*/

    echo $_SESSION['userID'];
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/dashboardstyle.css">
        <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </head>

<body>

    <header>
        Welcome to your dashboard
    </header>

    <main>
    </main>

    <footer>
    </footer>

</body>

</html>