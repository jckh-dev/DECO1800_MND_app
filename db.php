<?php
    // connect to DB
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'disaster';
    
    $db = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($db->connect_error) {
        die($db->connect_error);
    }

?>
