<?php
// following is from the workshop wk 8, edited.
// Week 8 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-8-Workshop-Outline-b8c650435fb841aa82e40865373c2fa4

// {code, id}

header("Content-Type: application/json");

$newJSON = array();

$clueCode = json_decode($_POST['clueCode']);
$disasterID = json_decode($_POST['disasterID']);



// apply or reject clueCode
if (isset($_POST['clueCode']) && isset($_POST['disasterID'])) {
    // desc clue with no nums
    if ($clueCode == 529) {
        $newJSON["type"] = "description";
        $query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\" WHERE id = $disasterID";
        $search = "https://data.gov.au/data/api/3/action/datastore_search_sql?sql=" . $query;
        $data = file_get_contents($search);
        $json = json_decode($data);
        foreach ($json->result->records as $recordID => $record) {
            $description = $record->description;
            $description = preg_replace('/\d/', '', $description); // regex replace 0-9 (\d) with nothing.
            $newJSON["description"] = $description;
        }
    } elseif ($clueCode == 734) {
        $newJSON["type"] = "map";
        $query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\" WHERE id = $disasterID";
        $search = "https://data.gov.au/data/api/3/action/datastore_search_sql?sql=" . $query;
        $data = file_get_contents($search);
        $json = json_decode($data);

        $count = 0;
        foreach($json->result->records as $recordID => $record) {
            $lon = $record->lon;
            $lat = $record->lat;
            $title = $record->title;
            $newJSON[$recordID]["lat"] = $lat;
            $newJSON[$recordID]["lon"] = $lon;
            $newJSON[$recordID]["title"] = $title;
            $count++;
        }
    }
}

echo json_encode($newJSON);

?>