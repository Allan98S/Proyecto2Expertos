<?php
$nombre=$_POST["nombre"];
$hotel=$_POST["hotel"];
$companiaTuristica=$_POST["companiaTuristica"];
$aeropuerto=$_POST["aeropuerto"];
$descripcion=$_POST["descripcion"];
$cost=$_POST["cost"];
$fechaInicio=$_POST["fechaInicio"];
$fechaFin=$_POST["fechaFin"];
$duracion=$_POST["duracion"];
$tipoTurista=$_POST["tipoTurista"];
$tipoRuta=$_POST["tipoRuta"];
$numeroPersonas=$_POST["numeroPersonas"];
$tipoViaje=$_POST["tipoViaje"];
$tipoRuta=$_POST["tipoRuta"];



$url = 'https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/create.php';
$ch = curl_init($url);
 $data = array(
 'idTravelPackage' =>0, 
 'name' => $nombre,
 'idHotel' => $hotel, 
 'idTouristCompany' => $companiaTuristica,
 'idAirport'=>$aeropuerto,
 'description' => $descripcion,
 'cost' => $cost,
 'startDate' => $fechaInicio,
 'endDate' => $fechaFin,
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

    header("location:/Proyecto2Expertos/vistas/gestionarPaquetes.php");

?>