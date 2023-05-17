<html>
    <head>
        <link rel="icon" type="image/x-icon" href="img/6.png">
        <title>Dicey Dice</title>
        <link rel="stylesheet" href="stylesReward.css">
    </head>
    <body>
        <div id="third">
            <?php
            session_start();

            echo '<p>',$_SESSION['third'],'</p>';
            
            

            

            
            ?>
            <img src="img/medal3.png">
        </div>
        <div id="first">
        <?php
            

            echo '<p>',$_SESSION['first'],'</p>';
            ?>
            <img src="img/medal1.png">
        </div>
        <div id="second">
        <?php
            

            echo '<p>',$_SESSION['second'],'</p>';
            ?>
            <img src="img/medal2.png">
        </div>
    </body>
</html>
