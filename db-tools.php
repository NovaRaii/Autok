<?php

function insertMakers($mysqli, $makers, $truncate = false) {
    if ($truncate) {
        $mysqli->query("TRUNCATE TABLE makers;");
    }

    foreach ($makers as $maker) {
        $result = $mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
        if (!$result) {
            "echo hiba történt a $maker beszúrása közben";
            return $result;
        }
    }
    return $result;
}

function createMaker($mysqli, $makers) {
    
        $result = $mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
        $makerName = $data['name'];
        if (!$result) {
            echo "Hiba történt a $makerName beszúrása közben";
        }
        return $result;
}

function updateMaker($mysqli, $data) {

    $makerName = $data['name'];

    $result = $mysqli->query("UPDATE makers SET name=$makerName");
    if (!$result) {
        "echo hiba történt a $maker beszúrása közben";
        return $result;
    }
    $maker = getMakerByName($mysqli, $makerName);
    return $maker;
}



function getMakerByName($mysqli, $data) {
    $result = $mysqli->query("SELECT * FROM makers WHERE name=$name ");
    $maker = $result->fetch_assoc();

    return $maker;
}
function getMaker($mysqli, $id) {
    $result = $mysqli->query("SELECT * FROM makers WHERE  ");
    $maker = $result->fetch_assoc();
    $result->free_result();
    return $maker;
}
function delMaker($mysqli, $id) {
    $result = $mysqli->query("DELETE makers WHERE id=$id");
    return $result;
}

function getAllMakers($mysqli) {
    $result = $mysqli->query("SELECT * FROM makers");
    $makers = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();


    return $makers;
}
    