<?php
include('includes/endinglogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

    <form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="cluepointbtn"><i class="fas fa-gamepad"></i><br>NEW GAME</button>
    </form>

    <a href="journey.php"><button class="cluepointbtn"><i class="fas fa-home"></i><br>HOME</button></a>

    <button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>

</aside>

</section>

<main class="gridwrap2">

<article class="infobox">

    <div id="endingContent">

    </div>

</article>

<script>
    // for inserting data
    userID = <?php echo $_COOKIE["User"]; ?>; // echo 6 "userID" (userID of player)
    score = <?php echo $score; ?>; // delete when place in game (serves same purpose as "score" echoed in)
    mapInit = false;
    
</script>
    
<?php
include('includes/footer.php');
?>
<script src="js/game_ajax.js"></script>
<script>findName(); //find name</script>