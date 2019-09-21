<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    if (!isset($_COOKIE["User"])) {
        $sql = "SELECT userID from users ORDER BY userID DESC LIMIT 1";
        $result = $db->query($sql);
        if ($result) { //success
            $row = $result->fetch_assoc();
            $largestID = $row["userID"];
            $largestID++;
            $sql = "INSERT INTO users (userID) VALUES ('$largestID')";
            $result = $db->query($sql);
            setcookie("User", $largestID, time() + (60*60*1000), "/"); // 1 hour
            echo "Created User" . $largestID . "<br>";
            $_COOKIE["User"] = $largestID;
        } else { //error or empty
            $sql = "INSERT INTO users (userID) VALUES ('1')";
            $result = $db->query($sql);
        } 
    }

    if (isset($_POST['register'])) {
        $sql = "SELECT userID from users ORDER BY userID DESC LIMIT 1";
        $result = $db->query($sql);
        if ($result) { //success
            $row = $result->fetch_assoc();
            $largestID = $row["userID"];
            $largestID++;
            $sql = "INSERT INTO users (userID) VALUES ('$largestID')";
            $result = $db->query($sql);
            setcookie("User", $largestID, time() + (60*60*1000), "/"); // 1 hour
            echo "Created User" . $largestID . "<br>";
            $_COOKIE["User"] = $largestID;
        } else { //error or empty
            $sql = "INSERT INTO users (userID) VALUES ('1')";
            $result = $db->query($sql);
        } 
    }

    $loginTest = false;
    if (isset($_POST['userID'])) {
        $loginUserID = $_POST['userID'];
        $sql = "SELECT userID from users WHERE userID = '$loginUserID'";
        $result = $db->query($sql);
        if ($result) { // it exists
            $row = $result->fetch_assoc();
            $UserID = $row["userID"];
            if($UserID) {
                setcookie("User", $UserID, time() + (60*60*1000), "/"); // 1 hour
                $_COOKIE["User"] = $UserID;
            } else {
                $loginTest = true; // failure
            }
        } else {
            $loginTest = true; // failure
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front Page</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
</head>

<body class="indexpage">

  <header class="box logoheader">
    <a href="choose_journey.html"><img src="images/logo.png" alt="Go Home" class="homelogo" height="100" width="150"/></a>
  </header>
  
  <aside class="box">
      <h1>CHOOSE YOUR <br>JOURNEY</h1>
  </aside>

  <aside class="box">
      <a href="choose_journey.php"><button class="button">Start Guided Tour</button></a>
  </aside>

  <aside class="box">
      <a href="scoreboard.php"><button class="button">Leaderboard</button></a>
  </aside>

  <aside class="box login">
        <form id="login" action="index.php" method="POST">
            <div class="input"><input type="text" name="userID" placeholder="Enter ID" required></div>
            <button class="idbutton" type='submit'>Login</button>
        </form>
  </aside>

</body>
</html>