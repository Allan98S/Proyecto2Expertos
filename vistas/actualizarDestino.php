

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
$(document).ready(function(){
  $("#imagenAModificar").hide();
  $("#labelImagenModificar").hide();
  $("#botonModificar").hide();
  $("#labelElementosModificados").hide();
  $("#elementosModificados").hide();
  var array=[];
  var selectedImage="";
  var imagenURL="";
$("#imagenes").change(function(){

     selectedImage = $(this).children("option:selected").val();
     imagenURL = selectedImage.split(",", 1);
    $("#botonModificar").show();
    $("#labelImagenModificar").show();
    $("#imagenAModificar").show();
    $("#imagenAModificar").val(imagenURL);
});
$("#botonModificar").click(function(){
      var idImagenURL=getIDImagenURL(selectedImage);
      var nuevoValor=idImagenURL+","+$("#imagenAModificar").val();
      array.push(nuevoValor);
      $("#imagenesModificadas").val(array);
      var salida=imagenURL+"--->"+$("#imagenAModificar").val();
      $("#imagenAModificar").val("");
      $("#labelElementosModificados").show();
      $("#elementosModificados").show();
      $("#elementosModificados").append(' <li id="lista" name="lista" class="list-group-item">'+salida+'</li>');
     
    });
 function getIDImagenURL(selectedImage){
   var salida="";
   for (var i = 0; i< selectedImage.length; i++) {
    var caracter = selectedImage.charAt(i);
    if(caracter==","){
      salida= selectedImage.charAt(i+2)+selectedImage.charAt(i+3);
    }
  }
  return salida;
 }

});
</script>


  
	</head>
<?php
session_start();

require_once("../datos/TravelPackageData.php");
require_once("../datos/TouristDestinationData.php");
require_once("../datos/ImagenURLData.php");
$touristDestinationData=new TouristDestinationData();
$travelPackageData=new TravelPackageData();
$imagenURLData=new ImagenURLData();
$id=$_GET["idtouristdestination"];
$destinoSeleccionado=$touristDestinationData->getAllTouristDestinationById($id);
$paqueteDestino=$travelPackageData->getAllTravelPackageByID($destinoSeleccionado['idTravelPackage']);
$listaPaquetes=$travelPackageData->getAllTravelPackage();
$listaImagenesDestino=$imagenURLData->getAllImageURLByIDTouristDestination($destinoSeleccionado['idtouristdestination']);




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

<form id="formEditar" name="formEditar" action="../controladores/actualizarDestinoController.php" method="post">
<h2 style="text-align:center">Actualizar paquete tur&iacute;stico</h2>
<input type="hidden" name="idTouristDestination" id="idTouristDestination" value="<?php echo $destinoSeleccionado['idtouristdestination'] ?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $destinoSeleccionado['name'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Paquete Tur&iacute;stico</label>
    <select class="form-control" id="paquete" name="paquete" value="<?php echo $paqueteDestino['idTravelPackage'] ?>">
    <option value="<?php echo $paqueteDestino['idTravelPackage'] ?>"><?php echo $paqueteDestino['name'] ?></option>
    <?php foreach($listaPaquetes  as $paquete):?>
    <option value="<?php  echo $paquete['idTravelPackage'] ?>"><?php echo $paquete['name']  ?></option>
   
    <?php
    endforeach;
    ?>
     </select>
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripci&oacute;n</label>
    <input type="text" id="descripcion" name="descripcion"  class="form-control" id="descripcion" value="<?php echo $destinoSeleccionado['description'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Direcci&oacute;n</label>
    <input type="text"  class="form-control" id="address" name="address" value="<?php echo $destinoSeleccionado['address'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"> Oprima el bot&oacute;n para editar im&aacute;genes</label>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Editar Im&aacute;genes
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Im&aacute;genes del destino</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for="exampleFormControlSelect1">Im&aacute;genes actuales</label>
    <select class="form-control" id="imagenes" name="imagenes">
    
    <?php foreach($listaImagenesDestino  as $imagen):?>
    <option value="<?php  echo $imagen['imageURL'] ;echo ' , '. $imagen['idImageTouristDestination'] ?>".><?php echo $imagen['imageURL']  ?></option>
   
    <?php
    endforeach;
    ?>
     </select>
     <label for="exampleFormControlTextarea1" name="labelImagenModificar" id="labelImagenModificar"> Imagen a modificar</label>
     <input type="text"   class="form-control" id="imagenAModificar" name="imagenAModificar">
     <button type="button" name="botonModificar" id="botonModificar" >Modificar</button>
     <br>
     <label for="exampleFormControlTextarea1" name="labelElementosModificados" id="labelElementosModificados"> Im&aacute;genes modificadas</label>
     <ul id="elementosModificados" name="elementosModificados" class="list-group">
     </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Terminar</button>
      
      </div>
    </div>
  </div>
</div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">V&iacute;deo URL</label>
    <input type="text"  class="form-control" id="videoURL" name="videoURL" value="<?php echo $destinoSeleccionado['videoURL'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Latitud</label>
    <input type="text" class="form-control" id="latitud" name="latitud" value="<?php echo $destinoSeleccionado['latitud'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Longitud</label>
    <input type="text" class="form-control"  id="longitud" name="longitud" value="<?php echo $destinoSeleccionado['longitud'] ?>">
  </div>
  </div>
  <input type="hidden" id="imagenesModificadas" name="imagenesModificadas">
  <input type="submit" name="boton" id="boton" value="Actualizar">

</form>
<p></p>
   
<a href="../vistas/gestionarPaquetes.php"><button  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>

 </body>
</html>