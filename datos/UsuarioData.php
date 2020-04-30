<?php
class UsuarioData{
function __construct() {

 }

function getAllUsers(){
$response = file_get_contents('http://localhost/TravellersApi/api/user/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}



function getUserByID($id ){
$uri="http://localhost/TravellersApi/api/user/read_single.php?idUser=".$id;
$response = file_get_contents($uri);
$adminsArray = json_decode($response,true);
return $adminsArray;
}

}
?>