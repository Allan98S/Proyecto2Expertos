<?php 

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');


    //Obtengo los valores de la interfaz
    $packageID = isset($_GET['packageID']) ? $_GET['packageID'] : die();
    //$packageID = "6";

    $server_url = "https://loaiza4ever.000webhostapp.com";

    $json = file_get_contents($server_url.'/TravellersApi/api/touristDestination/read.php');

    $jsonArray = json_decode($json, true);

    $jsonSize = count($jsonArray);

    $packageTravelDestinies = array();

    for($i = 0; $i<$jsonSize; $i++) {

        $obj = $jsonArray[$i];

        $idTravelPackage = $obj['idTravelPackage'];

        if($idTravelPackage == $packageID){

            array_push($packageTravelDestinies, $obj);

        }


    }//fin del for


    echo(json_encode($packageTravelDestinies));


