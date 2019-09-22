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
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
</head>

<body>

<div class="wrapper">

<header class="box header navhd">
    <a href="index.php"><img src="images/back arrow.png" alt="Go Back" class="backarrow"/></a>
    <a href="index.php"><img src="images/logo.png" alt="Go Home" class="homelogo" height="100" width="150"/></a>
    <a href=""><img src="images/next arrow.png" alt="Next" class="nextarrow"/></a>
  </header>
  
  <aside class="box txtbox">
      <h1>CHOOSE YOUR <br>JOURNEY</h1>
  </aside>

<div class="btnbox">
  
<aside class="box" id="start_journey"><a href="choose_journey.php"><button class="button">Start Guided Tour</button></a>
</aside>

    <aside class="box">
    <a href="content.html"><button class="button">Browse Some Content</button></a>
  </aside>

  <aside class="box">
    <a href=""><button class="button">Look At A Map</button></a>
  </aside>

  <aside class="box">
      <a href="scoreboard.php"><button class="button">Leaderboard</button></a>
  </aside>

  <aside class="box">
        <form id="login" action="index.php" method="POST">
            <input type="text" class="input"name="userID" placeholder="Enter ID" required>
            <button class="idbutton" type='submit'>Login</button>
        </form>
  </aside>
    </div>

  <footer class="box footer">PLACEHOLDER FOR BREADCRUMB</footer>

</div>

</body>
</html>