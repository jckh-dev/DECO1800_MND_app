<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    if (isset($_POST['oldGame'])) {
        $game = json_decode($_POST['oldGame'], true);
        $info = json_decode($_POST['info'], true);
/*
        // query for map
        $query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\"";
        $search = "https://data.gov.au/data/api/3/action/datastore_search_sql?sql=" . $query;
        $data = file_get_contents($search);
        $json = json_decode($data);

        // following is from the workshop wk 8, edited.
        // Week 8 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-8-Workshop-Outline-b8c650435fb841aa82e40865373c2fa4
        
        $clueInfo;
        $count = 0;
        foreach ($json->result->records as $recordID => $record) {
            $clueInfo[$count]["ID"] = $recordID;
            $clueInfo[$count]["title"] = $record->title;
            $clueInfo[$count]["lat"] = $record->lat;
            $clueInfo[$count]["lon"] = $record->lon;
            $count++;
        }
*/
        $oldGame = $game; // for display of current topics
        $oldGameJson = json_encode($game); // to send current topics
        $endGame = false; // tells when game should end (e.g. a button) (true = end)
        $jsonInfo = json_encode($info); // to restore this game.
    }

    $clueCodeValid = true; // if valid, false.
    $revealDesc = false;
    $revealMap = false;
    $description = false;
    if (isset($_POST['clueCode'])) {
        $clueCode = $_POST['clueCode'];
        if ($clueCode == 123) { // desc clue
            $revealDesc = true;
            $clueCodeValid = false;
            $questionID = $info[0]["ID"];
            $query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\" WHERE id = $questionID";
            $search = "https://data.gov.au/data/api/3/action/datastore_search_sql?sql=" . $query;
            $data = file_get_contents($search);
            $json = json_decode($data);
            foreach ($json->result->records as $recordID => $record) {
                $description = $record->description;
                $description = preg_replace('/\d/', '', $description); // regex replace 0-9 (\d) with nothing.
            }
        } elseif ($clueCode == 456) { // map clue
            $clueCodeValid = false;
            $revealMap = true;
        }
    }

?>
