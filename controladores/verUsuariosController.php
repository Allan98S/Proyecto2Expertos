<?php
require_once("../datos/UsuarioData.php");
$usuarioData=new UsuarioData();
$listaUsuarios=$usuarioData->getAllUsers();

require_once("../vistas/gestionarUsuarios.php");



?>