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

<aside class="box points">

    <form id="start" action="game.php" method="POST">
      <input type="hidden" name="game" value='<?php echo $game; ?>'>
      <input type="hidden" name="init" value=1> <!-- if set, initiate game -->
      <button type="submit" class="cluepointbtn"><i class="fas fa-gamepad"></i><br>NEW GAME</button>
    </form>

    <a href="journey.php"><button class="cluepointbtn"><i class="fas fa-home"></i><br>HOME</button></a>

    <button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>

</aside>

</section>

<section class="gridwrap2">

<article class="infobox">

    <?php if (!isset($_POST['insert'])): ?> <!-- if not pressed insert yet show this etc. -->
    <h1>Insert your score into the leaderboard!</h1>
    <h1>Your scored: <?php if (isset($_SESSION['scoreTemp'])) {echo $_SESSION['scoreTemp'];} ?></h1>

    <form id="start" action="ending.php" method="POST">
    <input type="hidden" name="insert" value=1>
    <?php if ($nameRequest): ?> <!-- if account has no name-->
    <input type="text" class="input" name="newName" placeholder="Enter Your Name" width="100px" height="50px" required>
    <?php endif ?>
    <button type="submit" class="button">INSERT HIGH SCORE!</button>
    </form> 

    <?php else: ?> <!-- if pressed insert -->

    <h1>CONGRATULATIONS!</h1>
    <p>We hope you learnt something new and gained a better appreciation of the destructive power of mother nature on the Australian continent</p>
    <?php if (isset($_COOKIE["User"])): ?>
    <h1>If you want to try again,</h1>
    <h3>your ID for login is:
    <?php echo $_COOKIE["User"]; ?></h3>
    <?php endif ?>

    <aside class = "txtbox">
        <form id="start" action="scoreboard.php" method="POST">
        <button type="submit" class="button">Leaderboard</button>
        </form>
    </aside>

    <aside class = "txtbox">
        <form id="start" action="index.php" method="POST">
        <button type="submit" class="button">Home</button>
        </form>
    </aside>
    
    <?php endif ?>

</article> 
    
<?php
include('includes/footer.php');
?>
