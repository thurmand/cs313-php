<?PHP

require("../dbConnect.php");
session_start();

$userID = $_SESSION['userID'];

$item = json_decode($_GET['selected']);
var_dump($item);

/*$db->prepare("INSERT INTO users_weapons
                VALUES(:userID, :selected)"));
$stmt->execute(array(':userID' => $userID, ':selected' => $item));*/

//header('Location: index.php');
?>