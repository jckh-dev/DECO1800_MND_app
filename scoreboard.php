<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    //Leaderboard Entries (10, you can set "LIMIT 10" to e.g. "LIMIT 5" for top 5 entries only)
    $sql = "SELECT score, name FROM scores INNER JOIN users ON users.userID=scores.userID ORDER BY score DESC LIMIT 10";
    $result = $db->query($sql);
    $count = 0;
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

<aside class="box points">
<button class="cluepointbtn"><i class="fas fa-question"></i><br>GAME</button>
<button class="cluepointbtn"><i class="fas fa-home"></i><br>HOME</button>
<button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>
</aside>

<aside class="box">
<h1>Don't forget your ID!</h1> 
<p>Use this number to track your progress: 
<?php echo $_COOKIE["User"];?></p>
</aside>

<article class="box infobox txtbox">
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
</article>

<?php
include('includes/footer.php');
?>