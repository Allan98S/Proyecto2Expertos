<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Resultados</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>
            #container {
                height: 100%;
                width: 100%;
                display: flex;
            }
            #leftThing {
                width: 30%;
            }
            #rightThing {
                width: 70%;
            }
            #listPackages li{
                display:block;
                width: 415px
            }

            #listPackages li:hover, #listPackages li:focus {
                background-color:#cefdff;
            }

        </style>
    <?php
    session_start();
     if(!isset($_SESSION["usuarioCliente"])){
    $_SESSION["usuarioCliente"]="Invitado";
    echo '<a href="../vistas/login.php">Iniciar Sesi&oacute;n</a>';
    }

   ?>
        <script>

            //$server_url = "https://loaiza4ever.000webhostapp.com";

            $server_url = "http://localhost";


            $(document).ready(function () {

                var parametros = getUrlParameter("parameters");

                $.getJSON($server_url+"/Proyecto2Expertos/controladores/BuscarPaquetesController.php?parameters="+parametros, 
                function(data){

                    $.each(data, function (key, json) {

                        var titlePackage = json.name;

                        var pricePackage = "Desde: $"+json.cost;

                        var imagePackage = json.imageURL;

                        var idTravelPackage = json.idTravelPackage;

                        $("#listPackages").append("<li id="+idTravelPackage+"> <div id='container'>"+
                        "<div id='leftThing'> <img id='imageItem' src="+imagePackage+" class='imgItemsStyle'></div>"+
                        "<div id='rightThing'> <h4 id='titleItem'>"+titlePackage+"</h4>"+
                        "<p id='priceItem'>"+pricePackage+"</p> </div> </div> </li>");

                        $("#"+idTravelPackage).click(function(){
                            window.location.href = "http://localhost/Proyecto2Expertos/vistas/detallePaquete.php?idTravelPackage="+idTravelPackage;
                        });


                    });




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

        <h3 class="hStyle">Te recomendamos: </h3>

        <ul id="listPackages" class="first-list">


        </ul>


    </div>
    
    



</div>

	</body>
</html>