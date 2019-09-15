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
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
</head>

<body>

    <div class="grid end">
        <header>   
        <a href="welcome.html"><img src="images/logo.png" alt="NDM" style="width:150px;height:100px;"></a>
        </header>

        <article class="quizbox">
        <div class="center">
        <?php if (isset($_COOKIE["User"])): ?>
        <h1>Want to come back? Your ID for login is: <?php echo $_COOKIE["User"]; ?></h1>
        <?php endif ?>

        <?php if (!isset($_POST['insert'])): ?> <!-- if not pressed insert yet show this etc. -->
        <h1>Insert your score into the leaderboard!</h1>
        <h1>Your score: <?php if (isset($_SESSION['scoreTemp'])) {echo $_SESSION['scoreTemp'];} ?></h1>
        <form id="start" action="ending.php" method="POST">
            <input type="hidden" name="insert" value=1>
            <?php if ($nameRequest): ?> <!-- if account has no name-->
            <input type="text" name="newName" placeholder="Enter your name" required>
            <?php endif ?>
            <button type="submit" class="button">Insert</button>
        </form>
        <?php else: ?> <!-- if pressed insert -->
        <p> Done! </p>
        <form id="start" action="scoreboard.php" method="POST">
            <button type="submit" class="button">Leaderboard</button>
        </form>
        <form id="start" action="index.php" method="POST">
            <button type="submit" class="button">Home</button>
        </form>
        <?php endif ?>
        </div>
        </article>

        <footer class="footer">PLACEHOLDER FOR BREADCRUMB LINKS</footer>
    </div>
</body>
</html>