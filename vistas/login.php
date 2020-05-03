<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Welcome</title>
		
		<link rel="stylesheet" href="css/menubar_style.css">
		<link rel="stylesheet" href="css/login.css">
		<script src="js/login.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<script> 
		$(document).ready(function () {
         $('.message a').click(function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
          });
          });
		</script>
		<style>
          h1{
			  text-align:center;
		  }
		</style>
	</head>

	<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="https://loaiza4ever.000webhostapp.com/images/logo.png" alt="logo" style="width:60px;">
  </a>
  
  <!-- Links -->
  <ul class="nav navbar-nav">
 
<li class="nav-item">
    <a class="nav-link" href="../index.php">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="login.php">Iniciar Sesi&oacute;n/Registrarse</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="about_us.php">Sobre nosotros</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="siteMap.php">Mapa del sitio</a>
</li>
  
<li class="nav-item">
    <a class="nav-link" href="loginAdministrativo.php">Administrativos</a>
</li>
</ul>
</nav>
<br>
<br>
<h1>Inicio/Registro de Clientes</h1>
	<div class="login-page">
	<div class="form">
		<form class="register-form" action="../controladores/registrarUsuarioController.php" method="post">
		<input type="text" name="nombre" id="nombre" placeholder="nombre"/>
		<input type="text" name="apellidos" id="apellidos" placeholder="apellidos"/>
		<input type="text" name="correo" id="correo" placeholder="correo electr&oacute;nico"/>
		<input type="text" name="telefono" id="telefono" placeholder="tel&eacute;fono"/>
		<input type="text" name="usuario" id="usuario" placeholder="usuario"/>
		<input type="password" name="password" id="password" placeholder="contrase&ntilde;a"/>
		<button>Registrarse</button>
		<p class="message">¿Ya est&aacute; registrado? <a href="#">Iniciar Sesi&oacute;n</a></p>
		</form>
		<form class="login-form" action="../controladores/CompruebaLoginCliente.php" method="post">
		<input type="text" name="userName" id="userName" placeholder="usuario"/>
		<input type="password" name="password" id="password" placeholder="contrase&ntilde;a"/>
		<button>Iniciar Sesi&oacute;n</button>
		<p class="message">¿No registrado? <a href="#">Crear una cuenta</a></p>
		</form>
	</div>
	</div>


	</body>



</html>