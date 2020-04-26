<?php 

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');


    //Obtengo los valores de la interfaz
    $destinyID = isset($_GET['destinyID']) ? $_GET['destinyID'] : die();
    //$destinyID = "1";

    $server_url = "https://loaiza4ever.000webhostapp.com";

    $json = file_get_contents($server_url.'/TravellersApi/api/imageURL/read.php');

    $jsonArray = json_decode($json, true);

    $jsonSize = count($jsonArray);

    $packageTravelDestinies = array();

    for($i = 0; $i<$jsonSize; $i++) {

        $obj = $jsonArray[$i];

        $idTouristDestination = $obj['idTouristDestination'];

        if($idTouristDestination == $destinyID){

            array_push($packageTravelDestinies, $obj);

        }


    }//fin del for


    echo(json_encode($packageTravelDestinies));

