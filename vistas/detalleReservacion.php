<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Travellers Web</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <?php
        session_start();
        if($_SESSION["usuarioCliente"]=="Invitado"){
        
        header("Location:/vistas/index.php");
        }
         
        ?>
      <script>
        $(document).ready(function () {
         $('#logo').attr('src','https://loaiza4ever.000webhostapp.com/images/logo.png');
        });
      </script>

 
	</head>

	<body>
    <?php 
     require_once("../datos/TravelPackageData.php");
     require_once("../datos/UsuarioData.php");
     require_once("../datos/ReservationData.php");
     require_once("../datos/AirportData.php");
     require_once("../datos/HotelData.php");
     $usuarioData=new UsuarioData();
     $travelPackageData=new TravelPackageData();
     $reservationData=new ReservationData();
     $airportData=new AirportData();
     $hotelData=new HotelData();
     $idReservacion=$_GET["idReservation"];
     $reservacionSeleccionada=$reservationData->getResevationByID($idReservacion);
     $paqueteSeleccionado=$travelPackageData->getAllTravelPackageByID($reservacionSeleccionada['idTrip']);
     $hotelSeleccionado=$hotelData->getAllHotelByID($paqueteSeleccionado['idHotel']);
     $aeropuertoSeleccionado=$airportData->getAllAiportByID($paqueteSeleccionado['idAirport']);
     $usuarioSeleccionado=$usuarioData->getUserByID($reservacionSeleccionada['idUser']);

    ?>


    <nav id="navPricipal" class="navbar navbar-expand-sm bg-dark navbar-dark">


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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuarioCliente"];?> </a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionCliente.php"><span class="glyphicon glyphicon-log-in"></span> SALIR</a></li>
    </ul>
</nav>


    <div class="divStyle">
        <h3 id="title" class="hStyle"></h3>
        
        <div>
            <img id="logo" class="logoDetalleResercacion">
        </div>

        <p id="packageName" class="pDetalleReservacionStyle"></p>
        <p id="customerName" class="pDetalleReservacionStyle"> Cliente: 
        <?php echo $usuarioSeleccionado['name']." ". $usuarioSeleccionado['lastName']  ?> 
        </p>
        <p id="amountPayment" class="pDetalleReservacionStyle">Costo del paquete: <?php echo $paqueteSeleccionado['cost']?> </p>
        <p id="airport" class="pDetalleReservacionStyle">Aeropuerto:<?php echo $aeropuertoSeleccionado['name']?> </p>
        <p id="hotel" class="pDetalleReservacionStyle">Hotel: <?php echo $hotelSeleccionado['name']?></p>
        <p id="reservationDate" class="pDetalleReservacionStyle">Fecha de la reservaci&oacute;n<?php echo $reservacionSeleccionada['reservationDate']?></p>
        <a href="../vistas/indexLogueado.php"  >Finalizar</button>
    </div>
    
    



</div>

	</body>
</html>