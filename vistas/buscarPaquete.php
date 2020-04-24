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


        <script>

            function getResult(parametros){

                $.getJSON('https://loaiza4ever.000webhostapp.com/TareaExpertos/Backend/api/profesores/getEstiloProfesor.php'+
                '?paremetros='+parametros, 
                function(json){

                    alert(json.Response);

                });

            }

            //Este metodo me permite obtener el valor de los campos del formulario y almacenarlos en diferentes variables
            function buscarPaquete(){

                var cantidad_personas = $("#cantidad_personas").val();

                var tipo_viaje = $("#tipo_viaje").val();

                var tipo_viajero = $("#tipo_viajero").val();

                var precio_esperado = $("#precio_esperado").val();

                var parametros = cantidad_personas+"-"+tipo_viaje+"-"+tipo_viajero+"-"+precio_esperado;

                window.location.href = "http://localhost/travellersWeb/Proyecto2Expertos/controladores/BuscarPaquetesController.php?parameters="+parametros;


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
        <h3 class="hStyle">Buscar paquetes de viaje</h3>
        <p class="pStyle">
            Seleccione un valor para cada criterio
            de busqueda, con el fin de poder recomendarle
            los paquetes de viaje que mas se adecuen a
            sus preferencias.
        </p>

        <ul>
	<li>
		<label for="cantidad_personas">Cantidad de personas:</label>
			<select id="cantidad_personas">
				<option value="1">1 persona</option>
				<option value="2">2 personas</option>
				<option value="3">3 personas</option>
                <option value="4">4 personas</option>
                <option value="5">5 personas</option>
			</select> 
		</li>

		<li>
			<label for="tipo_viaje">Tipo de viaje:</label>
			<select id="tipo_viaje">
                <option value="1">Playa</option>
                <option value="3">Isla</option>
                <option value="5">Playa y montana</option>
                <option value="9">Montana</option>
                <option value="17">Ciudad</option>
			</select> 
        </li>
        
        <li>
			<label for="tipo_viajero">Tipo de viajero:</label>
			<select id="tipo_viajero">
				<option value="1">Relajado</option>
                <option value="10">Deportista</option>
                <option value="15">Aventurero</option>
			</select> 
		</li>


		<li>
			<label for="precio_esperado">Precio experado:</label>
    		<input type="text" id="precio_esperado" name="precio_esperado">
		</li>

        <input value="Buscar" onclick="buscarPaquete()" type="button">

        
	</ul>

    </div>
    
    



</div>

	</body>
</html>