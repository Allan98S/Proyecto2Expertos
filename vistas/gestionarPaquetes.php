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

	<body>



  <?php
session_start();
require_once("../controladores/verPaquetesController.php");

if(!isset($_SESSION["usuario"])){//si session  es nullo
  header("Location:/vistas/loginAdministrativo.php");
}
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
<h1 style="text-align:center"> Paquetes actuales en el sistema</h1>
<br><br>
    <table id="customers" align="center">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Costo</th>
    <th>Duraci&oacute;n</th>
    <th></th>
    <th></th>
    <th></th>

  </tr>
  <?php
     foreach($listaPaquetes  as $paquete):?> 
    <tr>
    <td id="idPaquete" name="idPaquete"><?php echo $paquete['idTravelPackage']  ?></td>
    <td><?php echo $paquete['name']  ?></td>
    <td><?php echo $paquete['cost']  ?></td>
    <td><?php echo $paquete['duration']  ?></td>
    <td class="bot"><a href="consultarPaquete.php?id=<?php echo $paquete['idTravelPackage'] ?>"><input type='button' name='consultar' id='consultar' value='Consultar'></a></td>
    <td class="bot"><a href="actualizarPaquete.php?id=<?php echo $paquete['idTravelPackage'] ?>"><input type='button' name='actualizar' id='actualizar' value='Actualizar'></a></td>
    <td class="bot"><a href="eliminarPaquete.php?id=<?php echo $paquete['idTravelPackage'] ?>"><input type='button' name='eliminar' id='eliminar' value='Eliminar'></a></td>




    
    </tr>
    <?php
    endforeach;
    ?>
</table>



	</body>
</html>