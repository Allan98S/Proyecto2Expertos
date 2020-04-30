
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

require_once("../datos/TouristDestinationData.php");
require_once("../datos/ImagenURLData.php");
$touristDestinationData=new TouristDestinationData();
$imagenURLData=new ImagenURLData();
$id=$_GET["idtouristdestination"];
$destinoSeleccionado=$touristDestinationData->getAllTouristDestinationById($id);
$listaImagenesPaquete=$imagenURLData->getAllImageURLByIDTouristDestination($destinoSeleccionado['idtouristdestination']);



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
          <li><a href="/Proyecto2Expertos/vistas/cearPaquete.php">Agregar Paquetes</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Destinos Tur&iacute;sticos<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/Proyecto2Expertos/vistas/gestionarDestinos.php">Gestionar Destino </a></li>
          <li><a href="/Proyecto2Expertos/vistas/crearDestino.php">Agregar Destino</a></li>
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
                <h2 style="text-align:center">Detalle del destino tur&iacute;stico</h2>

                <div>
                    <hr />
                    <dl class="dl-horizontal">
                        <dt>
                            <label class="control-label col-sm-12" >Id</label>
                        </dt>

                        <dd>
                           <?php echo $destinoSeleccionado['idtouristdestination']?>
                        </dd>                  
                        <dt>
                            <label class="control-label col-sm-12">Nombre</label>
                        </dt>

                        <dd>
                        <?php echo $destinoSeleccionado['name']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12" >Direcci&oacute;n</label>
                        </dt>

                        <dd>
                        <?php echo $destinoSeleccionado['address']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12" >Descripci&oacute;n</label>
                        </dt>

                        <dd>
                        <?php echo $destinoSeleccionado['description']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12">Longitud geogr&aacute;fica</label>
                        </dt>

                        <dd>
                        <?php echo $destinoSeleccionado['longitud']?>

                        </dd>

                          <dt>
                            <label class="control-label col-sm-12">Latitud geogr&aacute;fica</label>
                        </dt>

                        <dd>
                        <?php echo $destinoSeleccionado['latitud']?>
                        <dt>
                            <label class="control-label col-sm-12">Im&aacute;genes del  destino</label>
                        </dt>

                        <dd>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Ver im&aacute;genes
                        </button>
                        

                        </dd>
                       
                    </dl>
                </div>
                <p>
                
                </p>

                </div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Im&aacute;genes del destino <?php echo $destinoSeleccionado['name']?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="customers" align="center">
  <tr>
    <th>ID</th>
    <th>Im&aacute;gen</th>
  </tr>
  <?php
     foreach($listaImagenesPaquete  as $imagen):?> 
    <tr>
    <td id="idDestino" name="idDestino"><?php echo $imagen['idImageTouristDestination']  ?></td>
    <td> <img id="image" src="<?php echo $imagen['imageURL']  ?>" width="100% " height="100% " alt="Image " /></td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
                <a href="../vistas/gestionarDestinos.php">Atr&aacute;s</a>
 </body>
</html>