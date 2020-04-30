var indice = 0;

function showSlides(n){ 

    indice = indice + n;

    var divImages = $(".mySlides");

    var images = $(".images");


    if(indice==divImages.length){indice=0}
    if(indice<0){indice = divImages.length-1}

    for (i = 0; i < divImages.length; i++) {
        divImages[i].style.display = "none";
    }

    divImages[indice].style.display = "block";

    $("#destinyName").text(images[indice].getAttribute("alt").split('_').join(' '));
    

}
