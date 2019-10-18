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

<form id="start" action="game.php" method="POST">
<input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
<input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
<button type="submit" class="cluepointbtn"><i class="fas fa-gamepad"></i><br>
Back To Game</button>
</form>

<button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>
</aside>

</section>

<main class="gridwrap2">

<article class="infobox">
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

<script>
    var ID = <?php echo $info[0]["ID"] ?>; // echo 5 (ID of current disaster)
    var mapInit = false; // true = init map.
</script>

<?php
include('includes/footer.php');
?>
<script src="js/game_ajax.js"></script>
<script src="js/leaflet.js"></script>