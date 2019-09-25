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

<!-- NEXT BUTTON is formed here in NEXT, see game.js in the js folder.-->
<form id="next" action="game.php" method="POST">
    <input id="nextButtonGame" type="hidden" name="game" value='<?php echo $game; ?>'>
    <input id="nextButtonValue" type="hidden" name="answer" value=1> <!-- if set, give points -->
</form>

<button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>

</aside>

<aside class="box highlowbox">
    <button class="hilobtn" id="answerButtonHigh" type="submit" onclick="answer('high')" >Higher <i class="fas fa-chevron-circle-up"></i></button>
</aside>

<article class="infobox">

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
    <h2>Higher or lower than: </h2> <p><?php echo $info[0]["randNum"] ?></p>
    <h2>Actual answer: </h2><p id="displayAnswer">?</p> <!-- display actual -->
    <h1 id="displayAnswer2" class="text-light"></h1> <!-- display correct/incorrect -->

</article>

<aside class="box highlowbox">
    <button class="hilobtn" id="answerButtonLow" type="submit" onclick="answer('low')">Lower <i class="fas fa-chevron-circle-down"></i></button>
</aside>

<!-- jquery -->
<script src="js/jquery-3.4.1.min.js"></script>

<!-- script & echoed values from server into js (james) -->
<script>
var correctAnswer = '<?php echo $info[0]["correct"]; ?>'; // echo 1 (return high/low string)
var numberAnswer = '<?php echo $info[0]["statisticNum"]; ?>'; // echo 2 (returns number of hidden disaster)
var endGame = '<?php echo $endGame; ?>' // echo 3 (returns if game should end (true = end))
</script>
<script src="js/game.js"></script>

<?php
include('includes/footer.php');
?>