<?php
    session_start(); // start $_SESSION

    // initiate stuff when init POST exists (start of game)
    if (isset($_POST['init'])) {
        // set score counter to 0
        $_SESSION['scoreTemp'] = 0;
    }

    if (isset($_POST['life'])) {
        $life = $_POST['life'];
    }

    // get game disasters
    $game = json_decode($_POST['game'], true);
    $originalGame = $game;
    $gameCount = sizeof($game);

    // main game
    if (isset($_POST['game'])) {

        if ($game[0] == "infinite") {
            $randomDisasters = ["Bushfire", "Urban Fire", "Flood", 
                "Cyclone", "Severe Storm", "Hail", "Environmental"];
            // pick random disaster from selected above
            $game[0] = $randomDisasters[array_rand($randomDisasters, 1)];
            // to keep it infinite (0th entry is removed, making infinite first next round)
            $game[1] = "infinite"; 
        }
        
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
            if ($seperator = explode("/",$game[0])) {
                $query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\" WHERE title LIKE '%" . $seperator[0] . "%' ";
                $endQuery = "ORDER BY RANDOM() LIMIT 1";
                $orLike = "";
                for ($i = 1; $i < sizeof($seperator); $i++) {
                    $orLike = $orLike . "OR title LIKE '%" . $seperator[$i] . "%' ";
                }
                $query = $query . $orLike . $endQuery;
            } else {
                $query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\" WHERE title LIKE '%" . $game[0] . "%' ORDER BY RANDOM() LIMIT 1";
            }
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
            $stat = $info[0]["statisticNum"];
            $possible[0] = floor($stat / 2);
            $possible[1] = floor($stat / 4);
            $possible[2] = floor($stat * 4);
            $possible[3] = floor($stat * 2);
            $possibleKey = array_rand($possible, 1);
            $randNum = $possible[$possibleKey];

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

    // IMAGEMODE - READ
    // IMPORTANT: TRUE FOR API IMAGE MODE, FALSE FOR PRESET IMAGES FOR 5 CHOSEN DISASTERS...
    // DO NOT TURN IT ON UNLESS YOU NEED TO TEST IT, ONLY 1000 TRANSACTIONS PER MONTH.
    $imageMode = false;
    if ($imageMode) {
        /* Reference: 
            Quickstart: Search for images using the Bing Image Search REST API and PHP. (2019). Retrieved from
            https://docs.microsoft.com/en-gb/azure/cognitive-services/bing-image-search/quickstarts/php
        */
        $url = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';
        $query = $info[0]["title"];
        $query_end = '&count=1&offset=0&mkt=en-au&safeSearch=Strict&license=share';
        $accessKey = '1c9a942a389f4241aac9337be633669f'; //f1c9a942a389f4241aac9337be633669f
        $headers = "Ocp-Apim-Subscription-Key: $accessKey\r\n";
        $options = array ( 'http' => array (
                                'header' => $headers,
                                'method' => 'GET' ));
        $context = stream_context_create($options);
        // @ = error control operator (supresses errors/warnings)
        $result = @file_get_contents($url . "?q=" . urlencode($query) . $query_end, false, $context);
        if ($result !== false) { // if there is a result
            $result = json_decode($result, true);
            if (array_key_exists("value", $result)) {
                $imageResult = $result["value"];
                $imageUrl = $imageResult[0]["contentUrl"];
            } else {
                $imageMode = false; // bad result
            }
        } else {
            $imageMode = false; // bad result
        }
    }
?>