<!DOCTYPE php>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <script src="lib/jquery-3.6.4.min.js"></script>
        <link rel="icon" type="image/x-icon" href="img/6.png">
        <title>Dicey Dice</title>
    </head>
    <body>
    
        <div id="bg_strip">
        </div>
        <form method="post">
        <div class="wrapper">
            <div>
            <div class="player" >
                <h1>Player 1</h1>
                <p>Name</p>
                <input type="text" name="player1" id="player1">
                <?php
                session_start();
                error_reporting(E_ERROR | E_PARSE);
                if(isset($_SESSION['player1']))
                {
                    
                    $data = $_SESSION['player1'];
                echo "<p>",$data,"</p>";
                echo '<style>#player1{display: none !important;}</style>';
                if(isset($_SESSION['numDice'])){
                    
                    $num=$_SESSION['numDice'];
                    
                   if($_SESSION['numRound'] != $_SESSION['currentRound']){
                    $_SESSION['dice11'] = rand(1,6);
                    $_SESSION['dice12'] = rand(1,6);
                    $_SESSION['dice13'] = rand(1,6);
                    $_SESSION['dice31'] = rand(1,6);
                    $_SESSION['dice32'] = rand(1,6);
                    $_SESSION['dice33'] = rand(1,6);
                    $_SESSION['dice21'] = rand(1,6);
                    $_SESSION['dice22'] = rand(1,6);
                    $_SESSION['dice23'] = rand(1,6);

                    if ($num == 1){
                        $_SESSION['score1'] = $_SESSION['score1'] + $_SESSION['dice11'];
                        $_SESSION['score2'] = $_SESSION['score2'] + $_SESSION['dice21'];
                        $_SESSION['score3'] = $_SESSION['score3'] + $_SESSION['dice31'];
                    }
                    elseif ($num == 2){
                        $_SESSION['score1'] = $_SESSION['score1'] + $_SESSION['dice11'] + $_SESSION['dice12'];
                        $_SESSION['score2'] = $_SESSION['score2'] + $_SESSION['dice21'] + $_SESSION['dice22'];
                        $_SESSION['score3'] = $_SESSION['score3'] + $_SESSION['dice31'] + $_SESSION['dice32'];
                    }
                    else{
                        $_SESSION['score1'] = $_SESSION['score1'] + $_SESSION['dice11'] + $_SESSION['dice12'] + $_SESSION['dice13'];
                        $_SESSION['score2'] = $_SESSION['score2'] + $_SESSION['dice21'] + $_SESSION['dice22'] + $_SESSION['dice23'];
                        $_SESSION['score3'] = $_SESSION['score3'] + $_SESSION['dice31'] + $_SESSION['dice32'] + $_SESSION['dice33'];
                    }
                    $_SESSION['currentRound'] = $_SESSION['currentRound'] + 1;
                    
                   }
                   else{


                    if ($_SESSION['score1'] > $_SESSION['score2'] && $_SESSION['score1'] > $_SESSION['score3']){
                        $_SESSION['first'] = $_SESSION['player1'];
                        if ($_SESSION['score2'] > $_SESSION['score3']){
                            $_SESSION['second'] = $_SESSION['player2'];
                            $_SESSION['third'] = $_SESSION['player3'];
                        }
                        else{
                            $_SESSION['second'] = $_SESSION['player3'];
                            $_SESSION['third'] = $_SESSION['player2'];
                        }
                    }
                    if ($_SESSION['score1'] > $_SESSION['score2'] && $_SESSION['score1'] < $_SESSION['score3']){
                        $_SESSION['first'] = $_SESSION['player3'];
                        $_SESSION['second'] = $_SESSION['player1'];
                        $_SESSION['third'] = $_SESSION['player2'];
                    }
                    if ($_SESSION['score1'] < $_SESSION['score2'] && $_SESSION['score1'] > $_SESSION['score3']){
                        $_SESSION['third'] = $_SESSION['player3'];
                        $_SESSION['second'] = $_SESSION['player1'];
                        $_SESSION['first'] = $_SESSION['player2'];
                    }
                    if ($_SESSION['score1'] < $_SESSION['score2'] && $_SESSION['score1'] < $_SESSION['score3']){
                        $_SESSION['third'] = $_SESSION['player1'];
                        if ($_SESSION['score2'] > $_SESSION['score3']){
                            $_SESSION['first'] = $_SESSION['player2'];
                            $_SESSION['second'] = $_SESSION['player3'];
                        }
                        else{
                            $_SESSION['first'] = $_SESSION['player3'];
                            $_SESSION['second'] = $_SESSION['player2'];
                        }
                    }
                    

                        header("Location:reward.php");
                        exit();
                      
                   }

                    

                 

                    $diceNum1 = $_SESSION['dice11'];
                    $diceNum2 = $_SESSION['dice12'];
                    $diceNum3 = $_SESSION['dice13'];
                    $score = $_SESSION['score1'];
                    if($num == "1"){
                        echo '<img src="img/',$diceNum1,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    elseif($num == "2"){
                        echo '<img src="img/',$diceNum1,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum2,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    else{
                        echo '<img src="img/',$diceNum1,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum2,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum3,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    echo '<p>',$score,'</p>';
                }
                
                }
                elseif(isset($_POST['player1'])){
                    $_SESSION['player1'] = $_POST['player1'];
                    $_SESSION['player2'] = $_POST['player2'];
                    $_SESSION['player3'] = $_POST['player3'];
                    $_SESSION['numDice'] = $_POST['numDice'];
                    $_SESSION['numRound'] = $_POST['numRound'];
                    
                
                    

                    $data = $_SESSION['player1'];
                echo "<p>",$data,"</p>";
                echo '<style>#player1{display: none !important;}</style>';
                if(isset($_SESSION['numDice'])){
                    
                    $num=$_SESSION['numDice'];
                    
                    

                    $_SESSION['dice11'] = 1;
                    $_SESSION['dice12'] = 1;
                    $_SESSION['dice13'] = 1;
                    $_SESSION['dice31'] = 1;
                    $_SESSION['dice32'] = 1;
                    $_SESSION['dice33'] = 1;
                    $_SESSION['dice21'] = 1;
                    $_SESSION['dice22'] = 1;
                    $_SESSION['dice23'] = 1;
                    $_SESSION['score1'] = 0;
                    $_SESSION['score2'] = 0;
                    $_SESSION['score3'] = 0;
                    $_SESSION['currentRound'] = 0;

                    $diceNum1 = $_SESSION['dice11'];
                    $diceNum2 = $_SESSION['dice12'];
                    $diceNum3 = $_SESSION['dice13'];
                    $score = $_SESSION['score1'];
                    if($num == "1"){
                        echo '<img src="img/',$diceNum1,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    elseif($num == "2"){
                        echo '<img src="img/',$diceNum1,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum2,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    else{
                        echo '<img src="img/',$diceNum1,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum2,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum3,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    echo '<p>',$score,'</p>';
                }
                
                }
                
?>        
            </div>
            <div class="player">
                <h1>Player 2</h1>
                <p>Name</p>
                <input type="text"  name="player2" id="player2">
                <?php
                
                if(isset($_SESSION['player2']))
                {
                
                $data = $_SESSION['player2'];
                echo "<p>",$data,"</p>";
                echo '<style>#player2{display: none !important;}</style>';
                if(isset($_SESSION['numDice'])){
                    
                    $num=$_SESSION['numDice'];

                    
                    

                    $diceNum4 = $_SESSION['dice21'];
                    $diceNum5 = $_SESSION['dice22'];
                    $diceNum6 = $_SESSION['dice23'];
                    $score = $_SESSION['score2'];
                    if($num == "1"){
                        echo '<img src="img/',$diceNum4,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    elseif($num == "2"){
                        echo '<img src="img/',$diceNum4,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum5,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    else{
                        echo '<img src="img/',$diceNum4,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum5,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum6,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    echo '<p>',$score,'</p>';
                }
                }
?>    
            </div>
            <div class="player">
                <h1>Player 3</h1>
                <p>Name</p>
                <input type="text" name="player3" id="player3">
                <?php
                if(isset($_SESSION['player3']))
                {
                    
                    $data = $_SESSION['player3'];
                echo "<p>",$data,"</p>";
                echo '<style>#player3{display: none !important;}</style>';
                if(isset($_SESSION['numDice'])){
                    
                    $num=$_SESSION['numDice'];
                    

                    $diceNum7 = $_SESSION['dice31'];
                    $diceNum8 = $_SESSION['dice32'];
                    $diceNum9 = $_SESSION['dice33'];
                    $score = $_SESSION['score3'];
                    if($num == "1"){
                        echo '<img src="img/',$diceNum7,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    elseif($num == "2"){
                        echo '<img src="img/',$diceNum7,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum8,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    else{
                        echo '<img src="img/',$diceNum7,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum8,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                        echo '<img src="img/',$diceNum9,'.png" style="height:6vh; width:6vh; margin-left:2vh; margin-right:2vh;">';
                    }
                    echo '<p>',$score,'</p>';
                }
                
                
                
                }
?>       
            </div>
        </div>
        <br>
        <div>
            <div class="player" id="dice">
                <p class="title">Number of Rounds</p>
                <select name="numRound">
                    
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <p class="title">Number of dice</p>
                <select name="numDice">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <br>
                <input type="submit" id="submit" value="Play" onsubmit="return free();">
                
                <input type="submit" id="roll" value="Roll" name="Roll">
                <?php
                    if(isset($_SESSION['currentRound'])){
                        echo '<p id="here">',$_SESSION['currentRound'],'/',$_SESSION['numRound'];
                    }
                ?>
                
                <script>
                    function free(){
                        document.getElementById("player1").required = false;
                        document.getElementById("player2").required = false;
                        document.getElementById("player3").required = false;
                    }
                </script>
                
                <?php

                if(isset($_SESSION['numDice'])){
                    echo '<style>
                    

                    .player {
                        height: 30vh;
                    }


                    .player select{
                        display: none;

                    }
                    .player#dice p{
                        display: none;
                    }
                    .player#dice p#here{
                        display: block;
                    }
                    .player#dice input#submit{
                        display:none;
                    }
                    .player#dice{
                        height:15vh;
                    }
                    
                    .player#dice input#roll{
                        display: inline;
                        background-color: #BC7C9C;
                        color: white;
                        border: 0px;
                        box-shadow: none;
                        width: 25%;
                        margin-top: 3vh;
                        height: 20%;
                    }
                    .player#dice input#roll:active{
                        background-color: #886878;
                        color: white;
                        border: 0px;
                        box-shadow: none;
                        width: 25%;
                        margin-top: 3vh;
                    }
                    

                    </style>
                    
                    
                    
                    
                    
                    ';
                    
                }
                

               
                

                

                ?>
            </div>
        </div>
        </div>
        </form>
        
    </body>
</html>


