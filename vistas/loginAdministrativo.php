<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
        <title>Welcome</title>
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
		<link rel="stylesheet" href="css/login.css">
  
	</head>

	<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#myNavbar">
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">World Travelers</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">

                      <li class="nav-item">
                          <a class="nav-link" href="#">Home</a>
                     </li>
                    
                     <li class="nav-item">
                          <a class="nav-link" href="#">Sobre nosotros</a>
                     </li>
                        
                     <li class="nav-item">
                          <a class="nav-link" href="#">Administrativos</a>
                     </li>
                </ul>

            </div>
        </div>
    </nav>
    
    <h1 style="text-align:center">Inicio de Sesi&oacute;n Administrativos</h1>
    <br><br>
    <div class="form">
 
    <form class="login-form" action="/Proyecto2Expertos/controladores/CompruebaLoginAdmin.php" method="post">
      <input type="text" id="userName" name="userName" placeholder="nombre de usuario" required/>
      <input type="password" name="password" id="password" placeholder="contrase&ntilde;a" required/>
      <input type="submit" name="boton" id="boton" value="Iniciar">
    </form>
  </div>
</div>

	</body>
</html>