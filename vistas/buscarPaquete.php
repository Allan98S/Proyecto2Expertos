<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Buscar paquete</title>
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
            //$server_url = "https://loaiza4ever.000webhostapp.com";

            $server_url = "http://localhost";

            //Este metodo me permite obtener el valor de los campos del formulario y almacenarlos en diferentes variables
            function buscarPaquete(){

                var cantidad_personas = $("#cantidad_personas").val();

                var tipo_viaje = $("#tipo_viaje").val();

                var tipo_viajero = $("#tipo_viajero").val();

                var precio_esperado = $("#precio_esperado").val();

                var parametros = cantidad_personas+"-"+tipo_viaje+"-"+tipo_viajero+"-"+precio_esperado;

                window.location.href = $server_url+"/Proyecto2Expertos/vistas/resultadoPaquetes.php?parameters="+parametros;


            }

      

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
    <a class="nav-link" href="vistas/siteMap.php">Mapa del sitio</a>
</li>
  
</ul>
<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> BIEVENIDO <?php echo $_SESSION["usuarioCliente"]?></a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionCliente.php"><span class="glyphicon glyphicon-log-in"></span> SALIR</a></li>
    </ul>
</nav>


    <div class="divStyle">
        <h3 class="hStyle">Buscar paquetes de viaje</h3>
        <p class="pStyle">
            Seleccione un valor para cada criterio
            de busqueda, con el fin de poder recomendarle
            los paquetes de viaje que mas se adecuen a
            sus preferencias.
        </p>

        <ul>
	<li>
		<label for="cantidad_personas">Cantidad de personas:</label>
			<select id="cantidad_personas">
				<option value="1">1 persona</option>
				<option value="2">2 personas</option>
				<option value="3">3 personas</option>
                <option value="4">4 personas</option>
                <option value="5">5 personas</option>
			</select> 
		</li>

		<li>
			<label for="tipo_viaje">Tipo de viaje:</label>
			<select id="tipo_viaje">
                <option value="1">Playa</option>
                <option value="3">Isla</option>
                <option value="5">Playa y montana</option>
                <option value="9">Montana</option>
                <option value="17">Ciudad</option>
			</select> 
        </li>
        
        <li>
			<label for="tipo_viajero">Tipo de viajero:</label>
			<select id="tipo_viajero">
				<option value="1">Relajado</option>
                <option value="10">Deportista</option>
                <option value="15">Aventurero</option>
			</select> 
		</li>


		<li>
			<label for="precio_esperado">Precio experado:</label>
    		<input type="text" id="precio_esperado" name="precio_esperado">
		</li>

        <input value="Buscar" onclick="buscarPaquete()" type="button">

        
	</ul>

    </div>
    
    



</div>
<a id="ruta" name="ruta" href=""><button id="atras" name="atras"  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>

	</body>
</html>