<!doctype html>
<html>
	
	<head>
    <?php
    session_start();
if(!isset($_SESSION["usuarioCliente"]) ){
    $_SESSION["usuarioCliente"]="Invitado";
    $_SESSION["passwordCliente"]="Invitado";
}

?>
		<meta charset="utf-8">
		<title>Detalle destino</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
         <script src="js/slideGallery.js"></script>
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/slideGallery.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
    
        <style>
        #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
        }

        #boton1{
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #45b9d6;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;  
    display: block;
    margin: 0 auto;
    
}
        </style>
        <script>

            //var server_url = "https://loaiza4ever.000webhostapp.com";

            var server_url = "http://localhost";
            var latitud=0;
            var longitud=0;
            $(document).ready(function () {

                var idDestino = getUrlParameter("idTourinstDestiny");

                $("#atras").click(function() {
                    var r = 'buscarPaquete.php';
                 $("#ruta").attr('href',r);
                });


                $.getJSON(server_url+"/Proyecto2Expertos/controladores/DestinoController.php?idTourinstDestiny="+idDestino, 
                function(data){

                    $.getJSON(server_url+"/Proyecto2Expertos/controladores/ImagenesController.php?destinyID="+idDestino, 
                    function(images){

                        var i = 0;
                        
                        $.each(images, function (key, image) {   
                            
                            var imageURL = images[i].imageURL;

                            console.log(imageURL);

                            var htmlCode = "<div class='mySlides'><div class='numbertext'>"+ i + "/"+ images.length +"</div>"+
                                    "<img src="+imageURL+" style='width:450px'></div>";
                                    
                                    $("#imageGal").prepend(htmlCode);

                            i++;

                        });

                        showSlides(0);

                    });


                    //$('#imagePackage').attr('src','https://loaiza4ever.000webhostapp.com/images/manuelantonio.jpeg');
                    $('#destinyTitle').text(data.name);
                    $('#detailsPackage').text(data.description);
                    latitud=data.latitud;
                    longitud=data.longitud;
                    
                    
                });
                $("#boton1").click(function() {
                $("#map").show();
                var uluru = {lat: Number(latitud), lng: Number(longitud)};
                 // The map, centered at Uluru
                var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: uluru});
                // The marker, positioned at Uluru
                 var marker = new google.maps.Marker({position: uluru, map: map});
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

<br><br><br>

        <div class="divStyle">
            <h3 id="destinyTitle" class="hStyle"></h3>
        
                <div id="imageGal" class="container">
                    
                    <!-- Next and previous buttons -->

                    <a class="prev" onclick="showSlides(-1)">&#10094;</a>
                    <a class="next" onclick="showSlides(1)">&#10095;</a>
                    
                </div>
            <p id="detailsPackage" class="pStyle"></p>
          
        </div>
        <input type="button" id="boton1" name="boton1" value="Ver ubicaci&oacute;n"></input>
        <div id="map"></div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCakH9qp0nQXpSOkMFR7h3KIxw3TXdUZUI&callback=initMap">
    </script>
       <a id="ruta" name="ruta" href=""><button id="atras" name="atras"  class="btn"><i class="fa fa-close"></i> Atr&aacute;s</button></a>

	</body>
</html>