<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="vistas/js/carrusel.js"></script>
  <link rel="stylesheet" href="vistas/css/carrusel.css">

    <link href="vistas/css/index.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
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
    <a class="nav-link" href="vistas/login.php">Iniciar Sesi&oacute;n/Registrarse</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="vistas/about_us.php">Sobre nosotros</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="vistas/siteMap.php">Mapa del sitio</a>
</li>
  
<li class="nav-item">
    <a class="nav-link" href="vistas/loginAdministrativo.php">Administrativos</a>
</li>
</ul>
</nav>
<br>
<br>
 <div>
    <h1 > BIENVENIDO A WORLD TRAVELLERS</h1>  
    <div class="row">
    
       
            <div class="container-fluid bg-1 text-center" style="height:500px">
                <h2> Un peque&ntilde;o v&iacute;deo de los destinos que le esperan ...</h2>
                
                <video controls="controls">
                    <source src="https://loaiza4ever.000webhostapp.com/videos/manuelAntonio.mp4" type="video/mp4" autoplay style="height:300px" />
                </video>
            </div>
        </div>
  
    <br>
    <!-- Third Container (Grid) -->
    <div class="container-fluid bg-3 text-center">
        <h3 class="margin ">Paquetes del momento</h3>
        <div class="row">
            <div class="col-sm-4 ">
                <p>Manuel Antonio</p> <br />
                <img src="https://loaiza4ever.000webhostapp.com/images/13-dsc0256.jpg" width="60% " height="60% " alt="Image " />
            </div>
            <div class="col-sm-4 ">
                <p>Parque Nacional Braulio Carrillo</p> <br />

                <img src="https://loaiza4ever.000webhostapp.com/images/braulioCarrillo.jpg"  width="60% " height="60% " alt="Image " />
            </div>
            <div class="col-sm-4 ">
                <p>&Iacute;sla del Coco</p>

                <img src="https://loaiza4ever.000webhostapp.com/images/coco.jpg" width="60% " height="60% " alt="Image " />
            </div>
        </div>
    </div>
    <div id="carrusel">
    <a href="#" class="left-arrow"><img src="vistas/images/left-arrow.png" /></a>
    <a href="#" class="right-arrow"><img src="vistas/images/right-arrow.png" /></a>
    <h1 >Im&aacute;genes de nuestros destinos</h1>
    
    <div class="carrusel">
        <div class="product" id="product_0">
            <img src="https://loaiza4ever.000webhostapp.com/images/coco3.jpg" width="195" height="95" />
            <h5>Isla del Coco</h5>
            <h6>Costa Rica</h6>
        </div>
        <div class="product" id="product_1">
            <img src="https://loaiza4ever.000webhostapp.com/images/LagoAtitlan2.jpg" width="195" height="95" />
            <h5>Lago Atitl&aacute;n</h5>
            <h6>Guatemala </h6>
        </div>
        <div class="product" id="product_2">
            <img src="https://loaiza4ever.000webhostapp.com/images/monteSion1.jpg" width="195" height="95" />
            <h5>Monte si&oacute;n</h5>
            <h6>Jerusalem</h6>
        </div>
        <div class="product" id="product_3">
            <img src="https://loaiza4ever.000webhostapp.com/images/monteverde3.jpg" width="195" height="95" />
            <h5>Reserva Monteverde</h5>
            <h6>Costa Rica</h6>
        </div>
        <div class="product" id="product_4">
            <img src="https://loaiza4ever.000webhostapp.com/images/piramideTikal1.jpg" width="195" height="95" />
            <h5>Pir&aacute;mides de Tikal</h5>
            <h6>Guatemala</h6>
        </div>
        <div class="product" id="product_5">
            <img src="https://loaiza4ever.000webhostapp.com/images/roatan.jpg" width="195" height="95" />
            <h5>Isla Roat&aacute;n</h5>
            <h6>Honduras</h6>
        </div>
        
    </div>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
 
  


    <!-- Footer -->
    <footer class="container-fluid footcolor text-center ">
        <p class="colorHidro ">World Travellers <a href="# "></a></p>
    </footer>
    </div>
</body>
</html>