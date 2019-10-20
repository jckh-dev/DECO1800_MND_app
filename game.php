<?php
include('includes/gamelogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/gameheader.php');
?>

<aside class="lifebtn"><i class="far fa-heart"></i><br><?php if (isset($_POST['life'])) {echo $life . " LIVES";}?></aside>
<button class="cluepointbtn cluebtn"><i class="fas fa-question"></i><br>CLUES</button>
<aside class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</aside>

</aside>

</section>

<main class="gridwrap2" id="quizpage">

<span class="box highbtn" id="answerButtonHigh" type="submit" onclick="answer('high')">HIGHER</span>

<article class="infobox" id="quizquestion">
    
    <h1>HIGHER OR LOWER?</h1>

    <h2>Name and Type of Disaster: <?php echo $info[0]["title"]; ?></h2>

    <h2>Was the value of the <?php echo $info[0]["statistic"]; ?> statistic higher or lower than <?php echo number_format($info[0]["randNum"]); ?></h2> 
        
    <!-- <h2>Type of Natural Disaster</h2>

    <p><?php echo $oldGame[0]; ?></p> -->

    <h2>Statistic: <?php echo $info[0]["statistic"]; ?> </h2>

    <!-- <div id="imageInsert"> </div>  -->

</article>

<article class="infobox quizanswer" id="answerBox">
  <!-- <h1 id="displayAnswer2" class="text-light"></h1> display correct/incorrect -->
  <h2>Was it higher or lower than <?php echo number_format($info[0]["randNum"]); ?> ?</h2>
  <h2 id="displayAnswer3">You answered "HIGHER/LOWER" which is "CORRECT/INCORRECT"</h2>
  <h2>The statistic's real figure is  </h2>
  <p id="displayAnswer">?</p><!-- display actual -->
<!-- NEXT BUTTON is formed here in NEXT, see game.js in the js folder.-->
<form id="next" action="game.php" method="POST">
    <input id="nextButtonGame" type="hidden" name="game" value='<?php echo $game; ?>'>
    <input id="nextButtonValue" type="hidden" name="answer" value=1> <!-- if set, give points -->
    <?php if (isset($_POST['life'])) {echo '<input id="lifeValue" type="hidden" name="life">'; } ?> <!-- value inserted by js -->
</form>
</article>

<article class="infobox quizend">
    <!-- ending phase messages generate in here -->
</article>

<article class="infobox quizfinal">
    <!-- final quiz message generate in here -->
</article>

<article class = "infobox quizclue">

<h1>TIME FOR A CLUE!</h1>
<script> var map = false; </script>
<h2>Disaster: <?php echo $info[0]["title"]; ?> </h2>
<h2>Statistic: <?php echo $info[0]["statistic"]; ?> </h2>
<h2>Is it higher or lower than <?php echo number_format($info[0]["randNum"]); ?> </h2>

<h2>Insert your code to get a clue:</h2>

<form id="start">
    <input type="text" class="input" id="clueCode" placeholder="Enter clue code" required width="70" height="50">
    <button type="button" class="idbutton" onclick="insertRecordClue()">Enter Code</button>
</form>

<button type="button" class="idbutton clueexit">Back To Game</button>

<!-- content is inserted and deleted here, change it in function doClue in game_ajax.js -->


</article>

<div class="infobox cluebox" id="clueContent">

</div>

<button class="box lowbtn" id="answerButtonLow" type="submit" onclick="answer('low')">Lower</button>


<aside class="quizfinish">
    <button class="earlyfinishbtn" onclick="earlyEnd()">Finish Now</button>
    <?php 
    if (!$endGame && json_decode($game, true)[0] == "infinite") {
        echo "Quizes left: (Endless)"; 
    } else {
        echo "Quizes left: " . $gameCount; 
    }
    ?> 
</aside>


<!-- jquery -->
<script src="js/jquery-3.4.1.min.js"></script>

<!-- script & echoed values from server into js (james) -->
<script>

<?php echo 'var imageMode = ' . json_encode($imageMode) . ';'; ?> // imageMode (see gamelogic.php)

var correctAnswer = '<?php echo $info[0]["correct"]; ?>'; // echo 1 (return high/low string)
var numberAnswer = '<?php echo number_format($info[0]["statisticNum"]); ?>'; // echo 2 (returns number of hidden disaster)
var endGame = '<?php echo $endGame; ?>'; // echo 3 (returns if game should end (true = end))
var score = <?php echo $_SESSION["scoreTemp"] ;?>; // echo 4 (returns score for local update)
var ID = <?php echo $info[0]["ID"]; ?>; // echo 5 (ID of current disaster)
var life<?php if (isset($_POST['life'])) {echo " = " . $life;}?>;
var currentDisaster = "<?php if (isset($_POST['life'])) {echo $randomGame;} else {echo $originalGame[0];} ?>"; // fir
var currentTitle = "<?php echo $info[0]["title"]; ?>";
<?php if ($imageMode) {echo "var imageUrl = '" . $imageUrl . "';";} ?> // imageUrl var from bing if imageMode is true
var userID = <?php echo $_COOKIE["User"]; ?>; // echo 6 "userID" (userID of player)
var mapInit = false; // true = init map.
</script>

<script src="js/game.js"></script>
<script src="js/game_ajax.js"></script>
<script src="js/leaflet.js"></script>

<?php
include('includes/footer.php');
?>