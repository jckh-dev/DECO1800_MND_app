<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    // finding final donation count
    $sql = "SELECT SUM(score) AS scoreSum FROM scores";
    $result = $db->query($sql);
    $totalScore = $result->fetch_assoc()["scoreSum"];
?>