<?php
$idUser=$_POST["idUser"];




 $url = 'http://localhost/TravellersApi/api/user/delete.php';
$ch = curl_init($url);
 $data = array(
 'idUser' => $idUser

);
 
 // use key 'http' even if you send the request to https://...
    $payload = json_encode( $data);

    // Attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    
    // Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    // Return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Execute the POST request
    $result = curl_exec($ch);
    
    // Close cURL resource
    curl_close($ch);

    header("location:/Proyecto2Expertos/vistas/gestionarUsuarios.php");

?>