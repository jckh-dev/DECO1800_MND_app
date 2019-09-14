<?php
    session_start(); // start $_SESSION

    // initiate stuff when init POST exists (start of game)
    if (isset($_POST['init'])) {
        // set score counter to 0
        $_SESSION['scoreTemp'] = 0;
    }

    // guided tour
    if (isset($_POST['game'])) {

        // get game disasters
        $game = json_decode($_POST['game'], true);
        
        // info here
        $info = array();

        // randomly choose chosen stat for game
        $stat = [
            "Evacuated",
            "Homeless",
            "Injuries",
            //"Deaths", removed due to how common it is
            "Insured Cost",
            "Train(s) damaged",
            "Train(s) destroyed",
            "Home(s) damaged",
            "Home(s) destroyed",
            "Building(s) damaged",
            "Building(s) destroyed",
            "Ind Premises destroyed",
            "Com Premises damaged",
            "Com Premises destroyed",
            "Bridge(s) damaged",
            "Bridge(s) destroyed",
            "Aircraft damaged",
            "Aircraft destroyed",
            "Motor Vehicle(s) damaged",
            "Motor Vehicle(s) destroyed",
            "Water vessel(s) damaged",
            "Water vessel(s) destroyed",
            "Business(es) damaged",
            "Business(es) destroyed",
            "Farm(s) damaged",
            "Farm(s) destroyed",
            "Crop(s) destroyed",
            "Livestock destroyed",
            "Government assistance"
        ];
        shuffle($stat);
        $info[0]["statisticNum"] = false;
        
        //find topic title, pick 1 random, check through random stat list to see if stat avaliable
        //if they do not have a stat, loop again, else break.
        $tryCount = 0; // amount of tries done
        while(!$info[0]["statisticNum"] || $tryCount > 100) {
            $tryCount++;
            // search
            $query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\" WHERE title LIKE '%" . $game[0] . "%' ORDER BY RANDOM() LIMIT 1";
            $search = "https://data.gov.au/data/api/3/action/datastore_search_sql?sql=" . $query;
            $data = file_get_contents($search);
            $json = json_decode($data);

            // following is from the workshop wk 8, edited.
            // Week 8 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-8-Workshop-Outline-b8c650435fb841aa82e40865373c2fa4

            foreach ($stat as $statistic) {
                foreach ($json->result->records as $recordID => $record) {
                    $title = $record->title;
                    if ($record->$statistic) {
                        $info[0]["statisticNum"] = $record->$statistic;
                        $info[0]["title"] = $title;
                        $info[0]["statistic"] = $statistic;
                        $info[0]["ID"] = $record->id;
                    } else {
                        break;
                    }
                }
                if ($info[0]["statisticNum"]) {
                    break;
                }
            }
        }

        $oldGame = $game; // for display of current topics
        $oldGameJson = json_encode($game); // to send current topics
        $endGame = false; // tells when game should end (e.g. a button) (true = end)

        //re-encode game for next
        if (sizeof($game) > 1) {
            array_splice($game, 0, 1); // remove current topic from array
            $game = json_encode($game); // re-encode for next game
        } else if (sizeof($game) == 1) {
            unset($_POST["game"]);
            $endGame = true;
        }

        
        // rand number to compare
        if ($info[0]["statisticNum"]) {
            $lowest = floor($info[0]["statisticNum"] / 2);
            $highest = floor($info[0]["statisticNum"] * 2);
            $randNum = rand($lowest, $highest);

            // ensure that it makes sense for some disasters
            if ($randNum == 0) {
                $randNum = 2;
            }
            $info[0]["randNum"] = $randNum;
        }

        // for validating in javascript (can be easily exploited but doesn't matter)
        if ($info[0]["statisticNum"] <= $info[0]["randNum"]) { // stat is higher or equal
            $info[0]["correct"] = "low";
        } else if ($info[0]["statisticNum"] >= $info[0]["randNum"]) { // stat is lower or equal
            $info[0]["correct"] = "high";
        }

        $jsonInfo = json_encode($info); // to restore this game.
    }

    if (isset($_POST['oldGame'])) {
        $game = json_decode($_POST['oldGame'], true);
        $info = json_decode($_POST['info'], true);
        $oldGame = $game; // for display of current topics
        $oldGameJson = json_encode($game); // to send current topics
        $endGame = false; // tells when game should end (e.g. a button) (true = end)
        $jsonInfo = json_encode($info); // to restore this game.

        //re-encode game for next
        if (sizeof($game) > 1) {
            array_splice($game, 0, 1); // remove current topic from array
            $game = json_encode($game); // re-encode for next game
        } else if (sizeof($game) == 1) {
            unset($_POST["game"]);
            $endGame = true;
        }
    }

    // if correct
    if (isset($_POST['answer'])) {
        $_SESSION['scoreTemp'] += 10;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Higher Or Lower</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6471a92edb.js"></script>
</head>
<body>

  <div class="grid game">
    <header>   
      <a href="welcome.html"><img src="images/logo.png" alt="NDM" style="width:150px;height:100px;"></a>
    </header>

    <a href="index.php"><button class="button prev"><i class="fas fa-step-backward"></i>HOME</button></a> <!-- i'll have to implement "back" later-->
    <!-- NEXT BUTTON is formed here in NEXT, see game.js in the js folder.-->
    <form id="next" action="game.php" method="POST">
    <input id="nextButtonGame" type="hidden" name="game" value='<?php echo $game; ?>'>
    <input id="nextButtonValue" type="hidden" name="answer" value=1> <!-- if set, give points -->
    </form>
    
    <button class="button"><i class="fas fa-question"><br>CLUE</i></button>
    
    <aside class="points"><button class="button"><?php echo $_SESSION['scoreTemp']; ?><br>POINTS</button></aside> <!-- point button misalligned? -->

    <aside class="higher"><button id="answerButtonHigh" type="submit" onclick="answer('high')" class="button">HIGHER</button></aside>

    <article class="quizbox">
      <h1>Current Topic: <?php echo $oldGame[0]; ?></h1>
      <h1>Next Topics:
      <?php 
        if (isset($_POST["game"]) || isset($_POST["oldGame"])) {
            for ($i = 1; $i < sizeof($oldGame); $i++) {
                echo $oldGame[$i] . ", ";    
            } 
        } else {
            echo "Nothing Left.";
        }
      ?>
      </h1>
      <h1>Title: <?php echo $info[0]["title"]; ?></h1>
      <h1>Statistic: <?php echo $info[0]["statistic"]; ?></h1>
      <h1>Higher or lower than: <?php echo $info[0]["randNum"] ?></h1>
      <h1>Actual answer: <h1 id="displayAnswer">?</h1></h1> <!-- display actual -->
      <h1 id="displayAnswer2" class="text-light"></h1> <!-- display correct/incorrect -->
    </article>

    
    <aside id="lower"><button id="answerButtonLow" type="submit" onclick="answer('low')" class="button">LOWER</button></aside>
    
  
    <footer class="footer">PLACEHOLDER FOR BREADCRUMB LINKS</footer>
  
  </div>

</div>

</div>

<!-- jquery -->
<script src="js/jquery-3.4.1.min.js"></script>

<!-- script & echoed values from server into js (james) -->
<script>
var correctAnswer = '<?php echo $info[0]["correct"]; ?>'; // echo 1 (return high/low string)
var numberAnswer = '<?php echo $info[0]["statisticNum"]; ?>'; // echo 2 (returns number of hidden disaster)
var endGame = '<?php echo $endGame; ?>' // echo 3 (returns if game should end (true = end))
</script>
<script src="js/game.js"></script>

</body>
</html>