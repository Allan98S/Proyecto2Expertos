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
            #items{
                display:block;
                width: 415px
            }

            #items:hover, #items:focus {
                background-color:#cefdff;
            }

        </style>

        <script>
            $(document).ready(function () {

                $('#imageItem').attr('src','https://loaiza4ever.000webhostapp.com/images/manuelantonio.jpeg');
                $('#titleItem').text('Visite las playas de CR');
                $('#priceItem').text('Desde: $ 50.000');

            });

            function prueba(){
                alert("Esto es una prueba");
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


    <div class="divStyle">

        <h3 class="hStyle">Te recomendamos: </h3>

        <ul class="first-list">
            <li id="items" onclick="prueba()">

                <div id="container">

                    <div id="leftThing">
                        <img id="imageItem" class="imgItemsStyle">
                    </div>
                    
                    <div id="rightThing">
                        <h4 id="titleItem"></h4>
                        <p id="priceItem"></p>
                    </div>

                </div>
                
            </li>

        </ul>


    </div>
    
    



</div>

	</body>
</html>