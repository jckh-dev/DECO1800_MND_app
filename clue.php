<?php
include('includes/cluelogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper cluepage">

<?php
include('includes/header.php');
?>

<aside class="box points">

<form id="start" action="game.php" method="POST">
<input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
<input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
<button type="submit" class="cluepointbtn"><i class="fas fa-gamepad"></i><br>
Back To Game</button>
</form>

<button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>

</aside>

<aside class="box">
<h1>TIME FOR A CLUE!</h1>
</aside>

<article class="box infobox">

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

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/leaflet.js"></script>
<script src="js/game_ajax.js"></script>

<?php
include('includes/footer.php');
?>