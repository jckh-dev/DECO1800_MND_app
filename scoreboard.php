
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
include('includes/gameheader.php');
?>
<a href="journey.php"><button class="cluepointbtn"><i class="fas fa-home"></i><br>HOME</button></a>
<button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>
</aside>

</section>

<main class="gridwrap2">

<article class="infobox">

<h1 class="leaderbd">Leaderboard</h1>
<!-- 10 scores max can be changed in the sql query above -->

<?php while($row = $result->fetch_assoc()) {
$score = $row['score'];
$name = $row['name'];
$count++;

echo "<h2 class='$count'> <b>$count</b>. Name: \"$name\" <br>Score: \"$score\"</h2>"; // this is what it repeats, change the <p> to whatever etc.
} ?>


<?php
include('includes/footer.php');
?>