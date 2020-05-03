<?php
class ReservationData{
function __construct() {

 }

function getAllReservations(){
$response = file_get_contents('http://localhost/TravellersApi/api/reservationPackage/read.php');
$reservationArray = json_decode($response,true);
return $reservationArray;
}



function getResevationByID($id ){
$uri="http://localhost/TravellersApi/api/reservationPackage/read_single.php?idReservacionPaquete=".$id;
$response = file_get_contents($uri);
$reservationArray = json_decode($response,true);
return $reservationArray;
}

}
?>