<?php 
header('Content-Type: text/html; charset=utf-8');

/* Endereço tem que estar sempre na ordem contrária
    Ex: MG Belo Horizonte Avenida Cristiano Machado 1400 */

// function to get  the address
function get_lat_long($address){

    $address = str_replace(" ", "+", $address);

    $json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyAcSWtNDWRyJ_DERHgP5yWv2QkacKeqaYU");
    //var_dump($json);
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    
    $array = array($lat, $long);
    return $array;
}

$mapLat = '';
$mapLong = '';
$address = $_POST["address"];
//$address = 'Minhas Gerais Manhuaçu Rua São Simão 7';

if($mapLat =='' && $mapLong ==''){
    // Get lat long from google
    $latlong    =   get_lat_long($address); // create a function with the name "get_lat_long" given as below
    //get_lat_long($address);
    echo json_encode($latlong);
}    
