<?php
$idtouristdestination=$_POST["idtouristdestination"];


// Primero se borran las imagenes asociadas al destino
 $url = 'http://localhost:81/TravellersApi/api/imageURL/delete.php';
$ch = curl_init($url);
 $data = array(
 'idtouristdestination' => $idtouristdestination

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

//Luego de borrar las imagenes asociadas al destino, se procede a borrar el destino

$url = 'http://localhost:81/TravellersApi/api/touristDestination/delete.php';
$ch = curl_init($url);
 $data = array(
 'idtouristdestination' => $idtouristdestination

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
    header("location:/Proyecto2Expertos/vistas/gestionarDestinos.php");

?>