<?PHP
require("../dbConnect.php");

session_start();

$userID = $_SESSION['userID'];

$name = htmlspecialchars($_POST['cName']);

$db = connectToDb();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo $name;

try{
    $stmt = $db->prepare("UPDATE users
                            SET char_name =:name
                            WHERE id =:userId;");
    $stmt->bindValue(":userId", $userID);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->execute();
}
catch(PDOException $e){
    echo $e->getMessage();
}

header('Location: index.php');

?>
