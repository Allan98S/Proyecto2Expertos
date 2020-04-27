<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Detalle Paquete</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/slideGallery.css">
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script>
            $(document).ready(function () {

                var packageID = getUrlParameter("packageID");

                //$server_url = "https://loaiza4ever.000webhostapp.com";

                var server_url = "http://localhost";

                //obtengo los detalles del paquete
                $.ajax({
                    url:server_url+"/travellersWeb/Proyecto2Expertos/controladores/DetallePaqueteController.php?packageID="+packageID, 
                    dataType : 'json',
                    async : false,
                    success : function(paquete) { 

                        var i = 1;
                        
                        //obtengo los destinos turisticos
                        $.ajax({
                            url: server_url+"/travellersWeb/Proyecto2Expertos/controladores/DestinoTuristicoController.php?packageID="+packageID, 
                            dataType : 'json',
                            async : false,
                            success : function(destinos) { 
                                
                                var imageURL;
                            
                                $.each(destinos, function (key, destino) {    

                                    //obtengo la imagen de cada destino turistico
                                    $.ajax({
                                        url: server_url+"/travellersWeb/Proyecto2Expertos/controladores/ImagenesController.php?destinyID="+destino.idtouristdestination, 
                                        dataType : 'json',
                                        async : false,
                                        success : function(imagenes) { 
                                            imageURL = imagenes[1].imageURL;
                                        }
                                    });

                                    var name = (destino.name).split(' ').join('_');
                                    
                                    var htmlCode = "<div class='mySlides'><div class='numbertext'>"+ i + "/"+ destinos.length +"</div>"+
                                    "<img class='images' src="+imageURL+" style='width:450px' alt="+name+"></div>";
                                    
                                    $("#imageGal").prepend(htmlCode);

                                    i++;

                                });


                            }
                        });

                    $('#titlePackage').text(paquete.name);             
                    $('#price').text("Desde: $"+paquete.cost);
                    $("#people").text("Cantidad de personas: "+paquete.numberOfPersons);
                    $("#startDate").text("Fecha de inicio: "+paquete.startDate);
                    $("#endDate").text("Fecha de fin: "+paquete.endDate);

                    showSlides(0);
                    }

                   

                });//paquetes

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

            var indice = 0;

            function showSlides(n){ 

                indice = indice + n;

                var divImages = $(".mySlides");

                var images = $(".images");


                if(indice==divImages.length){indice=0}
                if(indice<0){indice = divImages.length-1}

                for (i = 0; i < divImages.length; i++) {
                    divImages[i].style.display = "none";
                }

                divImages[indice].style.display = "block";

                $("#destinyName").text(images[indice].getAttribute("alt").split('_').join(' '));

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


    <div>
        <h3 id="titlePackage" class="hStyle"></h3>

        <div class="imageGallery">
        
            <div id="imageGal" class="container">

                <!-- Next and previous buttons -->
                <a class="prev" onclick="showSlides(-1)">&#10094;</a>
                <a class="next" onclick="showSlides(1)">&#10095;</a>
                <div class="divDestinyName">
                    <p id="destinyName" class="textDestinyNameDatallePaquete"></p>
                </div>
                
            </div> 

        </div>

        <p id="price" class="detallesPackageStyle"></p>
        <p id="people" class="detallesPackageStyle"></p>
        <p id="startDate" class="detallesPackageStyle"></p>
        <p id="endDate" class="detallesPackageStyle"></p>

        <button class="boton_personalizado">Recervar paquete</button>
        
    </div>
</div>

	</body>
</html>