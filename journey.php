<?php
include('includes/indexlogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<h1>CHOOSE YOUR <br>JOURNEY</h1>
</aside>
</section>

<main class="gridwrap2 journey">

<a class ="largebtn" href="guidedtour.php">Start Guided Tour</a>

<form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $randomGame; ?>'>
      <input type="hidden" name="life" value=10> <!-- life amount -->
      <input type="hidden" name="init" value=1>
      <button type="submit" class="largebtn">Random Play</button>
</form>

<a class="largebtn"href="map.php">Look At A Map</a>

<a class="largebtn" href="scoreboard.php">Leaderboard</a>


<?php
include('includes/footer.php');
?>
