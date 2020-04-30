<?php
class TravelPackageData{
function __construct() {

 }

function getAllTravelPackage(){
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}



function getAllTravelPackageByID($id ){
$uri="https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/read_single.php?idTravelPackage=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}

}
?>