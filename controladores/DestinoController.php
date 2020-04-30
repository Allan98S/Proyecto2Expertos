<?php 

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');


    //Obtengo los valores de la interfaz
    $idDestininy = isset($_GET['idTourinstDestiny']) ? $_GET['idTourinstDestiny'] : die();
    //$idDestininy = "7";

    $server_url = "https://loaiza4ever.000webhostapp.com";

    $json = file_get_contents($server_url.'/TravellersApi/api/touristDestination/read.php');

    $jsonArray = json_decode($json, true);

    $jsonSize = count($jsonArray);

    for($i = 0; $i<$jsonSize; $i++) {

        $obj = $jsonArray[$i];

        $idTouristDestination = $obj['idtouristdestination'];

        if($idTouristDestination == $idDestininy){

            echo(json_encode($obj));

        }


    }//fin del for



