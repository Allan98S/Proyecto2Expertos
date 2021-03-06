<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
        <title>Welcome</title>
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/tables.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    #boton{
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #FF0000;
    border: 0;
    padding: 15px;
    color: FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;  
    display: block;
    margin: 0 auto;
    
}
</style>
	</head>
    <?php
session_start();

require_once("../datos/TravelPackageData.php");
require_once("../datos/AirportData.php");
require_once("../datos/HotelData.php");
require_once("../datos/TouristCompany.php");
$travelPackageData=new TravelPackageData();
$hotelData=new HotelData();
$airportData=new AirportData();
$touristCompany=new TouristCompany();
$id=$_GET["idTravelPackage"];
$paqueteSeleccionado=$travelPackageData->getAllTravelPackageByID($id);
$hotelPaquete=$hotelData->getAllHotelByID($paqueteSeleccionado['idHotel']);
$aeropuertoPaquete=$airportData->getAllAiportByID($paqueteSeleccionado['idAirport']);
$touristCompanyPaquete=$touristCompany->getAllTouristCompanyByID($paqueteSeleccionado['idTouristCompany']);
$listaHoteles=$hotelData->getAllHotel();
$listaAeropuertos=$airportData->getAllAirport();
$listaTouristCompany=$touristCompany->getAllTouristCompany();



?>
	<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">World Travelers</a>
    </div>
    <ul class="nav navbar-nav">
    
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Paquetes Tur&iacute;sticos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/Proyecto2Expertos/vistas/gestionarPaquetes.php">Gestionar Paquetes</a></li>
          <li><a href="/Proyecto2Expertos/vistas/crearPaquete.php">Agregar Paquetes</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Destinos Tur&iacute;sticos<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/Proyecto2Expertos/vistas/gestionarDestinos.php">Gestionar Destinos Tur&iacute;sticos</a></li>
        <li><a href="/Proyecto2Expertos/vistas/crearDestino.php">Agregar Destino Tur&iacute;stico</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/Proyecto2Expertos/vistas/gestionarUsuarios.php">Gestionar Usuarios</a></li>
        <li><a href="/Proyecto2Expertos/vistas/crearUsuario.php">Agregar Usuario</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuario"]?></a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
</nav>
    <form id="formBorrar" action="../controladores/borrarPaqueteController.php" method="post">
    <div>
    <input type="hidden" name="idTravelPackage" id="idTravelPackage" value="<?php echo $paqueteSeleccionado['idTravelPackage'] ?>">

                <h2 style="text-align:center"> Paquete Tur&iacute;stico por borrar</h2>

                <div>
                    <hr />
                    <dl class="dl-horizontal">
                        <dt>
                            <label class="control-label col-sm-12" >Id</label>
                        </dt>

                        <dd>
                           <?php echo $paqueteSeleccionado['idTravelPackage']?>
                        </dd>                  
                        <dt>
                            <label class="control-label col-sm-12">Nombre</label>
                        </dt>

                        <dd>
                        <?php echo $paqueteSeleccionado['name']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12" >Fecha de inicio</label>
                        </dt>

                        <dd>
                        <?php echo $paqueteSeleccionado['startDate']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12" >Fecha fin</label>
                        </dt>

                        <dd>
                        <?php echo $paqueteSeleccionado['endDate']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12">Duraci&oacute;n</label>
                        </dt>

                        <dd>
                        <?php echo $paqueteSeleccionado['duration']?>

                        </dd>

                          <dt>
                            <label class="control-label col-sm-12">Descripci&oacute;n</label>
                        </dt>

                       
                </div>
               

                </div>
                <input type="submit" name="boton" id="boton" value="Eliminar">
            </form>
            <a href="../vistas/gestionarPaquetes.php"><button  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>
 </body>

    </body>
</html>