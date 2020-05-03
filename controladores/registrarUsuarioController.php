<?php

$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$userName=$_POST["usuario"];
$password=$_POST["password"];

$url = 'http://localhost/TravellersApi/api/user/register.php';
$ch = curl_init($url);
 $data = array(
 'idUser' =>0, 
 'name' => $nombre,
 'userName' => $userName, 
 'password' => $password,
 'lastName'=>$apellidos,
 'email' => $correo,
 'phone' => $telefono
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
    $jsonIDCliente = json_decode($result,true);
    $idCliente=$jsonIDCliente['message'];

    $uri="http://localhost/TravellersApi/api/user/read_single.php?idUser=".$idCliente;
    $response = file_get_contents($uri);
    $clienteArray = json_decode($response,true);
    session_start();
    $_SESSION["usuarioCliente"]=$clienteArray['userName'];
// TODO : crear procedure para devolver usaurio registrado,  hacer un get por ese idUSuario, y mandar ese usuario
// a indexLogueado con sessionStart

    header("location:../vistas/indexLogueado.php");

?>