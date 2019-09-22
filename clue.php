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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clue</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/leaflet.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="wrapper cluepage">

        <header class="box header navhd">
            <a href="choosejourney.php"><img src="images/back arrow.png" alt="Go Back" class="backarrow"/></a>
            <a href="index.php"><img src="images/logo.png" alt="Go Home" class="homelogo" height="100" width="150"/></a>
            <a href=""><img src="images/next arrow.png" alt="Next" class="nextarrow"/></a>
        </header>

        <aside class="box points">
            <form id="start" action="game.php" method="POST">
                <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
                <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
                <button type="submit" class="cluepointbtn"><i class="fas fa-gamepad"></i><br>
                Back To Game</button>
            </form>
            <button class="cluepointbtn"><?php echo $_SESSION['scoreTemp'];?><br>POINTS</button>
        </aside>

        <aside class="box">
            <h1>TIME FOR A CLUE!</h1>
        </aside>
        
        <article class="box infobox">
            
            <script> var map = false; </script>
            <h1>Disaster: <?php echo $info[0]["title"]; ?> </h1>
            <h1>Statistic: <?php echo $info[0]["statistic"]; ?> </h1>
            <h1>Number to compare: <?php echo $info[0]["randNum"]; ?> </h1>
            
            <?php if ($clueCodeValid): // $clueCodeValid true if right code not entered / no code entered?> 
            
            <h1>Insert your code to get a clue:</h1>
            
            <form id="start" action="clue.php" method="POST">
                <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
                <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
                <input type="text" class="input" name="clueCode" placeholder="Enter clue code" required width="70" height="50">
                <button type="submit" class="idbutton">Enter Code</button>
            </form>
            
            
            <?php elseif ($revealDesc): // if reveal desc 123?>
            <br>
            <h1> Description Clue (numbers removed) </h1>
            <p> <?php if ($description) {echo $description;} ?> </p>
            <?php elseif ($revealMap): // if 333 (map)?>
                <script> 
                var map = true; 
                var id = <?php echo $info[0]["ID"] ?>; 
                </script>
                <article id="map"></article>
            <?php endif  // end of else if statement?>
        </article>
        
           
        <footer class="box footer">PLACEHOLDER FOR BREADCRUMB</footer>
    
 
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/leaflet.js"></script>
    <script src="js/game_ajax.js"></script>
</div>
</body>
</html>