
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

require_once("../datos/UsuarioData.php");
$usuarioData=new UsuarioData();
$id=$_GET["idUser"];
$usuarioSeleccionado=$usuarioData->getUserByID($id);


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
<div>
                <h2 style="text-align:center">Detalle del usuario</h2>

                <div>
                    <hr />
                    <dl class="dl-horizontal">
                        <dt>
                            <label class="control-label col-sm-12" >Id</label>
                        </dt>

                        <dd>
                           <?php echo $usuarioSeleccionado['idUser']?>
                        </dd>                  
                        <dt>
                            <label class="control-label col-sm-12">Nombre</label>
                        </dt>

                        <dd>
                        <?php echo $usuarioSeleccionado['name']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12" >Apellidos</label>
                        </dt>

                        <dd>
                        <?php echo $usuarioSeleccionado['lastName']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12" >Correo electr&oacute;nico</label>
                        </dt>

                        <dd>
                        <?php echo $usuarioSeleccionado['email']?>

                        </dd>
                        <dt>
                            <label class="control-label col-sm-12">Tel&eacute;fono</label>
                        </dt>

                        <dd>
                        <?php echo $usuarioSeleccionado['phone']?>
                        </dd>                        
                        <dt>
                            <label class="control-label col-sm-12">Nombre de usuario</label>
                        </dt>
                        <dd>
                        <?php echo $usuarioSeleccionado['userName']?>
                        </dd>

                        <dt>
                            <label class="control-label col-sm-12">Contrase&ntilde;a</label>
                        </dt>
                        <dd>
                        <?php echo $usuarioSeleccionado['password']?>
                        </dd>
                       

               
</div>         
   
</div>

                <a href="../vistas/gestionarUsuarios.php">Atr&aacute;s</a>
 </body>
</html>