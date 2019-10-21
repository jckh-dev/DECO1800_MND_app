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


<a class="cluepointbtn" href="journey.php"><i class="fas fa-home"></i><br>HOME</a>
<label class="lifebtn"><i class="far fa-heart"></i><br><?php if (isset($_POST['life'])) {echo $life . " LIVES";}?></label>
<aside class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</aside>

</aside>

</section>

<main class="gridwrap2" id="quizpage">

<button class="box highbtn hilobtn" id="answerButtonHigh" type="submit" onclick="answer('high')">HIGHER</button>

<article class="infobox" id="quizquestion">
    <h2>Was the value of the <?php echo $info[0]["statistic"]; ?> statistic for the disaster:</h2> 
    <h2>"<?php echo $info[0]["title"]; ?>"</h2>
    <h2>higher or lower than:</h2> 
    <aside class="btnwrap">
        <div id="imageInsert"> </div>
        <div class="numCircle"><?php echo number_format($info[0]["randNum"]); ?></div>
    </aside>
    <!-- <p><?php echo $oldGame[0]; ?></p> -->
</article>

<article class="infobox quizanswer" id="answerBox">
  <h2>Was it higher or lower than <?php echo number_format($info[0]["randNum"]); ?>?</h2>
  <h2 id="displayAnswer3">You answered "HIGHER/LOWER" which is "CORRECT/INCORRECT"</h2>
  <h2>The statistic's real figure is  </h2>
  <aside class="cntrbtnwrap">
  <p class="numCircle" id="displayAnswer">?</p><!-- display actual -->
  </aside>
<aside class="cntrbtnwrap">
<!-- NEXT BUTTON is formed here in NEXT, see game.js in the js folder.-->
<form id="next" action="game.php" method="POST">
    <input id="nextButtonGame" type="hidden" name="game" value='<?php echo $game; ?>'>
    <input id="nextButtonValue" type="hidden" name="answer" value=1> <!-- if set, give points -->
    <?php if (isset($_POST['life'])) {echo '<input id="lifeValue" type="hidden" name="life">'; } ?> <!-- value inserted by js -->
</form>
</aside>

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

<form id="start" onsubmit="return false;">
    <input type="text" class="input" id="clueCode" placeholder="Enter clue code" required width="70" height="50">
    <section class="btnwrap">
    <button type="button" class="smallbtn" onclick="insertRecordClue()">Enter Code</button>
</form>

<button type="button" class="smallbtn clueexit">Back To Game</button>
</section>
<!-- content is inserted and deleted here, change it in function doClue in game_ajax.js -->

</article>

<div class="infobox cluebox" id="clueContent">

</div>

<button class="box lowbtn hilobtn" id="answerButtonLow" type="submit" onclick="answer('low')">LOWER</button>

<aside class="box btnwrap">
    <button class="smallbtn earlyfinishbtn" onclick="earlyEnd()">Finish Now</button>
    <button class="smallbtn cluebtn">Get A Clue</button>
</aside>

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
var userName = "<?php echo $name ?>"; // NO_NAME if there is no name is associated with ID.
</script>

<script src="js/game.js"></script>
<script src="js/game_ajax.js"></script>
<script src="js/leaflet.js"></script>

<?php
include('includes/footer.php');
?>

<!-- code for number of games -->
<!-- <?php 
    if (!$endGame && json_decode($game, true)[0] == "infinite") {
        echo "Quizes left: (Endless)"; 
    } else {
        echo "Quizes left: " . $gameCount; 
    }
    ?>  -->