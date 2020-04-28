<?php
require_once("../datos/TouristDestinationData.php");
$touristDestinationData=new TouristDestinationData();
$listaDestinos=$touristDestinationData->getAllTouristDestination();

require_once("../vistas/gestionarDestinos.php");



?>