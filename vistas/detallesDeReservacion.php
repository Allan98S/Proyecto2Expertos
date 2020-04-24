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

        <script>
            $(document).ready(function () {

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

        </script>

 
	</head>

	<body>



    <nav class="navbar nav-color">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Sobre nosotros</a></li>
                    <li><a href="#">Administrativos</a></li>
                  
                </ul>
                
            </div>
        </div>
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