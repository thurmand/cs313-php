<?php

function connectToDb()
{
 
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
    return $db;
}