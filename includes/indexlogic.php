<?php
    session_start(); // start $_SESSION
    // guided tour vars
    $tourGame = [
        "Bushfire/Urban Fire",
        "Flood",
        "Cyclone",
        "Severe Storm/Hail",
        "Environmental"
    ];
    $tourGame = json_encode($tourGame);

    // random game vars
    $randomGame = [
        "Bushfire",
        "Tornado",
        "Flood"
    ];
    $randomGame = json_encode($randomGame);

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