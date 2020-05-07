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
        <h3 class="hStyle">Nosotros...</h3>
        <p class="pStyle">
            Somos una empresa creada en 2020
            dedicada a viajes touristicos a través
            de todo Costa Rica, con destino a
            touristas ticos y extranjeros.<br><br>

            Misión: Ofrecer la mejor experiencia
            de viaje a nuestros preciados turistas.<br><br>

            Visión: Ofrecer servicios todo incluído
            de tal forma que el tourista solo se
            tenga que preocupar por disfrutar lo
            máximo.<br><br>

            Para quejas o sugerencias contactanos
            por medio del correo:
            World.travelersB6@gmail.com
        </p>
    </div>
    
    

    <a id="ruta" name="ruta" href=""><button id="atras" name="atras"  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>
 

</div>

	</body>
</html>