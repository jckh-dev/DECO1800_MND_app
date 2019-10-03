<?php
include('includes/gamelogic.php');
?>

<!-- <?php
include('includes/endinglogic.php');
?> -->

<!-- <?php
include('includes/cluelogic.php');
?> -->


<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<aside class="box points">

<!-- OLD CLUE PAGE CALL : THIS IS REPLACED BY A JS DROPDOWN BOX (class= "cluebtn") NEED TO RECONFIGURE THIS CALL SO THAT EVERYTHING ON THE CLUE PAGE LOADS IN ON THE DROP DOWN BOX>>>-->

<!-- <form id="start" action="clue.php" method="POST">
    <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
    <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
    <button class="cluepointbtn" type="submit"><i class="fas fa-question"></i><br>CLUES</button>
</form> -->

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
    <h2>Higher or lower than: </h2> <p><?php echo $info[0]["randNum"] ?></p>

</article>

<article class="infobox quizanswer">
<h1 id="displayAnswer2" class="text-light"></h1> <!-- display correct/incorrect -->
<h2>Was it higher or lower than <?php echo $info[0]["randNum"] ?> ?</h2>
<h2>You answered "HIGHER/LOWER PHP CALL" which is "CORRECT/INCORRECT PHP CALL"</h2>
<h2>Actual answer: </h2>
<p id="displayAnswer">?</p> <!-- display actual -->
<!-- NEXT BUTTON is formed here in NEXT, see game.js in the js folder.-->
<form id="next" action="game.php" method="POST">
    <input id="nextButtonGame" type="hidden" name="game" value='<?php echo $game; ?>'>
    <input id="nextButtonValue" type="hidden" name="answer" value=1> <!-- if set, give points -->
</form>
</article>

<article class="infobox quizend">
    <h1>THIS IS THE END OF THE GAME</h1>
    <h1>ALL OF ending.php NEEDS TO BE PLACED HERE AND FUNCTIONALITY UPDATED IN THE PHP LOGIC FILES AS REQUIRED</h1>
</article>

<article class = "box quizclue">
<h1>TIME FOR A CLUE!</h1>
<script> var map = false; </script>
<h1>Disaster: <?php echo $info[0]["title"]; ?> </h1>
<h1>Statistic: <?php echo $info[0]["statistic"]; ?> </h1>
<h1>Number to compare: <?php echo $info[0]["randNum"]; ?> </h1>

<?php if ($clueCodeValid): // $clueCodeValid true if right code not entered / no code entered?> 

<h1>Insert your code to get a clue:</h1>

<form id="start" action="clue.php" method="POST">
<input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
<input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
<input type="text" class="input" name="clueCode" placeholder="Enter clue code" required width="70" height="50">
<button type="submit" class="idbutton">Enter Code</button>
</form>

<?php elseif ($revealDesc): // if reveal desc 123?>
<br>
<h1> Description Clue (numbers removed) </h1>
<p> <?php if ($description) {echo $description;} ?> </p>
<?php elseif ($revealMap): // if 333 (map)?>
<script> 
var map = true; 
var id = <?php echo $info[0]["ID"] ?>; 
</script>
<article id="map"></article>
<?php endif  // end of else if statement?>

</article>

<aside class="box highlowbox">
    <button class="hilobtn" id="answerButtonLow" type="submit" onclick="answer('low')">Lower <i class="fas fa-chevron-circle-down"></i></button>
</aside>

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