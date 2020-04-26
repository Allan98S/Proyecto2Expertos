<?php
class AirportData{
function __construct() {
        
 }
    
function getAllAirport(){
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/airport/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}

function getAllAiportByID($id ){
$uri="https://loaiza4ever.000webhostapp.com/TravellersApi/api/airport/read_single.php?idAirport=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}
}
?>