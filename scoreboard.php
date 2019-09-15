<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    //Leaderboard Entries (10, you can set "LIMIT 10" to e.g. "LIMIT 5" for top 5 entries only)
    $sql = "SELECT score, name FROM scores INNER JOIN users ON users.userID=scores.userID ORDER BY score DESC LIMIT 10";
    $result = $db->query($sql);
    $count = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="end-page">

    <?php if (isset($_COOKIE["User"])): ?>
    <h1>Want to come back? Your ID for login is: <?php echo $_COOKIE["User"]; ?></h1>
    <?php endif ?>

    <p> Leaderboard </p>

    <!-- 10 scores max can be changed in the sql query above -->
    <?php while($row = $result->fetch_assoc()) {
        $score = $row['score'];
        $name = $row['name'];
        $count++;
        echo "<p class=''> $count. Name: \"$name\" Score: \"$score\"</p>"; // this is what it repeats, change the <p> to whatever etc.
    } ?>


    <aside id="start_journey"><a href="index.php"><button class="button">Home</button></a></aside>


    </div>

</body>
</html>