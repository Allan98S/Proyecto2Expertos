<?php 




    //Obtengo los valores de la interfaz
    $idDestininy= isset($_GET['idTourinstDestiny']) ? $_GET['idTourinstDestiny'] : die();
    //$idDestininy = "7";

    $uri="http://localhost/TravellersApi/api/touristDestination/read_single.php?idtouristdestination=".$idDestininy;
     
    $json = file_get_contents($uri);

    $jsonArray = json_decode($json, true);
    
    echo(json_encode($jsonArray));

?>


