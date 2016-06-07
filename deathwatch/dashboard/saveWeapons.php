<?PHP

require("../dbConnect.php");
session_start();

$userID = $_SESSION['userID'];

$item = json_decode($_GET['selected']);
var_dump($item);

foreach($item as $value){
   
   $stmt = $db->prepare("INSERT INTO users_weapons (user_id, weapon_id)
                SELECT :userID, :selected FROM dual
                WHERE NOT EXISTS (SELECT * FROM users_weapons WHERE weapon_id = :selected AND user_id = :userID)");
   $stmt->execute(array(':userID' => $userID, ':selected' => $value));
}
//header('Location: index.php');
?>