<?php
class TouristDestinationData{
function __construct() {

 }

function getAllTouristDestination(){
$response = file_get_contents('http://localhost/TravellersApi/api/touristDestination/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}



function getAllTouristDestinationById($id ){
$uri="http://localhost/TravellersApi/api/touristDestination/read_single.php?idtouristdestination=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}

}
?>