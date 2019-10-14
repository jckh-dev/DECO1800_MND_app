<?php
include('includes/gamelogic.php');
?>

<!-- <?php
include('includes/endinglogic.php');
?> -->

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<aside class="box points">

<button class="cluepointbtn cluebtn"><i class="fas fa-question"></i><br>CLUES</button>

<aside class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</aside>

</aside>

</section>

<section class="gridwrap2">

<aside class="box highlowbox">
    <button class="hilobtn" id="answerButtonHigh" type="submit" onclick="answer('high')" >Higher <i class="fas fa-chevron-circle-up"></i></button>
</aside>

<article class="infobox" id="quizquestion">
    <h1>THE HIGHER OR LOWER GAME</h1>
    
    <h1>Natural Disaster Classification:</h1>

    <h2><?php echo $oldGame[0]; ?></h2>

    <!-- need to start working this over so it spits out something a little more user friendly, closer to the design mockups -->

    <h1>Name Of Disaster: <?php echo $info[0]["title"]; ?></h1>
    <h2>Statistic: <?php echo $info[0]["statistic"]; ?> </h2>
    <img class="hilo-img" src ="images/plchdr-bushfire-img.jpg">
    <h2>Higher or lower than: </h2> <p><?php echo $info[0]["randNum"] ?></p>
    
</article>

<article class="infobox quizanswer" id="answerBox">
<h1 id="displayAnswer2" class="text-light"></h1> <!-- display correct/incorrect -->
<h2>Was it higher or lower than <?php echo number_format($info[0]["randNum"]) ?> ?</h2>
<h2 id="displayAnswer3">You answered "HIGHER/LOWER" which is "CORRECT/INCORRECT"</h2>
<h2>Actual answer: </h2>
<p id="displayAnswer">?</p> <!-- display actual -->
<!-- NEXT BUTTON is formed here in NEXT, see game.js in the js folder.-->
<form id="next" action="game.php" method="POST">
    <input id="nextButtonGame" type="hidden" name="game" value='<?php echo $game; ?>'>
    <input id="nextButtonValue" type="hidden" name="answer" value=1> <!-- if set, give points -->
</form>
</article>

<article class="infobox quizend">
    <!-- all ending content placed in this div -->
    <div id="endingContent">
    
    </div>
</article>

<article class = "box quizclue">

<h1>TIME FOR A CLUE!</h1>
<script> var map = false; </script>
<h1>Disaster: <?php echo $info[0]["title"]; ?> </h1>
<h1>Statistic: <?php echo $info[0]["statistic"]; ?> </h1>
<h1>Number to compare to: <?php echo number_format($info[0]["randNum"]); ?> </h1>

<h1>Insert your code to get a clue:</h1>

<form id="start">
    <input type="text" class="input" id="clueCode" placeholder="Enter clue code" required width="70" height="50">
    <button type="button" class="idbutton" onclick="insertRecordClue()">Enter Code</button>
</form>

<br>

<!-- content is inserted and deleted here, change it in function doClue in game_ajax.js -->
<div id="clueContent">

</div>

</article>

<aside class="box highlowbox">
    <button class="hilobtn" id="answerButtonLow" type="submit" onclick="answer('low')">Lower <i class="fas fa-chevron-circle-down"></i></button>
</aside>

<!-- jquery -->
<script src="js/jquery-3.4.1.min.js"></script>

<!-- script & echoed values from server into js (james) -->
<script>
var correctAnswer = '<?php echo $info[0]["correct"]; ?>'; // echo 1 (return high/low string)
var numberAnswer = '<?php echo number_format($info[0]["statisticNum"]); ?>'; // echo 2 (returns number of hidden disaster)
var endGame = '<?php echo $endGame; ?>'; // echo 3 (returns if game should end (true = end))
var score = <?php echo $_SESSION["scoreTemp"] ;?>; // echo 4 (returns score for local update)
var ID = <?php echo $info[0]["ID"] ?>; // echo 5 (ID of current disaster)
var userID = <?php echo $_COOKIE["User"]; ?>; // echo 6 "userID" (userID of player)
var mapInit = false; // true = init map.
</script>
<script src="js/game.js"></script>
<script src="js/game_ajax.js"></script>
<script src="js/leaflet.js"></script>

<?php
include('includes/footer.php');
?>