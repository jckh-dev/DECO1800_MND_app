<?php

header("Content-Type: application/json");

$query = "SELECT * from \"ad5c6594-571e-4874-994c-a9f964d789df\"";
$search = "https://data.gov.au/data/api/3/action/datastore_search_sql?sql=" . $query;
$data = file_get_contents($search);
$json = json_decode($data);


$newJSON = array();
$recordCount = 0;

foreach($json->result->records as $recordID => $record) {

    $lon = $record->lon;
    $lat = $record->lat;
    $title = $record->title;
    $newJSON[$recordID]["lat"] = $lat;
    $newJSON[$recordID]["lon"] = $lon;
    $newJSON[$recordID]["title"] = $title;

}
echo json_encode($newJSON);

?>