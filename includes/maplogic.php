<?php
    session_start(); // start $_SESSION
    include("db.php"); // db connect

    if (isset($_POST['oldGame'])) {
        $game = json_decode($_POST['oldGame'], true);
        $info = json_decode($_POST['info'], true);
        $oldGame = $game; // for display of current topics
        $oldGameJson = json_encode($game); // to send current topics
        $endGame = false; // tells when game should end (e.g. a button) (true = end)
        $jsonInfo = json_encode($info); // to restore this game.
    }

    $clueCodeValid = false; // if valid, true.
    $revealMap = false;
    $description = false;
    if (isset($_POST['clueCode'])) {
        $clueCode = $_POST['clueCode'];
        if ($clueCode == 123) { // desc clue
            $revealDesc = true;
            $clueCodeValid = true;
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
            $clueCodeValid = true;
            $revealMap = true;
        }
    }

?>
