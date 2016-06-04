<?php
require("../dbConnect.php");
$db = connectToDb();

$username = htmlspecialchars($_GET['username']);
$stmt = $db->prepare("SELECT username 
                        FROM  users
                        WHERE username = :username;");
    $stmt->execute(array(':username' => $username));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($result) == 0)
    {
        echo 'false';
    }
    else
    {
        echo 'true';
    }
?>