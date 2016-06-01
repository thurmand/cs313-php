<?php
    require("../dbConnect.php");
    session_start();
    
    //if session is not set redirect
    if($_SESSION['userID'] == null || $_SESSION['userID'] == ''){
        header('Location: /deathwatch/index.html');
    }
    else{
        $userID = $_SESSION['userID'];
    }
    
   $db = connectToDb();

     $stmt = $db->prepare("SELECT username, char_name 
                            FROM  users
                            WHERE id = :userID;");
    $stmt->execute(array(':userID' => $userID));
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $db->prepare("SELECT * 
                            FROM skills 
                            WHERE user_id = :userID;");
    $stmt->execute(array(':userID' => $userID));
    $stats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $num = str_split($stats[0]['toughness'], 1);
    $armorMulti = intval($num[0]) * 2;

    $stmt = $db->prepare("SELECT name, head, arms, legs, body
                            FROM armor a
                            JOIN users_armor uA
                            ON a.id = uA.armor_id
                            WHERE uA.user_id = :userID;");
    $stmt->execute(array(':userID' => $userID));
    $armour = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $db->prepare("SELECT name, description, damage, penetration
                            FROM weapons w
                            JOIN users_weapons uW
                            ON w.id = uW.weapon_id
                            WHERE uW.user_id = :userID;");
    $stmt->execute(array(':userID' => $userID));
    $weapon = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/dashboardstyle.css">
        <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
        <script src="/js/dashboard.js"></script>
    </head>

<body onload="setup()" id="body">

    <div id="dashboard">
        
        <div id="sideBar">
            <div class="sideBut" onclick="location='logout.php'">Logout</div>
            <div class="sideTitle">Username:</div>
            <div><?php echo $user[0]['username'];?></div>
            <div class="sideTitle">Character Name:</div>
            <div id="cName"><?php echo $user[0]['char_name'];?></div>
            <div id='canName' onclick='noNameCh()'>cancel</div>
            <div><hr></div>
            <div id="editB" onclick="editMenuShow()" class="sideBut">Edit</div>
            <div id="edAbles">
                <div onclick="editBSkills(1)" class="sideBut">Basic Skills</div>
<!--                <div onclick="" class="sideBut">Armour</div>-->
                <div onclick="editWeapons(1)" class="sideBut">Weapons</div>
            </div>
                
        </div>
    
        <div id="main">
            <div id="skills">
                <div class="title">Basic Skills</div>
                <hr>
                <div id="skillList">
                    <div class="skillBlock">
                        Weapon Skill
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['weapon'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(1,true)">+</div>
                                <div class="sEB" onclick="addToSkill(1,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Ballistic Skill
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['ballistic'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(2,true)">+</div>
                                <div class="sEB" onclick="addToSkill(2,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Strength
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['strength'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(3,true)">+</div>
                                <div class="sEB" onclick="addToSkill(3,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Toughness
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['toughness'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(4,true)">+</div>
                                <div class="sEB" onclick="addToSkill(4,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Agility
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['agility'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(5,true)">+</div>
                                <div class="sEB" onclick="addToSkill(5,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Intelligence
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['intelligence'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(6,true)">+</div>
                                <div class="sEB" onclick="addToSkill(6,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Preception
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['preception'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(7,true)">+</div>
                                <div class="sEB" onclick="addToSkill(7,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Will Power
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['will_power'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(8,true)">+</div>
                                <div class="sEB" onclick="addToSkill(8,false)">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="skillBlock">
                        Fellowship
                        <div class="numOpr">
                            <div class="num">
                                <?PHP echo $stats[0]['fellowship'];?></div>
                            <div class="operator">
                                <div class="sEB" onclick="addToSkill(9,true)">+</div>
                                <div class="sEB" onclick="addToSkill(9,false)">-</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="skillButs">
                    <div class="saveSkills" onclick="editBSkills(0)">Save</div>
                    <div class="saveSkills" onclick="editBSkills(2)">Cancel</div>
                </div>
                <form id="skillsForm" method="post" action="saveSkills.php">
                    <input class="sInput" type="number" name="ws">
                    <input class="sInput" type="number" name="bs">
                    <input class="sInput" type="number" name="s">
                    <input class="sInput" type="number" name="t">
                    <input class="sInput" type="number" name="a">
                    <input class="sInput" type="number" name="i">
                    <input class="sInput" type="number" name="p">
                    <input class="sInput" type="number" name="wp">
                    <input class="sInput" type="number" name="f">
                </form>
            </div>
            
            <div class="divider"></div>
            <div id="armour">
                <div class="title">Armour</div>
                <hr>
                <div id="armourViewTitle">
                    <?php echo $armour[0]['name'];?></div>
                <div id="armourView">
                    <div id="armourList">
                        <div class="armourBlock">
                            Head
                            <div class="arNum">
                                <?php echo $armour[0]['head']  .
                                     " (" . $armorMulti . ")";?></div>
                        </div>
                        <hr>
                        <div class="armourBlock">
                            Body
                            <div class="arNum">
                                <?php echo $armour[0]['body'] .
                                     " (" . $armorMulti . ")";?></div>
                        </div>
                        <hr>
                        <div class="armourBlock">
                            Arms
                            <div class="arNum">
                                <?php echo $armour[0]['arms'] .
                                     " (" . $armorMulti . ")";?></div>
                        </div>
                        <hr>
                        <div class="armourBlock">
                            Legs
                            <div class="arNum">
                                <?php echo $armour[0]['legs'] .
                                     " (" . $armorMulti . ")";?></div>
                        </div>
                    </div>
                    <img src="/images/Mark-7-Power-Armour-Half.png">
                </div>
            </div>
             <div class="divider"></div>
            <div id="weapons">
                <div class="title">Weapons</div>
                <hr>
                <div id="weaponList">
                    <?php 
                        foreach ($db->query("SELECT name, description, damage, penetration
                                                FROM weapons w
                                                JOIN users_weapons uW
                                                ON w.id = uW.weapon_id
                                                WHERE uW.user_id = '$userID'")as $row){
                        echo '<div class="weaponBlock">
                                <div>' . $row['name'] . '</div>
                                <div>'. $row['description'] . '</div>
                                <div>Base Damage: ' . $row['damage'] . '</div>
                                <div>Penetration: ' . $row['penetration'] . '</div>
                                <hr>
                            </div>';
                        }
                    ?>                                       
                </div>
            </div>
        </div>
    </div>
</body>

</html>