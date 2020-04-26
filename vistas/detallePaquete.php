<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Detalle Paquete</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="javascript.js"></script>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script>
            $(document).ready(function () {

                var packageID = getUrlParameter("packageID");

                //$server_url = "https://loaiza4ever.000webhostapp.com";

                var server_url = "http://localhost";


                $.ajax({
                    url:server_url+"/travellersWeb/Proyecto2Expertos/controladores/DetallePaqueteController.php?packageID="+packageID, 
                    dataType : 'json',
                    async : false,
                    success : function(paquete) { 

                        $.ajax({
                            url:"http://localhost/travellersWeb/Proyecto2Expertos/controladores/DestinoTuristicoController.php?packageID="+packageID, 
                            dataType : 'json',
                            async : false,
                            success : function(destinos) { 
                                
                                var imageURL;
                            
                                $.each(destinos, function (key, destino) {    

                                    $.ajax({
                                        url:"http://localhost/travellersWeb/Proyecto2Expertos/controladores/ImagenesController.php?destinyID="+destino.idtouristdestination, 
                                        dataType : 'json',
                                        async : false,
                                        success : function(imagenes) { 
                                            imageURL = imagenes[1].imageURL;
                                        }
                                    });
                                    
                                    var htmlCode = "<div class='mySlides'><div class='numbertext'>1 / 6</div>"+
                                    "<img src="+imageURL+" style='width:450px' alt='Destino'></div>";

                                    $("#imageGal").prepend(htmlCode);

        

                                });


                            }
                        });

                    $('#titlePackage').text(paquete.name);
                    $('#detailsPackage').text("Desde: $"+paquete.cost);

                        
                    }


                });//paquetes

                plusSlides(0);

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


    <div>
        <h3 id="titlePackage" class="hStyle"></h3>

        <div class="imageGallery">
        
            <div id="imageGal" class="container">

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <p id="destinyName">Destiny name</p>
            </div> 

        </div>

        <p id="detailsPackage" class="detallesPackageStyle"></p>
        <button class="boton_personalizado">Recervar paquete</button>
    </div>
    
    



</div>

	</body>
</html>