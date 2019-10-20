<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    // finding final donation count
    $sql = "SELECT SUM(score) AS scoreSum FROM scores";
    $result = $db->query($sql);
    $totalScore = $result->fetch_assoc()["scoreSum"];

    $moneyDivisor = 50; // every 50 points is $1.
    $totalMoney = $totalScore / $moneyDivisor;
?>