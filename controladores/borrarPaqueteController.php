<?php
require_once("../datos/TravelPackageData.php");
$travelPackageData=new TravelPackageData();
$idTravelPackage=$_POST["idTravelPackage"];
$listaPaquetes=$travelPackageData->borrarTravelPackage($idTravelPackage);

require_once("../vistas/gestionarPaquetes.php");

?>