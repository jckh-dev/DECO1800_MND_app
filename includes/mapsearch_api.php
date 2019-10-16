<?php
// following is from the workshop wk 8, edited.
// Week 8 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-8-Workshop-Outline-b8c650435fb841aa82e40865373c2fa4

// {regions, names}

header("Content-Type: application/json");

$regions = json_decode($_POST['regions']);

$names;
if (isset($_POST['names'])) {
    $names = json_decode($_POST['names']);
}

$query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\" WHERE ";

// if both regions and names are set, upper for case insensitive (all upper case... close enough)
if (isset($_POST['regions']) && isset($_POST['names'])) {
    for ($i = 0; $i < sizeof($regions); $i++) {
        $region = $regions[$i];
        for ($j = 0; $j < sizeof($names); $j++) {
            $name = $names[$j];
            $whereQuery = "UPPER(regions) LIKE UPPER('%" . $region . "%') AND ";
            $nameQuery = "UPPER(title) LIKE UPPER('%" . $name . "%') OR ";
            if ($j == sizeof($names) - 1) {
                $nameQuery = "UPPER(title) LIKE UPPER('%" . $name . "%')";
            }
            $whereQuery .= $nameQuery;
            $query .= $whereQuery;
        }
    }
}

// if only regions
if (isset($_POST['regions']) && !isset($_POST['names'])) {
    $names = array("Bushfire", "Urban Fire", "Flood", "Cyclone", "Severe Storm", "Hail", "Environmental");
    for ($i = 0; $i < sizeof($regions); $i++) {
        $region = $regions[$i];
        for ($j = 0; $j < sizeof($names); $j++) {
            $name = $names[$j];
            $whereQuery = "UPPER(regions) LIKE UPPER('%" . $region . "%') AND ";
            $nameQuery = "UPPER(title) LIKE UPPER('%" . $name . "%') OR ";
            if ($j == sizeof($names) - 1) {
                $nameQuery = "UPPER(title) LIKE UPPER('%" . $name . "%')";
            }
            $whereQuery .= $nameQuery;
            $query .= $whereQuery;
        }
    }
}

$search = "https://data.gov.au/data/api/3/action/datastore_search_sql?sql=" . $query;
$data = file_get_contents($search);
$json = json_decode($data);

$newJSON = array();

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
echo json_encode($newJSON);

?>