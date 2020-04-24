<!doctype html>
<html>
    
    <head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <meta charset="utf-8">
        <title>Documento sin título</title>
        <style>
			table{
				background-color:#FFC;
				border:1px solid #FF0000;
				margin:auto;
				padding:25px;
			}
		h1{
			width:50%;
			margin:25px auto;
			
			text-align:center;
			margin-bottom:50px;
		}
		
		body{
			background-color:#FC9;
		}
		
		#boton{
			padding-top:25px;
			
		}
		
		</style>


<script>

</script>



        
    </head>
    
    <body>
    <h1> Alta de artículos nuevos</h1>
    
        <form  id="form1" action="../controladores/actualizarPaqueteController.php" name="form1" method="post">
        <table>
        <tr><td>
            <label>Nombre:</label></td><td> <input type="text" name="name" id="name"></td></tr>
            <tr><td><label>Apellido:</label></td><td><input type="text" name="lastName" id="lastName"></td></tr>
          <tr><td>  <label>Email:</label> </td><td><input type="text" id="email" name="email"></td></tr>
          <tr><td>  <label>Telefono: </label></td><td><input type="text" id="phone" name="phone"></td></tr>
           <tr><td> <label>User name: </label></td><td><input type="text" id="userName" name="userName"></td></tr>
           <tr><td> <label>Password:</label> </td><td><input type="text" id="password" name="password"></td></tr>
          <tr><td colspan="2" align="center" id="boton" name="boton">  <input type="submit" name="enviando" value="¡Dale!"></td></tr>
        </table>
        </form>
        <div id="result"></div>
    </body>
    
</html>