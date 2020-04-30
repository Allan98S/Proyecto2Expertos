<?php
class ImagenURLData{
function __construct() {

 }

function getAllImageURL(){
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/imageURL/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}

function getAllImageURLByID($id ){
$uri="https://loaiza4ever.000webhostapp.com/TravellersApi/api/imageURL/read_single.php?idImageTouristDestination=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}

function getAllImageURLByIDTouristDestination($id ){
    $uri="http://localhost/TravellersApi/api/imageURL/read_single2.php?idTouristDestination=".$id;
    $response = file_get_contents($uri);
    $adminsArray = json_decode($response,true);
    return $adminsArray;
    }

}
?>