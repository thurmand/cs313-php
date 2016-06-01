<?PHP
require("../dbConnet.php");

session_start();

$userID = $_SESSION['userID'];

$name = htmlspecialchars($_POST['cName']);

$db = connectToDb();

$stmt = $db->prepare("UPDATE users
                        SET char_name=:name 
                        WHERE id =:userID;");
$stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->execute();

header('Location: index.php');

?>