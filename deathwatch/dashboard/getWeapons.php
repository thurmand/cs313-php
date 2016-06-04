<?PHP
require("../dbConnect.php");

//session_start();
//
//$userID = $_SESSION['userID'];

$weapons = array();
$i = 0;
$db = connectToDb();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{
    foreach ($db->query("SELECT name, description, damage, penetration
                        FROM weapons")as $row){
        
        $weapons[$i] = '<div class="weaponBlock1">
            <div>' . $row['name'] . '</div>
            <div>'. $row['description'] . '</div>
            <div>Base Damage: ' . $row['damage'] . '</div>
            <div>Penetration: ' . $row['penetration'] . '</div>
            </div>';
        $i++;
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}

echo json_encode($weapons);

?>