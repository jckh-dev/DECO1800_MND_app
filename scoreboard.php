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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scoreboard</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
</head>

<body>

    <div class="grid leaderboard">
    <header>   
      <a href="welcome.html"><img src="images/logo.png" alt="NDM" style="width:150px;height:100px;"></a>
    </header>

    <?php if (isset($_COOKIE["User"])): ?>
    
    <?php endif ?>

    
    <article class="quizbox">
    <div class="center">
    <h2> Leaderboard </h2>
    <h1>Want to come back? Your ID for login is: <?php echo $_COOKIE["User"]; ?></h1>
    <!-- 10 scores max can be changed in the sql query above -->
    <h1>
    <?php while($row = $result->fetch_assoc()) {
        $score = $row['score'];
        $name = $row['name'];
        $count++;
        echo "<p class=''> $count. Name: \"$name\" Score: \"$score\"</p>"; // this is what it repeats, change the <p> to whatever etc.
    } ?>
    </h1>
    <a href="index.php"><button class="button">Home</button></a>
    </div>
    </article>

    


    <footer class="footer">PLACEHOLDER FOR BREADCRUMB LINKS</footer>
    </div>

</body>
</html>