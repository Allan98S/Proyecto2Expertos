<?php
class TravelPackageData{
	protected $conexion_db;

function __construct() {

 }

function getAllTravelPackage(){
//$response = file_get_contents('http://example.com/path/to/api/call?param1=5'); si hubieran parametros 
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}



function getAllTravelPackageByID($id ){
    //$response = file_get_contents('http://example.com/path/to/api/call?param1=5'); si hubieran parametros 
$uri="https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/read_single.php?idTravelPackage=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}
function borrarTravelPackage($idTravelPackage){
//$response = file_get_contents('http://example.com/path/to/api/call?param1=5'); si hubieran parametros 
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/delete.php?idTravelPackage='.$idTravelPackage);
$response = json_decode($response,true);
return $response;	
}
function updateTravelPackage($id,$nombre,$hotel,$aeropuerto,$descripcion,$fechaInicio,$fechaFin,$duracion,
$tipoRuta,$numeroPersonas,$tipoViaje){
    $response['idTravelPackage'] = $id;
	$response['name'] = $nombre;
	$response['idAirport'] = $aeropuerto;
	$response['response_desc'] = $response_desc;
	
	$json_response = json_encode($response);
	echo $json_response;
}
}
?>