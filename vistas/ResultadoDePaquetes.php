<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Welcome</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/menubar_style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/otrosEstilos.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>
            body {
            color: #555;
            font-size: 1.25em;
            line-height: 1.5;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            }

            .container {
            margin: 40px auto;
            max-width: 700px;
            }


            li {
            vertical-align: top;
            }
        </style>

        <script>
            $(document).ready(function () {

                $('#imageItem').attr('src','https://loaiza4ever.000webhostapp.com/images/manuelantonio.jpeg')
                
            });
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

        <div class="container">

        <ul class="first-list">
            <li>

                <div>

                    <div>
                        <img id="imageItem" style="width: 100px">
                    </div>
                    
                    <div>
                        <h4>Visete las platas de CR</h4>
                    </div>

                </div>
                
            </li>


            <li>Visite las playas del Caribe</li>
            <li>Visite los principales Cerros de CR</li>
            <li>Visite las principales islas de CR</li>
        </ul>

        </div>

    </div>
    
    



</div>

	</body>
</html>