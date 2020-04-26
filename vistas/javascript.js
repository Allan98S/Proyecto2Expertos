var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}


function showSlides(n) {

  var i;

  var slides = document.getElementsByClassName("mySlides"); //div que contiene las imagenes

  var captionText = document.getElementById("caption"); // texto de las imagenes

  if (n > slides.length) {slideIndex = 1}

  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {

    slides[i].style.display = "none";

  }

  slides[slideIndex-1].style.display = "block";

  captionText.innerHTML = slides[slideIndex-1].src;

} 