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

<aside class="box">
<h1>CHOOSE YOUR <br>JOURNEY</h1>
</aside>

</section>
<section class="gridwrap2">

<aside> 
<form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="button">Start Guided Tour</button>
    </form>
</aside>

<aside>
<form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="button">Random Play</button>
</form>
</aside>

<aside>
<a href=""><button class="button">Look At A Map</button></a>
</aside>

<aside>
<a href="scoreboard.php"><button class="button">Leaderboard</button></a>
</aside>

<aside>
<form id="login" action="index.php" method="POST">
<input type="text" class="input"name="userID" placeholder="Enter ID" required>
<button class="idbutton" type='submit'>Login</button>
</form>
</aside>

<?php
include('includes/footer.php');
?>
