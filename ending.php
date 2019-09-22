<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    // for final answer
    if (isset($_POST['answer'])) {
        $_SESSION['scoreTemp'] += 10;
    }

    $nameRequest = true; // when to show enter name
    $userID = $_COOKIE["User"];
    $sql = "SELECT name FROM users WHERE userID = '$userID'";
    $result = $db->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        if ($name != "") { // empty?
            $nameRequest = false;
        }
    }
    
    // set new name and/or new score
    if (isset($_SESSION['scoreTemp']) && isset($_POST['insert']) && isset($_COOKIE["User"])) {
        if (isset($_POST['newName'])) { // if new name
            $newName = $_POST['newName'];
            $sql = "UPDATE users SET name = '$newName' WHERE userID = '$userID'";
            $result = $db->query($sql);
        }
        $newScore = $_SESSION['scoreTemp'];

        //INSERT SCORE
        $sql = "SELECT scoreID from scores ORDER BY scoreID DESC LIMIT 1";
        $result = $db->query($sql);
        if ($result) { //success
            $row = $result->fetch_assoc();
            $largestID = $row["scoreID"];
            $largestID++;
            $sql = "INSERT INTO scores VALUES ('$largestID','$userID','$newScore')";
            $result = $db->query($sql);
        } else { //error or empty
            $sql = "INSERT INTO scores VALUES ('1','$userID','$newScore')";
            $result = $db->query($sql);
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ending</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
</head>

<body>
    <div class="wrapper endingpg">

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
<article class="box infobox">
     
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
            <form id="start" class = "box" action="index.php" method="POST">
            <button type="submit" class="button">Home</button>
            </form>
        </aside>
    <?php endif ?>
    </article> 
    <footer class="box footer">PLACEHOLDER FOR BREADCRUMB</footer>

</div>
</body>
</html>