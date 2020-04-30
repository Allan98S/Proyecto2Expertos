

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

<script>
$(document).ready(function () {
var array=[];
$("#labelImgAgregadas").hide();
$("#lista").hide();
$("#botonAgregar").click(function(){
$("#lista").show();
$("#labelImgAgregadas").show();
var imagen= $("#imagen").val();
$("#lista").append(' <li id="lista" name="lista" class="list-group-item">'+imagen+'</li>');
array.push(imagen);
$("#imagenes").val(array);
$("#imagen").val("");
});

});
</script>



</head>
<?php
session_start();

require_once("../datos/TravelPackageData.php");
require_once("../datos/AirportData.php");
require_once("../datos/HotelData.php");
require_once("../datos/TouristCompany.php");
$travelPackageData=new TravelPackageData();

$listaPaquetes=$travelPackageData->getAllTravelPackage();


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
          <li><a href="/Proyecto2Expertos/vistas/crearPaquete.php">Agregar Paquetes</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Destinos Tur&iacute;sticos<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/Proyecto2Expertos/vistas/gestionarDestinos.php">Gestionar Destinos</a></li>
          <li><a href="/Proyecto2Expertos/vistas/crearDestino.php">Agregar Destinos</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuario"]?></a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
</nav>

<form id="formCreate" name="formCreate" action="../controladores/insertarDestinoController.php"  method="post">
<h2 style="text-align:center">Registar destino tur&iacute;stico</h2>
<input type="hidden" name="idTouristDestination" id="idTouristDestination" >
  
<div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione el paquete tur&iacute;stico al cual asignar el destino</label>
    <select class="form-control" id="paquete" name="paquete" >
    <?php foreach($listaPaquetes  as $paquete):?>
    <option value="<?php  echo $paquete['idTravelPackage'] ?>"><?php echo $paquete['name']  ?></option>
   
    <?php
    endforeach;
    ?>
     </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
  </div>

  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripci&oacute;n</label>
    <input type="text" id="descripcion" name="descripcion"  class="form-control" id="descripcion">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Direcci&oacute;n</label>
    <input type="text" class="form-control" id="direccion" name="direccion" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Longitud Geogr&aacute;fica</label>
    <input type="text" class="form-control" name="longitud"  id="longitud"  >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Latitud Geogr&aacute;fica</label>
    <input type="text" class="form-control"  name="latitud"  id="latitud" >
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlTextarea1">V&iacute;deo URL</label>
    <input type="text" id="descripcion" name="videoURL"  class="form-control" id="videoURL">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1"> Ingrese una o m&aacute;s im&aacute;genes</label>
  </div>
  <div class="form-group">
    
  <input type="text" class="form-control" id="imagen" name="imagen" >
  </div>
  <div>
   
    <button type="button" id="botonAgregar" name="botonAgregar" > Agregar </button>

  </div>
  <div class="form-group">
  <label id="labelImgAgregadas" for="exampleFormControlInput1"> Im&aacute;genes agregadas</label>
  <ul id="lista" name="lista" class="list-group">
  </ul>
  </div>
  <input type="hidden" id="imagenes" name="imagenes">
  <input type="submit" name="boton" id="boton" value="Registrar">

</form>
<p></p>
   
<a href="../vistas/gestionarPaquetes.php"><button  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>

 </body>
</html>