<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Welcome</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
        session_start();
         if(!isset($_SESSION["usuarioCliente"]) ){
          $_SESSION["usuarioCliente"]="Invitado";
          $_SESSION["passwordCliente"]="Invitado";
         }
         else{
         }

         ?>
        <script>
         $(document).ready(function () {
         $("#atras").click(function() {
          var usuario ="<?php echo $_SESSION['usuarioCliente']; ?>";
          if(usuario=="Invitado"){
             $("#ruta").attr('href','../index.php');
          }
          else{
            $("#ruta").attr('href','indexLogueado.php');
          }

        });
        });
         </script>
        
	</head>

	<body>


    <nav id="navPricipal" class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="https://loaiza4ever.000webhostapp.com/images/logo.png" alt="logo" style="width:60px;">
  </a>
  
  <!-- Links -->
  <ul class="nav navbar-nav">
 
<li class="nav-item">
    <a class="nav-link" href="#">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="about_us.php">Sobre nosotros</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="siteMap.php">Mapa del sitio</a>
</li>
  
</ul>
<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> BIEVENIDO <?php echo $_SESSION["usuarioCliente"]?></a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionCliente.php"><span class="glyphicon glyphicon-log-in"></span> SALIR</a></li>
    </ul>
</nav>


    <div class="divStyle">
        

        <div class="divStyle2">
            <h3 class="tituloMapSiteStyle">Mapa de la página...</h3>
            <a class="linkStyle" href="../index.php">Inicio</a><br><br>
            <a class="linkStyle" href="about_us.php">Acerca de nosotros</a><br><br>
            <a class="linkStyle" href="login.php">Iniciar Sesi&oacute;n/ Registro</a><br><br>
            <a class="linkStyle" href="buscarPaquete.php">Buscar paquetes</a><br><br>
            <a class="linkStyle" href="loginAdministrativo.php">Sesi&oacute;n administrativa</a><br><br>
          

        </div>

    </div>
    
    



</div>
<a id="ruta" name="ruta" href=""><button id="atras" name="atras"  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>

	</body>
</html>