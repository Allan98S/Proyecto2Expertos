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

        <script>

            //var server_url = "https://loaiza4ever.000webhostapp.com";

            var server_url = "http://localhost";

            $(document).ready(function () {

                var idDestino = getUrlParameter("idTourinstDestiny");

                console.log(server_url+"/travellersWeb/Proyecto2Expertos/controladores/DestinoController.php?idTourinstDestiny="+idDestino);

                $.getJSON(server_url+"/travellersWeb/Proyecto2Expertos/controladores/DestinoController.php?idTourinstDestiny="+idDestino, 
                function(data){

                    $('#imagePackage').attr('src','https://loaiza4ever.000webhostapp.com/images/manuelantonio.jpeg');
                    $('#destinyTitle').text(data.name);
                    $('#detailsPackage').text(data.description);

                });

            });

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
        <h3 id="destinyTitle" class="hStyle"></h3>
        
        <div>
            <img id="imagePackage" class="imgDetallePaqueteStyle">
            <a href="#" class="pStyle">Ver ubicación en Google Maps</a>
        </div>

        <p id="detailsPackage" class="pStyle"></p>
        <button class="boton_personalizado">Volver</button>
    </div>
    
    



</div>

	</body>
</html>