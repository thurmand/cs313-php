<?php

function connectToDb()
{
 
    try{
        $user = 'steve';
        $password = 'nerdface';
        $db = new PDO('mysql:host=localhost;dbname=movies', $user, $password);
    }
    catch(PDOException $ex) 
    {
       echo 'Error!: ' . $ex->getMessage();
       die(); 
    }
    return $db;
}
?>