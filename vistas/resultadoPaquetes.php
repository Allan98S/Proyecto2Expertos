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

        <script>

            //$server_url = "https://loaiza4ever.000webhostapp.com";

            $server_url = "http://localhost";


            $(document).ready(function () {

                var parametros = getUrlParameter("parameters");

                $.getJSON($server_url+"/travellersWeb/Proyecto2Expertos/controladores/BuscarPaquetesController.php?parameters="+parametros, 
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
                            window.location.href = "http://localhost/travellersWeb/Proyecto2Expertos/vistas/detallePaquete.php?packageID="+idTravelPackage;
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

        <h3 class="hStyle">Te recomendamos: </h3>

        <ul id="listPackages" class="first-list">


        </ul>


    </div>
    
    



</div>

	</body>
</html>