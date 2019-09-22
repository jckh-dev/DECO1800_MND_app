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
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
</head>

<body>
    <div class="wrapper">
        
        <?php if (isset($_COOKIE["User"])): ?>
        <?php endif ?>

     <header class="box header navhd">
        <a href="choosejourney.php"><img src="images/back arrow.png" alt="Go Back" class="backarrow"/></a>
        <a href="index.php"><img src="images/logo.png" alt="Go Home" class="homelogo" height="100" width="150"/></a>
        <a href=""><img src="images/next arrow.png" alt="Next" class="nextarrow"/></a>
    </header>

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

    <footer class="box footer">PLACEHOLDER FOR BREADCRUMB</footer>
    </div>
</body>
</html>