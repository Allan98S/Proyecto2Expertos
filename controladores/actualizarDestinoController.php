<?php
$idTouristDestination=$_POST["idTouristDestination"];
$nombre=$_POST["nombre"];
$direccion=$_POST["address"];
$longitud=$_POST["longitud"];
$latitud=$_POST["latitud"];
$description=$_POST["descripcion"];
$imagenes=$_POST["imagenesModificadas"];
$videoURL=$_POST["videoURL"];
$paquete=$_POST["paquete"];
$arrayImagenes=explode(",",$imagenes);
$length=count($arrayImagenes);



// TODO : Agregar poder seleccoinar el travel package al que va a pertenecer el destino, Recuperar el 
// ID del tourist destination para poder insertar las imagenes
//insertamos el destino turistico
$url = 'http://localhost:80/TravellersApi/api/touristDestination/update.php';
$ch = curl_init($url);
 $data = array(
 'idtouristdestination' =>$idTouristDestination, 
 'name' => $nombre,
 'address' => $direccion, 
 'description' => $description,
 'latitud' => $latitud,
 'longitud' => $longitud,
 'videoURL' => $videoURL,
 'idTravelPackage' => $paquete
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
    $jsonIDDestino = json_decode($post,true);
    $idDestino=$jsonIDDestino['message'];
    // se insertan las imagenes que ingreso el usuario
    for ($i = 0; $i < $length-1; $i+=2) {
   $url = 'http://localhost:80/TravellersApi/api/imageURL/update.php';
   $ch = curl_init($url);
   $data = array(
  'idImageTouristDestination' => $arrayImagenes[$i], 
  'idTouristDestination' => $idTouristDestination,
  'imageURL' =>   $arrayImagenes[$i+1]
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
 }
 header("location:/Proyecto2Expertos/vistas/gestionarDestinos.php");

?>