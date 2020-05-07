<?php 

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');


  //Obtengo los valores de la interfaz
  $parameters = isset($_GET['parameters']) ? $_GET['parameters'] : die();
  //$parameters = "2-17-15-50000";

  $parametrosArray = explode("-", $parameters);

  $A = 0;

  $B = 0;
 
  $C = 0;

  $D = 0;

  $cantidadPersonas = 0;

  $tipoViaje = 0;

  $tipoViajero = 0;

  $precioEsperado = 0;


  $p1 = $parametrosArray[0]; //cantidad personas 

  $p2 = $parametrosArray[1]; //tipo viaje

  $p3 = $parametrosArray[2]; //tipo viajero

  $p4 = $parametrosArray[3]; //precio esperado


  if($p1 != "Cualquiera"){

    $A = 1;

    $cantidadPersonas = $p1;

  }

  if($p2 != "Cualquiera"){

    $B = 1;

    $tipoViaje = $p2;

  }

  if($p3 != "Cualquiera"){

    $C = 1;

    $tipoViajero = $p3;

  }

  if($p4 != "Cualquiera"){

    $D = 1;

    $precioEsperado = getCostValue($p4);

  }


  $server_url = "https://loaiza4ever.000webhostapp.com";

  $json = file_get_contents($server_url.'/TravellersApi/api/travelPackage/read.php');

  $jsonArray = json_decode($json, true);


/* Variables de control */ 
$precioEsperadoValues = array(
  "Relajado" => 1,
  "Deportista" => 2,
  "Aventurero" => 3
);


$touristTypeValues = array(
  "Relajado" => 1,
  "Deportista" => 10,
  "Aventurero" => 15
);

$travelTypeValues = array(
  "Playa" => 1,
  "Isla" => 3,
  "Playa y Montana" => 5,
  "Montana" => 9,
  "Ciudad" => 17
);

$similarPackagesArray = array();

//Recorro todos los registros de la BD
$jsonSize = count($jsonArray);

$cantidadPaquetesMostrar = 4;

if($A == 0 && $B == 0 && $C == 0 && $D == 0){$cantidadPaquetesMostrar = $jsonSize;}

for($k = 0; $k<$cantidadPaquetesMostrar; $k++){

  $distanciaMinima = 100000;

  $tituloPaquete;

  for($i = 0; $i<$jsonSize; $i++) {
    
    $obj = $jsonArray[$i];

    $numberOfPersons = $obj['numberOfPersons'];

    $travelType = $travelTypeValues[$obj['travelType']];

    $touristType = $touristTypeValues[$obj['touristType']];

    $cost = getCostValue($obj['cost']);

    $packageTitle = $obj['name'];

    //Aplico la formula de auclides a partir de los criterior a evaluar
    $dist = 
    sqrt( 
      pow(($numberOfPersons-$cantidadPersonas), 2) * $A + 
      pow(($travelType-$tipoViaje), 2) * $B + 
      pow(($touristType-$tipoViajero), 2) * $C +
      pow(($cost-$precioEsperado), 2) * $D
  );

    if($dist<$distanciaMinima){

      $distanciaMinima = $dist;

      $indiceToDelete = $i;

    }//if
    

  }//fin del for

  array_push($similarPackagesArray, $jsonArray[$indiceToDelete]);

  unset($jsonArray[$indiceToDelete]);

  $jsonArray = array_values($jsonArray);

  $jsonSize--;

}// while

echo(json_encode($similarPackagesArray));



function getCostValue($cost){

  if($cost==10000){
    return 1;
  }else if($cost==20000){
      return 2;
  }else if($cost==30000){
      return 3;
  }else if($cost==50000){
      return 5;
  }else if($cost==80000){
      return 8;
  }else if($cost==90000){
      return 9;
  }else if($cost==100000){
      return 10;
  }else if($cost==120000){
      return 12;
  }else if($cost==200000){
      return 20;
  }else{
      return 100;
  }

}