<?php
    session_start();
    
    //if session is not set redirect
    if(!isset($_SESSION['userID'])){
        header('Location: /deathwatch/index.html');
    }
    else{
        $userID = $_SESSION['userID'];
    }
    
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $dbName = 'death_watch';

    try{
    $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch(PDOException $ex) 
    {  
        echo 'Error!: ' . $ex->getMessage();
        die(); 
    }

    $stmt = $db->prepare("SELECT * 
                            FROM skills s 
                            JOIN users u 
                            ON s.id = u.skill_id
                            WHERE u.id = :username;");
    $stmt->execute(array(':username' => $username));
    $stats = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        
            this is the side bar
            
        </div>
    
        <div id="main">
            <div id="skills">
                <div class="title">Basic Skills</div>
                <hr>
                <div id="skillList">
                    <div class="skillBlock">
                        Weapon Skill
                        <div class="num"><?PHP echo $stats[0]['weapon'];?></div>
                    </div>
                    <div class="skillBlock">
                        Ballistic Skill
                        <div class="num"><?PHP echo $stats[0]['ballistic'];?></div>
                    </div>
                    <div class="skillBlock">
                        Strength
                        <div class="num"><?PHP echo $stats[0]['strength'];?></div>
                    </div>
                    <div class="skillBlock">
                        Toughness
                        <div class="num"><?PHP echo $stats[0]['toughness'];?></div>
                    </div>
                    <div class="skillBlock">
                        Agility
                        <div class="num"><?PHP echo $stats[0]['agility'];?></div>
                    </div>
                    <div class="skillBlock">
                        Intelligence
                        <div class="num"><?PHP echo $stats[0]['intelligence'];?></div>
                    </div>
                    <div class="skillBlock">
                        Preception
                        <div class="num"><?PHP echo $stats[0]['preception'];?></div>
                    </div>
                    <div class="skillBlock">
                        Will Power
                        <div class="num"><?PHP echo $stats[0]['will_power'];?></div>
                    </div>
                    <div class="skillBlock">
                        Fellowship
                        <div class="num"><?PHP echo $stats[0]['fellowship'];?></div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div id="armour">
                <div class="title">Armour</div>
                <hr>
                <div id="armourViewTitle">Astartes Power Armor<?php ?></div>
                <div id="armourView">
                    <div id="armourList">
                        <div class="armourBlock">
                            Head
                            <div class="arNum">8 (8)</div>
                        </div>
                        <hr>
                        <div class="armourBlock">
                            Body
                            <div class="arNum">10 (8)</div>
                        </div>
                        <hr>
                        <div class="armourBlock">
                            Arms
                            <div class="arNum">8 (8)</div>
                        </div>
                        <hr>
                        <div class="armourBlock">
                            Legs
                            <div class="arNum">8 (8)</div>
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
                    
                    <div class="weaponBlock">
                        <div>Astartes Heavy Bolter</div>
                        <div>150m -/-/6 1d10+12X 5 60 Full Tearing</div>
                        <div>Base Damge: 12</div>
                        <div>Penetration: 5</div>
                        <hr>
                    </div>
                                       
                </div>
            </div>
        </div>
    </div>
</body>

</html>