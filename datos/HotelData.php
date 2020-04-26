<?php
class HotelData{
function __construct() {
        
 }
    
function getAllHotel(){
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/hotel/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}

function getAllHotelByID($id ){
$uri="https://loaiza4ever.000webhostapp.com/TravellersApi/api/hotel/read_single.php?idHotel=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}
}
?>