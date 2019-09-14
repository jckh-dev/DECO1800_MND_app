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
    $description = false;
    if (isset($_POST['clueCode'])) {
        $clueCode = $_POST['clueCode'];
        if ($clueCode == 123) {
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
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="Clue-page">

    <h1>Disaster: <?php echo $info[0]["title"]; ?> </h1>
    <h1>Statistic: <?php echo $info[0]["statistic"]; ?> </h1>
    <h1>Number to compare: <?php echo $info[0]["randNum"]; ?> </h1>
    <?php if ($clueCodeValid): // $clueCodeValid true if right code not entered / no code entered?> 
    <h1>Insert your code to get a clue (should be 3 digits): </h1>
    <form id="start" action="clue.php" method="POST">
        <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
        <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
        <input type="text" name="clueCode" placeholder="Enter clue code" required>
        <button type="submit" class="button">Enter Code</button>
    </form>
    <?php else: // if the hard coded code/s are correct?>
    <br>
    <h1> Description Clue (numbers removed) </h1>
    <p> <?php if ($description) {echo $description;} ?> </p>
    <?php endif  // end of else if statement?>
    <form id="start" action="game.php" method="POST">
        <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
        <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
        <button type="submit" class="button">Go back to game</button>
    </form>

    </div>

</body>
</html>