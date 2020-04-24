<?php 

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');


  //Obtengo los valores de la interfaz
  $parameters = isset($_GET['parameters']) ? $_GET['parameters'] : die();
  //$parameters = "2-17-15-50000";

  $parametrosArray = explode("-", $parameters);

  $p1 = $parametrosArray[0]; //cantidad personas 

  $p2 = $parametrosArray[1]; //tipo viaje

  $p3 = $parametrosArray[2]; //tipo viajero

  $p4 = getCostValue($parametrosArray[3]); //precio esperado

  $json = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/read.php');

  $jsonArray = json_decode($json, true);


/* Variables de control */ 
$precioEsperadoValues = array(
  "Relajado" => 1,
  "Deportista" => 2,
  "Aventurero" => 3
);


$touristTypeValues = array(
  "Relajado" => 1,
  "Deportista" => 2,
  "Aventurero" => 3
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

while($jsonSize>0){

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
      pow(($numberOfPersons-$p1), 2) + 
      pow(($travelType-$p2), 2) + 
      pow(($touristType-$p3), 2) +
      pow(($cost-$p4), 2)
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

  if($cost<=0){
    return 20;
  }else if($cost<=10000){
    return 1;
  }else if($cost<=20000){
    return 2;
  }else if($cost<=30000){
    return 3;
  }else if($cost<=50000){
    return 5;
  }else if($cost<=80000){
    return 8;
  }else if($cost<=100000){
    return 10;
  }else if($cost<=120000){
    return 12;
  }else if($cost<=200000){
    return 20;
  }else if($cost<=250000){
    return 25;
  }else if($cost<=300000){
    return 30;
  }else{
    return 40;
  }

}



