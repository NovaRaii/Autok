<?php

$fileName = "car-db.csv";
$csvdata = getCsvData($fileName);
$result = [];
$arr = array ('first' => 'a' , 'second' => 'b');
$key = array_search('a'. $arr);
$header = $csvData[0];
$keyMaker = array_search('make', $header);
$keyModel = array_search('model', $header);


function getCsvData($fileName, $withHeader = true) {
if(!file_exists($fileName)) {
    echo "$fileName nem található";
    return false;
}

    $csvFile = fopen($fileName, 'r');
    $header = fgetcsv($csvFile);
    $lines = [];
    if ($withHeader) {
        $lines[] = $header;
    }
    else {
        $lines = [];
    }
    while (! feof($csvFile)) {
        $line = fgetcsv($csvFile);
        $lines[] = $line;
    }
    fclose($csvFile);

    return $lines;
}
$csvData = getCsvData($fileName);
?>