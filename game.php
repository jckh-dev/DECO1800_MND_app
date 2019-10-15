<?php
include('includes/gamelogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<aside class="box points">

<form id="start" action="clue.php" method="POST">
    <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
    <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
    <button class="cluepointbtn" type="submit"><i class="fas fa-question"></i><br>CLUES</button>
</form>

<button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>

</aside>

</section>

<section class="gridwrap2">

<aside class="box highlowbox">
    <button class="hilobtn" id="answerButtonHigh" type="submit" onclick="answer('high')" >Higher <i class="fas fa-chevron-circle-up"></i></button>
</aside>

<article class="infobox" id="quizquestion">
    <?php if (isset($_POST['life'])) {echo "<h1>Current Life : " . $life . "</h1>";}?>
    <h1>THE HIGHER OR LOWER GAME</h1>
    <!-- quiz left, thought it might be good -->
    <?php 
    if (!$endGame && json_decode($game, true)[0] == "infinite") {
        echo "Quizes left: (Endless)"; 
    } else {
        echo "Quizes left: " . $gameCount; 
    }
    ?> 
    <h1>Natural Disaster Classification:</h1>

    <h2><?php echo $oldGame[0]; ?></h2>

        <!-- <h1>Next Topics:
        <?php 
        if (isset($_POST["game"]) || isset($_POST["oldGame"])) {
        for ($i = 1; $i < sizeof($oldGame); $i++) {
        echo $oldGame[$i] . ", ";    
        } 
        } else {
        echo "Nothing Left.";
        }
        ?>
        </h1> -->

    <!-- need to start working this over so it spits out something a little more user friendly, closer to the design mockups -->

    <h1>Name Of Disaster: <?php echo $info[0]["title"]; ?></h1>
    <h2>Statistic: <?php echo $info[0]["statistic"]; ?> </h2>
    <h2>Higher or lower than: </h2> <p><?php echo number_format($info[0]["randNum"]) ?></p>
    <div id="imageInsert"> </div> <!-- image goes here -->

    <button onclick="earlyEnd()">Early Exit</button>
    
    <!-- display actual -->
    <!-- <h2>Actual answer: </h2><p id="displayAnswer">?</p> -->
    <!-- display correct/incorrect -->
    <!-- <h1 id="displayAnswer2" class="text-light"></h1>  -->

</article>

<article class="box quizanswer">
<h1 id="displayAnswer2" class="text-light"></h1> <!-- display correct/incorrect -->
<h2>Was it higher or lower than <?php echo number_format($info[0]["randNum"]) ?> ?</h2>
<h2 id="displayAnswer3">You answered "HIGHER/LOWER" which is "CORRECT/INCORRECT"</h2>
<h2>Actual answer: </h2>
<p id="displayAnswer">?</p> <!-- display actual -->
<!-- NEXT BUTTON is formed here in NEXT, see game.js in the js folder.-->
<form id="next" action="game.php" method="POST">
    <input id="nextButtonGame" type="hidden" name="game" value='<?php echo $game; ?>'>
    <input id="nextButtonValue" type="hidden" name="answer" value=1> <!-- if set, give points -->
    <?php if (isset($_POST['life'])) {echo '<input id="lifeValue" type="hidden" name="life">'; } ?> <!-- value inserted by js -->
</form>

</article>



<aside class="box highlowbox">
    <button class="hilobtn" id="answerButtonLow" type="submit" onclick="answer('low')">Lower <i class="fas fa-chevron-circle-down"></i></button>
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
var currentDisaster = "<?php echo $originalGame[0]; ?>";
var currentTitle = "<?php echo $info[0]["title"]; ?>";
<?php if ($imageMode) {echo "var imageUrl = '" . $imageUrl . "';";} ?> // imageUrl var from bing if imageMode is true
</script>
<script src="js/game.js"></script>

<?php
include('includes/footer.php');
?>