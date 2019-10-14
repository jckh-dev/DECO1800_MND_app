<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    // for final answer
    if (isset($_POST['answer'])) {
        $score = $_SESSION['scoreTemp'] + 10;
    } else {
        $score = $_SESSION['scoreTemp'];
    }
?>