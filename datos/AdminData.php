<?php
class AdminData{
function __construct() {
        
 }
    
function getAllAdmin(){
//$response = file_get_contents('http://example.com/path/to/api/call?param1=5'); si hubieran parametros 
$response = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/administrator/read.php');
$adminsArray = json_decode($response,true);
return $adminsArray;
}
}
?>