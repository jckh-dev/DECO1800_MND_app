<?php
  session_start(); // start $_SESSION
  // guided tour vars
  $game = [
    "Bushfire",
    "Tornado",
    "Flood"
  ];
  $game = json_encode($game);
?>

<!DOCTYPE html>
<html lang="en">

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

  <aside class="box">
      <h1>WHERE WOULD YOU <BR>LIKE TO START?</h1>
  </aside>
            
  <aside class="box">
    <form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="button">PLAY THE GAME</button>
    </form>
  </aside>

<?php
include('includes/footer.php');
?>
