<?php
$idUser=$_POST["idUser"];
$nombre=$_POST["nombre"];
$lastName=$_POST["lastName"];
$email=$_POST["email"];
$telefono=$_POST["telefono"];
$password=$_POST["password"];
$userName=$_POST["userName"];

 $url = 'http://localhost/TravellersApi/api/user/update.php';
$ch = curl_init($url);
 $data = array(
 'idUser' => $idUser, 
 'name' => $nombre,
 'userName' => $userName, 
 'password' => $password,
 'lastName'=>$lastName,
 'phone' => $telefono,
 'email' => $email



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