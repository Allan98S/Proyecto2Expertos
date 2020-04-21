<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');



  //Obtengo los valores de la interfaz
  $parameters = isset($_GET['parameters']) ? $_GET['parameters'] : die();

  $parametrosArray = explode("-", $parameters);

  $p1 = $parametrosArray[0]; //cantidad personas 

  $p2 = $parametrosArray[1]; //tipo viaje

  $p3 = $parametrosArray[2]; //tipo viajero

  $p4 = $parametrosArray[3]; //precio esperado

  $json = file_get_contents('https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/read.php');

  $jsonArray = json_decode($json);


/* Variables de control */ 

//Esta sera la distancia que se utilizara para determinar el estilo de aprendizaje, 
//la inicializo en 10000, sin embargo ese numero no tiene relevancia, es solo para 
//inicializar la variable para evitar errores de logica mas adelante.
$distanciaMinima = 10000;

$estiloProfesor;

//Recorro todos los registros de la BD
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    //las variables que estan entre los parentesis cuadrados, son el valor de la columna del 
    //registro actual, y a partir del diccionario, le doy un valor cuantitativo y lo almaceno
    //en una variable que sera utilizada mas adelante para aplicar la formula de euclides

    $age_BD = $A;

    $gender_BD = $sexDictionary[$B];

    $selfEvaluation_BD = $selfEvaluationDictionary[$C];

    $timesTaughtThisCourse_BD = $D;

    $discipline_BD = $disciplineDictionary[$E];

    $skillsUsingComputers_BD = $skillsUsingComputersDictionary[$F];

    $teachingUsingWebTechnology_BD = $teachingUsingWebTechnologyDictionary[$G];

    $experienceUsingWebSite_BD = $experienceUsingWebSiteDictionary[$H];

    //Aplico la formula de auclides a partir de los criterior a evaluar
    $dist = 
        sqrt( 
        pow(($ageInterfaz-$age_BD), 2) + 
        pow(($sexoInterfaz-$gender_BD), 2) + 
        pow(($selfEvaluationInterfaz-$selfEvaluation_BD), 2) +
        pow(($timesTaughtThisCourseInterfaz-$timesTaughtThisCourse_BD), 2) + 
        pow(($disciplineInterfaz-$discipline_BD), 2) + 
        pow(($skillsUsingComputersInterfaz-$skillsUsingComputers_BD), 2) +
        pow(($teachingUsingWebTechnologyInterfaz-$teachingUsingWebTechnology_BD), 2) + 
        pow(($experienceUsingWebSiteInterfaz-$experienceUsingWebSite_BD), 2)
        );


        //si la distancia que obtuve al aplicar la formula de euclides con el registro actual
        //en conjunto con los valores que obtuve de la interfaz son menores a la distancia minima,
        //significa que que el registro actual es muy similar con los datos recibidos de la interfaz
        //y se guardaran los datos que se deseen saber del registro para retornarlos al usuario
        if($dist<$distanciaMinima){

        $distanciaMinima = $dist;

        $estiloProfesor = $Class;

        }

}

//creo un array con los datos de interes por el usuario
$item = array(
    'DistanciaMinima' => $distanciaMinima,
    'EstiloProfesor' => $estiloProfesor
);

//convierto en json al array y lo retorno
echo json_encode($item);


