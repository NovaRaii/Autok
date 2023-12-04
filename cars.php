<?php

require_once('db-tools.php');
require_once('MakersDbTools.php');
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



function getMakers($csvData){
    if (empty($csvData)) {
        echo "Nincs Adat!";
        return false;
    }
    $maker = "";
    $header = $csvData[0];
    $idxMaker = array_search ('make', $header);
    foreach ($csvData as $idx => $line) {
        if (!is_array($line)) {
            continue;
        }
        if($idx == 0) {
            continue;
        }
        if ($maker != $line[$idxMaker]){
            $maker = $line[$idxMaker];
            $makers[] = $maker;
        }
    }
    return $makers;
}

$MakersDbTools = new MakersDbTools();

$makers = getMakers($csvData);
$errors = [];
foreach ($makers as $maker) {
    
    $result = $MakersDbTools->createMaker($maker);
    if (!$result) {
        $errors[] = $maker;
    }
    echo "$maker\n";
}

$allMakers = $MakersDbTools->getAllMakers();
$cnt = count($allMakers);
$rows = count($makers);
echo "$rows  sor van;\n";


?>