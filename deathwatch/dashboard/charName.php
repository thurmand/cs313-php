<?PHP
require("../connectDb()");

session_start();

$userID = $_SESSION['userID'];

$name = htmlspecialchars($_POST['cName']);

$db = connectToDb();

$stmt = $db->prepare("UPDATE users
                        SET char_name=:name 
                        WHERE id =:userID;");
$stmt->execute(array(':name' => $name, ':userID' => $userID));

header('Location: index.php');

?>