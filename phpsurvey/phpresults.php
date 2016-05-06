<!DOCTYPE html>
<html>

    <head>
         <title>Survey Results</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
    
        <header>
        
            <h1>The Results</h1>
            <hr>
        </header>        
        
        <main>
            <div id="lTitle">
                <div class="title"> Pastime </div>
                <div class="title"> Seasons </div>
                <div class="title"> Toothbrush Color</div>
                <div class="title"> Best First Date </div>
            </div>
            
            <div id="listOitems">
                <?php  $file = fopen("results.txt","r");

                while(!feof($file))
                {
                    echo "<div class='list lead'>" . fgets($file) . "</div>";
                }

                fclose($file);?>
            </div>
            
        </main>
        
        
        <footer>
        
            
            
        </footer>
    </body>
</html>