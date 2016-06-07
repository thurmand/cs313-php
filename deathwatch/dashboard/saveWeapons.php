<?PHP

require("../dbConnect.php");
session_start();

$userID = $_SESSION['userID'];

$selected = json_decode($_POST['selected']);
$i = 0;
echo $i;
echo $selected;
var_dump($selected);
/*foreach($selected as $item)
    $db->prepare("INSERT INTO users_weapons
                        VALUES(:userID, :selected)")){

    $stmt->execute(array(':userID' => $userID, ':selected' => $item[$i]));
    $i++;
}*/

//header('Location: index.php');
?>