
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

<form id="formCreate" name="formCreate" action="../controladores/insertarUsuarioController.php" method="post">
<h2 style="text-align:center">Registar Usuario</h2>
<input type="hidden" name="idUser" id="idUser" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Apellidos</label>
    <input type="text" id="apellidos" name="apellidos"  class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Tel&eacute;fono</label>
    <input type="text"  class="form-control" id="telefono" name="telefono" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Correo electr&oacute;nico</label>
    <input type="text"  class="form-control" id="correo" name="correo" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre de usuario</label>
    <input type="text" class="form-control" id="userName" name="userName" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Contrase&ntilde;a</label>
    <input type="text" class="form-control"  id="password" name="password" >
  </div>
  
  <input type="submit" name="boton" id="boton" value="Registrar">

</form>
<p></p>
   
<a href="../vistas/gestionarUsuarios.php"><button  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>

 </body>
</html>