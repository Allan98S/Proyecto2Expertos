<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body> 
<?php
session_start();
if(!isset($_SESSION["usuario"])){//si session  es nullo
  header("Location:/vistas/loginAdministrativo.php");
}
?>
<h1>Bienvenidos usuarios</h1>
<?php
echo "Hola:" .  $_SESSION["usuario"]. "<br><br>";
?>
<p>Esto es informaci&oacute;n solo para usuarios registrados</p>

<a href="/Proyecto2Expertos/controladores/cerrarSesionAdmin.php">Cerrar Sesi&oacute;n</a>
</body>

</html>