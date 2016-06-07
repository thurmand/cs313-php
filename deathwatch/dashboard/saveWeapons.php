<?PHP

require("../dbConnect.php");
session_start();

$userID = $_SESSION['userID'];

$item = $_POST['selected'];
echo $item;
/*$db->prepare("INSERT INTO users_weapons
                VALUES(:userID, :selected)"));
$stmt->execute(array(':userID' => $userID, ':selected' => $item));*/

//header('Location: index.php');
?>