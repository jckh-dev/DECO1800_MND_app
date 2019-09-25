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