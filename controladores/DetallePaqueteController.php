<?php 




    //Obtengo los valores de la interfaz
    $packageID = isset($_GET['packageID']) ? $_GET['packageID'] : die();
    //$packageID = "6";

    $server_url = "http://localhost/TravellersApi/api/travelPackage/read_single.php?idTravelPackage=".$packageID;
   
    $json = file_get_contents($server_url);
    $jsonArray = json_decode($json, true);
    echo(json_encode($jsonArray));



?>

