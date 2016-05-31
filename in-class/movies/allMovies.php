<?php

require("dbConnect.php");
$db = connectToDb();

$query = "SELECT id, title, year FROM movie";
$stmt = $db->prepare($query);
$stmt->execute();
$movies = $stmt->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
    </head>

<body>
    
    <h1>All Movies</h1>
    <ul>
    <?php 
        foreach ($movies as $movie){
            $id = $movie['id'];
            echo "<li><a href='movieInfo.php?id=$id'>" . $movie['title'] . " (" . $movie['year'] . ")</a></li>";
        }            
    ?>
    </ul>
    
    <h2>Add Movie</h2>
    <form method="post" action="addMovie.php"> 
        <input type="text" name="title" placeholder="Title"></input>
        <br>
        <input type="number" name="year" placeholder="Year"></input>
    <br>
        <input type="submit" value="Add Movie"></input>
    </form>
</body>
</html>