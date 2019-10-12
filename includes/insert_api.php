<?php
    include("../db.php"); // db connect

    header("Content-Type: application/json");

    $newJSON = array();

    $userID = $_POST['ID'];
    

    // to get name
    if (isset($_POST['getName']) && isset($_POST['ID'])) {
        $nameRequest = 1; // when to show enter name
        $sql = "SELECT name FROM users WHERE userID = '$userID'";
        $result = $db->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            $name = $row["name"];
            if ($name != "") { // not empty?
                $nameRequest = 0;
            }
        }
        $newJSON["result"] = "found name";
        $newJSON["nameRequest"] = $nameRequest;
    }

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $sql = "UPDATE users SET name = '$name' WHERE userID = '$userID'";
        $result = $db->query($sql);
    }

    
    // set new name and/or new score
    if (isset($_POST['userScore']) && isset($_POST['ID'])) {
        $score = $_POST['userScore'];

        //INSERT SCORE
        $sql = "SELECT scoreID from scores ORDER BY scoreID DESC LIMIT 1";
        $result = $db->query($sql);
        if ($result) { //success
            $row = $result->fetch_assoc();
            $largestID = $row["scoreID"];
            $largestID++;
            $sql = "INSERT INTO scores VALUES ('$largestID','$userID','$score')";
            $result = $db->query($sql);
        } else { //error or empty
            $sql = "INSERT INTO scores VALUES ('1','$userID','$score')";
            $result = $db->query($sql);
        }

        $newJSON["result"] = "inserted";
    }

    echo json_encode($newJSON);
?>