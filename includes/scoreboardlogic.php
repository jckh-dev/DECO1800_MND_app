<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    //Leaderboard Entries (10, you can set "LIMIT 10" to e.g. "LIMIT 5" for top 5 entries only)
    $sql = "SELECT score, name FROM scores INNER JOIN users ON users.userID=scores.userID ORDER BY score DESC LIMIT 10";
    $result = $db->query($sql);
    $count = 0;
?>