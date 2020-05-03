
$(document).ready(function () {

    $.getJSON("https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/readTop3.php", function (data) {
        if (data) {
            var json_data;

            $.each(data, function (i, elemento) {
 
                if (i == 0) {
                    $("#image1").attr("src", elemento.imageURL);
                    $("#titulo1").text(elemento.name);
                    var ruta ="detallePaquete.php?idTravelPackage="+elemento.idTravelPackage;
                    $("#consultarPaquete1").attr("href",ruta);
                }
                if (i == 1) {
                    $("#image2").attr("src", elemento.imageURL);
                    var ruta ="detallePaquete.php?idTravelPackage="+elemento.idTravelPackage;
                    $("#consultarPaquete2").attr("href",ruta);
                }
                if (i == 2) {
                    $("#image3").attr("src", elemento.imageURL);
                    var ruta ="detallePaquete.php?idTravelPackage="+elemento.idTravelPackage;
                    $("#consultarPaquete3").attr("href",ruta);

                }

            });
        } else {
            alert("NOT FOUND JSON");
        }
    });


    $.getJSON("https://loaiza4ever.000webhostapp.com/TravellersApi/api/travelPackage/read.php", function (data) {
        if (data) {
            var json_data;
            var producto = 'product_';
            $.each(data, function (i, elemento) {
                json_data =
                    '<div id="' + producto + i + '"  class="product">' +
                    '<a href="'+ elemento.imageURL +'" rel="gallery">'+
                    '<img src="' + elemento.imageURL + '" width="195" height="95" />' +
                    '</a>'+
                    '<h5>' + elemento.name + '</h5>';

                $(json_data).appendTo('#carruselElemento');
            });
        } else {
            json_data += 'No hay contenidos para mostrar';


            $(json_data).appendTo('#carruselElemento');
        }
    });


    var current = 0;
    var imagenes = new Array();
    var numImages = 6;
    if (numImages <= 3) {
        $('.right-arrow').css('display', 'none');
        $('.left-arrow').css('display', 'none');
    }
    $('.left-arrow').on('click', function () {
        if (current > 0) {
            current = current - 1;
        } else {
            current = numImages - 3;
        }

        $(".carrusel").animate({ "left": -($('#product_' + current).position().left) }, 600);

        return false;
    });

    $('.left-arrow').on('hover', function () {
        $(this).css('opacity', '0.5');
    }, function () {
        $(this).css('opacity', '1');
    });

    $('.right-arrow').on('hover', function () {
        $(this).css('opacity', '0.5');
    }, function () {
        $(this).css('opacity', '1');
    });

    $('.right-arrow').on('click', function () {
        if (numImages > current + 3) {
            current = current + 1;
        } else {
            current = 0;
        }

        $(".carrusel").animate({ "left": -($('#product_' + current).position().left) }, 600);

        return false;
    });

    $("#carruselElemento a").fancybox({
        overlayColor: "#797e79",
        overlayOpacity: .6,
        transitionIn: "elastic",
        transitionOut: "elastic",
        tittlePosition: "Outside",
        cyclic: true,
        speedIn:1000,
        speedOut:1000


    });


});
