<?php
$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$longitud=$_POST["longitud"];
$latitud=$_POST["latitud"];
$description=$_POST["descripcion"];
$imagenes=$_POST["imagenes"];
$videoURL=$_POST["videoURL"];
$arrayImagenes=explode(",",$imagenes);
$length=count($arrayImagenes);

// TODO : Agregar poder seleccoinar el travel package al que va a pertenecer el destino, Recuperar el 
// ID del tourist destination para poder insertar las imagenes
//insertamos el destino turistico
$url = 'https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/create.php';
$ch = curl_init($url);
 $data = array(
 'idtouristdestination' =>0, 
 'name' => $nombre,
 'address' => $direccion, 
 'description' => $description,
 'idAirport'=>$aeropuerto,
 'description' => $descripcion,
 'latitud' => $latitud,
 'longitud' => $longitud,
 'videoURL' => $videoURL,
 'duration' => $duracion,
 'touristType' => $tipoTurista,
 'numberOfPersons' => $numeroPersonas,
 'travelType' => $tipoViaje,
 'typeOfRoute' => $tipoRuta

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

?>