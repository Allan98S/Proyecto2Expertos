<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Detalle destino</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slideGallery.js"></script>
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/slideGallery.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script>

            //var server_url = "https://loaiza4ever.000webhostapp.com";

            var server_url = "http://localhost";

            $(document).ready(function () {

                var idDestino = getUrlParameter("idTourinstDestiny");

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

    <?php
    session_start();
if(!isset($_SESSION["usuarioCliente"]) ){
    $_SESSION["usuarioCliente"]="Invitado";
    echo '<a href="../vistas/login.php">Iniciar Sesi&oacute;n</a>';
}

?>
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

                <a href="#" class="pStyle">Ver ubicación en Google Maps</a>

            <p id="detailsPackage" class="pStyle"></p>
          
        </div>
            

	</body>
</html>