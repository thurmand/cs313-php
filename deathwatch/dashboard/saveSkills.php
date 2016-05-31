<?php 
require("../dbConnect.php");
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

    $db = connectToDb();

    $stmt = $db->prepare("UPDATE skills
                        SET weapon=:ws, ballistic=:bs, strength=:s, toughness=:t, agility=:a, intelligence=:i, preception=:p, will_power=:wp, fellowship=:f 
                        WHERE id =:userID;");
    $stmt->execute(array(':userID' => $userID, ':ws' => $ws,
                        ':bs' => $bs, ':s' => $st, ':t' => $to,
                        ':a' => $ag, ':i' => $in, ':p' => $pr,
                        ':wp' => $wp, ':f' => $fe));

    header('Location: index.php');
?>