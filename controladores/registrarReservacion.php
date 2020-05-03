<?php
$idTravelPackage=$_GET["packageID"];
$idUser=$_GET["idUser"];
$fechaActual=  date("Y-m-d");
$url = 'http://localhost:80/TravellersApi/api/reservationPackage/register.php';
$ch = curl_init($url);
 $data = array(
 'idReservacionPaquete' =>0, 
 'idUser' => $idUser,
 'idTrip' => $idTravelPackage, 
 'reservationDate' => $fechaActual

);
 
 // use key 'http' even if you send the request to https://...
    $payload = json_encode( $data);

    // Attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    
    // Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    // Return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Retorna el ID del destino para insertar las imagenes 
    $post = curl_exec($ch);
    
    // Close cURL resource
    curl_close($ch);
    $jsonIDReservation = json_decode($post,true);
    $idReservation=$jsonIDReservation['message'];
    // se insertan las imagenes que ingreso el usuario
  $rutaRedirigir="location:/Proyecto2Expertos/vistas/detalleReservacion.php?idReservation=".$idReservation;
 header($rutaRedirigir);

?>




