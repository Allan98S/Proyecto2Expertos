

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
    background: #45b9d6;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
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

$listaHoteles=$hotelData->getAllHotel();
$listaAeropuertos=$airportData->getAllAirport();
$listaTouristCompany=$touristCompany->getAllTouristCompany();



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
        <li><a href="#">Gestionar Paquetes</a></li>
        <li><a href="#">Agregar Paquetes</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuario"]?></a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
</nav>

<form id="formCreate" name="formCreate" action="../controladores/insertarPaqueteController.php" method="post">
<h2 style="text-align:center">Registar paquete tur&iacute;stico</h2>
<input type="hidden" name="idTravelPackage" id="idTravelPackage" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Hotel</label>
    <select class="form-control" id="hotel" name="hotel" >
    <?php foreach($listaHoteles  as $hotel):?>
    <option value="<?php  echo $hotel['idHotel'] ?>"><?php echo $hotel['name']  ?></option>
   
    <?php
    endforeach;
    ?>
     </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Compa&ntilde;&iacute;a Tur&iacute;stica</label>
    <select class="form-control" id="companiaTuristica" name="companiaTuristica" >
    <?php foreach($listaTouristCompany  as $compania):?>
      <option value="<?php echo $compania['idTouristCompany'] ?>"><?php echo $compania['name']  ?></option>
   
    <?php
    endforeach;
    ?>
     </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Aeropuerto</label>
    <select class="form-control" id="aeropuerto" name="aeropuerto" >
    <?php foreach($listaAeropuertos  as $aeropuerto):?>
      <option value="<?php echo $aeropuerto['idAirport'] ?>"><?php echo $aeropuerto['name']  ?></option>
   
    <?php
    endforeach;
    ?>
     </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripci&oacute;n</label>
    <input type="text" id="descripcion" name="descripcion"  class="form-control" id="descripcion">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Fecha de inicio</label>
    <input type="date"  class="form-control" id="fechaInicio" name="fechaInicio" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Fecha de finalizaci&oacute;n</label>
    <input type="date"  class="form-control" id="fechaFin" name="fechaFin" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Duraci&oacute;n</label>
    <input type="text" class="form-control" id="duracion" name="duracion" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo de ruta</label>
    <input type="text" class="form-control"  id="tipoRuta" name="tipoRuta" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo de tur&iacute;sta</label>
    <input type="text" class="form-control" id="tipoTurista" name="tipoTurista"  >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">N&uacute;mero de personas</label>
    <input type="text" class="form-control" id="numeroPersonas" name="numeroPersonas">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Costo del paquete</label>
    <input type="text" class="form-control" id="cost" name="cost" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo de viaje</label>
    <input type="text" class="form-control" id="tipoViaje" name="tipoViaje">
  </div>
  <input type="submit" name="boton" id="boton" value="Actualizar">

</form>
<p></p>
   
<a href="../vistas/gestionarPaquetes.php"><button  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>

 </body>
</html>