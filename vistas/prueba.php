<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Welcome</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<script> 
		$(document).ready(function () {
        $.getJSON("https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/readTop3.php",function(data){	
		if(data) {
		var json_data;
	
		$.each(data, function(i,elemento){
       
        if(i==0){
        $( "#image1" ).attr( "src", elemento.imageURL );
        }
        if(i==1){
        $( "#image2" ).attr( "src", elemento.imageURL );
        }
        if(i==2){
        $( "#image3" ).attr( "src", elemento.imageURL );
        }
        
		});
		} else {
		alert("NOT FOUND JSON");
		}		
	});	
          });
		</script>
	</head>

	<body>
    
    
    <img id="image1" src=""  style="width:60px;">
    <img id="image2" src=""  style="width:60px;">
    <img id="image3" src=""  style="width:60px;">

 


</div>
	</body>



</html>