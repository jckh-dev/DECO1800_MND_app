
<?php
include('includes/scoreboardlogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php if (isset($_COOKIE["User"])): ?>
<?php endif ?>

<?php
include('includes/header.php');
?>
<section class = "gridwraptitle">
    
<aside class="box points">
<form id="start" action="game.php" method="POST">
<input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
<input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
<button type="submit" class="cluepointbtn"><i class="fas fa-gamepad"></i><br>
GAME</button>
</form>
<a href="journey.php"><button class="cluepointbtn"><i class="fas fa-home"></i><br>HOME</button></a>
<button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>
</aside>

</section>

<section class="gridwrap2">

<article class="infobox">

<h1>Leaderboard</h1>
<!-- 10 scores max can be changed in the sql query above -->
<h2>
<?php while($row = $result->fetch_assoc()) {
$score = $row['score'];
$name = $row['name'];
$count++;
echo "<p class=''> $count. Name: \"$name\" <br>Score: \"$score\"</p>"; // this is what it repeats, change the <p> to whatever etc.
} ?>
</h2>

<?php
include('includes/footer.php');
?>