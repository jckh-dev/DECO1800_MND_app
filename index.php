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

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<aside class="box txtbox">
<h1>CHOOSE YOUR <br>JOURNEY</h1>
</aside>

<div class="btnbox">

<aside id="start_journey"><a href="choose_journey.php"><button class="button">Start Guided Tour</button></a>
</aside>

<aside>
<a href="game.php"><button class="button">Random Play</button></a>
</aside>

<aside>
<a href=""><button class="button">Look At A Map</button></a>
</aside>

<aside>
<a href="scoreboard.php"><button class="button">Leaderboard</button></a>
</aside>

<aside class="box">
<form id="login" action="index.php" method="POST">
<input type="text" class="input"name="userID" placeholder="Enter ID" required>
<button class="idbutton" type='submit'>Login</button>
</form>
</aside>
</div>

<?php
include('includes/footer.php');
?>
