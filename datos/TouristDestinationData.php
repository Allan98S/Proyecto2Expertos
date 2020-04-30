<?php
class TouristDestinationData{
function __construct() {

 }

function getAllTouristDestination(){
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/touristDestination/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}



function getAllTouristDestinationById($id ){
$uri="https://loaiza4ever.000webhostapp.com/TravellersApi/api/touristDestination/read_single.php?idtouristdestination=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}

}
?>