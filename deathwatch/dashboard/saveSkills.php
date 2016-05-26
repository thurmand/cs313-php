<?php 
    session_start();

    $userID = $_SESSION['userID'];

    $ws = htmlspecialchars($_POST['ws']);
    $bs = htmlspecialchars($_POST['bs']);
    $st = htmlspecialchars($_POST['s']);
    $to = htmlspecialchars($_POST['t']);
    $ag = htmlspecialchars($_POST['a']);
    $in = htmlspecialchars($_POST['i']);
    $pr = htmlspecialchars($_POST['p']);
    $wp = htmlspecialchars($_POST['wp']);
    $fe = htmlspecialchars($_POST['f']);



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

    $stmt = $db->prepare("UPDATE skills
                        SET weapon=:ws, ballistic=:bs, strength=:s, toughness=:t, agility=:a, intelligence=:i, preception=:p, will_power=:wp, fellowship=:f 
                        WHERE id =:userID;");
    $stmt->execute(array(':userID' => $userID, ':ws' => $ws,
                        ':bs' => $bs, ':s' => $st, ':t' => $to,
                        ':a' => $ag, ':i' => $in, ':p' => $pr,
                        ':wp' => $wp, ':f' => $fe));

    header('Location: index.html');
?>