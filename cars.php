<?php

//require_once('csv-tools.php');
ini_set('memory_limit','560M');
$FileName  = "car-db.csv";
$csvData = getCsvData($FileName);
$result = [];
$maker = [];
$makers = [];
$header = $csvData[0];
$idxMaker = array_search ('make', $header);
$idxModel = array_search ('model', $header);


function getCsvData($FileName){
 
    if (!file_exists($FileName)) {
        echo "$FileName nem található. ";
        return false;
    }
 
    
        $csvFile = fopen($FileName, 'r');
        $lines = [];
        while (! feof($csvFile)) {
            $line = fgetcsv($csvFile);
            $lines[] = $line;
        }
        fclose($csvFile);
        return $lines;
    
    }

 
if (empty($csvData)) {
    echo "Nincs Adat!";
    return false;
}
$maker = "";
$model = "";
$isHeader = true;
    foreach ($csvData as $idx => $line) {
        if (!is_array($line)) {
            continue;
        }
        if ($maker != $line[$idxMaker]){
            $maker = $line[$idxMaker];
            $makers[] = $maker;
        }
        if ($model != $line[$idxModel]){
            $model = $line[$idxModel];
            $result[$maker][] = $model;
        }
    }
    //print_r($result);
    print_r($makers);
