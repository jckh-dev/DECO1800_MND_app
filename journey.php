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

<aside>
    <a href="guidedtour.php"><button class="button">Start Guided Tour</button></a>
</aside>

<aside>
<form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $randomGame; ?>'>
      <input type="hidden" name="life" value=10> <!-- life amount -->
      <input type="hidden" name="init" value=1>
      <button type="submit" class="button">Random Play</button>
</form>
</aside>

<aside>
<a href="map.php"><button class="button">Look At A Map</button></a>
</aside>

<aside>
<a href="scoreboard.php"><button class="button">Leaderboard</button></a>
</aside>

<?php
include('includes/footer.php');
?>
