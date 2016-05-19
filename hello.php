<?php

    $user = 'steve';
    $password = 'nerdface';
try{
    $db = new PDO('mysql:host=localhost;dbname=movies', $user, $password);
}
catch(PDOException $ex) 
{
   echo 'Error!: ' . $ex->getMessage();
   die(); 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>in class stuff</title>
    </head>
    
    <body>
        <h1>Movie Database</h1>
        
        <ul>
            <?php 
                foreach ($db->query('SELECT * FROM movie')as $row){
                    echo '<li>' . $row['title'] . '</li>';
                }
                
            ?>
        </ul>
        
    </body>
</html>