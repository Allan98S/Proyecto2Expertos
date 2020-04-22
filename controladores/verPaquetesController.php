<?php

require_once("../datos/TravelPackageData.php");
$travelPackageData=new TravelPackageData();
$listaPaquetes=$travelPackageData->getAllTravelPackage();

require_once("../vistas/gestionarPaquetes.php");



?>