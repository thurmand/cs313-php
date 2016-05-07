<?PHP
    session_start();
   
    if($_SESSION['visit'] == true){
        header('Location: /phpsurvey/phpresults.php');
    }
    
    if($_SESSION['redo'] == true)
    {
        echo "<div id='warn'>Not all Questions ansrewed. Please Try Again.</div>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Survey</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/phpsurvey.js"></script>
    </head>
    
    <body onload="survey()">
        <header>
            <h1>Survey</h1>
            <hr>
            
        </header>
        
        <main>
            <form action="phpsubmit.php" method="post">
            <div id="mainContent" class="lead">
                        
                <div id="q1">
                    <div class="question">Favorite Pastime</div>
                    <div id="q1Radio">
                        <input id="p1" type="radio" name="pasTime" value="Sports">
                        <input id="p2" type="radio" name="pasTime" value="Video Games">
                        <input id="p3" type="radio" name="pasTime" value="Outdoors">
                        <input id="p4" type="radio" name="pasTime" value="Cooking">
                        <input id="p5" type="radio" name="pasTime" value="Reading">
                    </div>
                    <div id="imgBox">
                        <div id="img1" class="imgs">
                            <div class="imgTitle">Sports</div>
                        </div>
                        <div id="img2" class="imgs">
                            <div class="imgTitle">Video Games</div>
                        </div>
                        <div id="img3" class="imgs">
                            <div class="imgTitle">Outdoors</div>
                        </div>
                        <div id="img4" class="imgs">
                            <div class="imgTitle">Cooking</div>
                        </div>
                        <div id="img5" class="imgs">
                            <div class="imgTitle">Reading</div>
                        </div>
                    </div>
                </div>
                
                <div id="q2">
                    <div class="question">Favorite Seasons</div>
                    <div id="q2Checks">
                        <input id="check1" type="checkbox" name="season[]" value="Fall">
                        <input id="check2" type="checkbox" name="season[]" value="Winter">
                        <input id="check3" type="checkbox" name="season[]" value="Spring">
                        <input id="check4" type="checkbox" name="season[]" value="Summer">
                    </div>
                    
                    <div id="seasons">
                        <div id="sFal1" class="seasonSel">Fall</div>
                        <div id="sWin2" class="seasonSel">Winter</div>
                        <div id="sSpr3" class="seasonSel">Spring</div>
                        <div id="sSum4" class="seasonSel">Summer</div>
                    </div>
                </div>
                
                <div id="q3">
                    <div class="question">Color Of Toothbrush</div>
                    <div id="q3cont">
                        <input text="text" name="tbColor" placeholder="Color...">
                    </div>
                </div>
                
                <div id="q4Pic"></div>
                <div id="q4">
                    <div class="question">First Date Idea</div>
                    <br>
                    <input type="radio" name="date" value="Movie"> Go to a Movie
                    <br>
                    <input type="radio" name="date" value="Dinner"> Dinner
                    <br>
                    <input type="radio" name="date" value="Hang Out"> Hang out
                    <br>
                    <input type="radio" name="date" value="Ice cream"> Get Ice Cream
                    <br>
                </div>
                
                <div>
                    <button type="submit" value="submit">Submit</button>
                </div>
                
            </div>
                
            </form>
        </main>
            
        <footer>
        
        </footer>
    </body>
</html>