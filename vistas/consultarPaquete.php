

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

  
	</head>
<?php
session_start();

require_once("../datos/TravelPackageData.php");
require_once("../datos/AirportData.php");
require_once("../datos/HotelData.php");
$travelPackageData=new TravelPackageData();
$hotelData=new HotelData();
$airportData=new AirportData();
$id=$_GET["id"];
$paqueteSeleccionado=$travelPackageData->getAllTravelPackageByID($id);
$hotelPaquete=$hotelData->getAllHotelByID($paqueteSeleccionado['idHotel']);
$aeropuertoPaquete=$airportData->getAllAiportByID($paqueteSeleccionado['idAirport']);



?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">World Travelers</a>
    </div>
    <ul class="nav navbar-nav">
    
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Paquetes Tur&iacute;sticos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/Proyecto2Expertos/vistas/gestionarPaquetes.php">Gestionar Paquetes</a></li>
          <li><a href="#">Agregar Paquetes</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Destinos Tur&iacute;sticos<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/Proyecto2Expertos/vistas/gestionarPaquetes.php">Gestionar Paquetes</a></li>
          <li><a href="/Proyecto2Expertos/vistas/crearPaquete.php">Agregar Paquetes</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuario"]?></a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
</nav>
<div>
                <h2 style="text-align:center">Detalle del paquete tur&iacute;stico</h2>

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

                        <dd>
                        <?php echo $paqueteSeleccionado['description']?>
                        <dt>
                            <label class="control-label col-sm-12">Hotel</label>
                        </dt>

                        <dd>
                        <?php echo $hotelPaquete['name']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12">Aeropuerto</label>
                        </dt>

                        <dd>
                        <?php echo $aeropuertoPaquete['name']?>

                        </dd>
                    </dl>
                </div>
                <p>
                
                </p>

                </div>

                <a href="../vistas/gestionarPaquetes.php">Atr&aacute;s</a>
 </body>
</html>