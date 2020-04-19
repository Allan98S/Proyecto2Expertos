<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Welcome</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/menubar_style.css">
		<link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 
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
    
  
    <div class="form">
 
    <form class="login-form" action="/Proyecto2Expertos/controladores/CompruebaLoginAdmin.php" method="post">
      <input type="text" id="userName" name="userName" placeholder="nombre de usuario"/>
      <input type="password" name="password" id="password" placeholder="contrase&ntilde;a"/>
      <input type="submit" name="boton" id="boton" value="Iniciar">
    </form>
  </div>
</div>

	</body>
</html>