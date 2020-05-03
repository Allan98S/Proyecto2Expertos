<!doctype html>
<html>
	
	<head>
    <?php
session_start();
if(!isset($_SESSION["usuarioCliente"]) ){
    $_SESSION["usuarioCliente"]="Invitado";
    $_SESSION["passwordCliente"]="Invitado";
    echo '<a href="../vistas/login.php">Iniciar Sesi&oacute;n</a>';
}

?>
		<meta charset="utf-8">
		<title>Detalle Paquete</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slideGallery.js"></script>
		<link rel="stylesheet" href="css/slideGallery.css">
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script>

            //$server_url = "https://loaiza4ever.000webhostapp.com";

            var server_url = "http://localhost";

            $(document).ready(function () {

                var packageID = getUrlParameter("idTravelPackage");

                //obtengo los detalles del paquete
                $.ajax({
                    url:server_url+"/Proyecto2Expertos/controladores/DetallePaqueteController.php?packageID="+packageID, 
                    dataType : 'json',
                    async : false,
                    success : function(paquete) { 
                        
                        var i = 1;
                        
                        //obtengo los destinos turisticos
                        $.ajax({
                            url: server_url+"/Proyecto2Expertos/controladores/DestinoTuristicoController.php?packageID="+packageID, 
                            dataType : 'json',
                            async : false,
                            success : function(destinos) { 
                                
                                var imageURL;
                            
                                $.each(destinos, function (key, destino) {    

                                    //obtengo la imagen de cada destino turistico
                                    $.ajax({
                                        url: server_url+"/Proyecto2Expertos/controladores/ImagenesController.php?destinyID="+destino.idtouristdestination, 
                                        dataType : 'json',
                                        async : false,
                                        success : function(imagenes) { 
                                            imageURL = imagenes[1].imageURL;
                                        }
                                    });

                                    var name = (destino.name).split(' ').join('_');
                                    
                                    var htmlCode = "<div class='mySlides'><div class='numbertext'>"+ i + "/"+ destinos.length +"</div>"+
                                    "<img onclick='verDestino("+destino.idtouristdestination+")' class='images' src="+imageURL+" style='width:450px' alt="+name+"></div>";
                                    $("#leyendaImagen").text("Haga click en la imagenes para observas los detalles del destino");
                                    $("#imageGal").prepend(htmlCode);

                                    i++;

                                });


                            }
                        });

                    var userID = 0;

                    $('#titlePackage').text(paquete.name);             
                    $('#price').text("Desde: $"+paquete.cost);
                    $("#people").text("Cantidad de personas: "+paquete.numberOfPersons);
                    $("#startDate").text("Fecha de inicio: "+paquete.startDate);
                    $("#endDate").text("Fecha de fin: "+paquete.endDate);
                    $("#button").attr("onclick","reservarPaquete("+packageID+")");

                    showSlides(0);
                    }

                   

                });//paquetes

            });

            function verDestino(idDestino){
                var ruta  ="/Proyecto2Expertos/vistas/detalleDestino.php?idTourinstDestiny="+idDestino;
           
                window.location.href =ruta
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

            function reservarPaquete(packageID){
                var userName = "<?php echo $_SESSION['usuarioCliente']; ?>";
                var password= "<?php echo $_SESSION['passwordCliente']; ?>";
                if(userName=="Invitado"){
                  alert("Debes iniciar sesión para reservar paquetes");
                }
                else{
                    $.getJSON(server_url+"/TravellersApi/api/user/read_login.php?userName="+userName+"&password="+password, 
                    function(usuario){
                      
                     var userResponse = confirm("¿Estás seguro que quieres reservar este paquete?");
                    if(userResponse){
                     window.location.href = server_url+"/Proyecto2Expertos/controladores/registrarReservacion.php?packageID="+packageID+"&idUser="+usuario.idUser;
                    }
                
                     

                    });   
                }
                

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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuarioCliente"];?> </a></li>
      <li><a href="/Proyecto2Expertos/controladores/cerrarSesionCliente.php"><span class="glyphicon glyphicon-log-in"></span> SALIR</a></li>
    </ul>
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
        <h5 id="leyendaImagen"> </h5>
        </div>

        <p id="price" class="detallesPackageStyle"></p>
        <p id="people" class="detallesPackageStyle"></p>
        <p id="startDate" class="detallesPackageStyle"></p>
        <p id="endDate" class="detallesPackageStyle"></p>

        <button id="button" class="boton_personalizado">Reservar paquete</button>
        
    </div>
</div>

	</body>
</html>