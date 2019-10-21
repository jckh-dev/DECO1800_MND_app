<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    // finding final donation count
    $sql = "SELECT SUM(score) AS scoreSum FROM scores";
    $result = $db->query($sql);
    $totalScore = $result->fetch_assoc()["scoreSum"];


    // finding user donation count.
    $userID = $_COOKIE['User'];
    $sql = "SELECT SUM(score) AS scoreSum FROM scores WHERE userID = '$userID'";
    $result = $db->query($sql);
    $totalScoreUser = $result->fetch_assoc()["scoreSum"];
?>