<?php
class TouristCompany{
function __construct() {
        
 }
    
function getAllTouristCompany(){
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/touristCompany/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}

function getAllTouristCompanyByID($id){
$uri="https://loaiza4ever.000webhostapp.com/TravellersApi/api/touristCompany/read_single.php?idTouristCompany=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}
}
?>