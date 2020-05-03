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
        if($_SESSION["usuarioCliente"]="Invitado"){
        
        header("Location:/vistas/index.php");
        }
         
        ?>
        <script>
            $(document).ready(function () {

                var packageID = getUrlParameter("packageID");

                var userID = getUrlParameter("userID");

                console.log(packageID+"  "+userID);

                $('#logo').attr('src','https://loaiza4ever.000webhostapp.com/images/logo.png');
                $('#title').text('Su paquete ha sido reservado');
                $('#customerName').text('Cliente: Julio Segura');
                $('#amountPayment').text('Monto: $ 50.000');
                $('#airport').text('Aeropuerto Juan Santamaria');
                $('#hotel').text('Hotel Hilton');
                $('#reservationDate').text('Fecha de reservacion: 25 de Agosto 2020');
                $('#endDate').text('Fecha de fin: 15 Septiembre 2020');

            });

            function prueba(){
                alert("Esto es una prueba");
            }

            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
            };

        </script>

 
	</head>

	<body>



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
        <p id="customerName" class="pDetalleReservacionStyle"></p>
        <p id="amountPayment" class="pDetalleReservacionStyle"></p>
        <p id="airport" class="pDetalleReservacionStyle"></p>
        <p id="hotel" class="pDetalleReservacionStyle"></p>
        <p id="reservationDate" class="pDetalleReservacionStyle"></p>
        <p id="endDate" class="pDetalleReservacionStyle"></p>
        <button class="boton_personalizado">Volver</button>
    </div>
    
    



</div>

	</body>
</html>