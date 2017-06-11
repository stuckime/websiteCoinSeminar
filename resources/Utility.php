<?php
function getCityInfo($city) {
    $cities;
    if (($handle = fopen("data/CityInfo.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $cities[$data[0]] = $data;
        }
        fclose($handle);
    }
    return $cities[$city]; 
}

function getContinentOfCity($city) {
    return getCityInfo($city)[1];
}

function loadCSV($file) {
    $result;
    $row = 0;
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $result[$row] = $data;
            $row++;
        }
        fclose($handle);
    }
    return $result;            
}
?>