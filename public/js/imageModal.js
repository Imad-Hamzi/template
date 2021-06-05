// Modal pour zoom sur image dans la vue pensionnaires

// Je récupère la div qui à l'id modal
var modal = document.getElementById('myModal');

// Je récupère les images qui ont la class myImg
var img = document.getElementsByClassName('myImg');

// Je récupère l'image qui est présente dans le modal
var modalImg = document.getElementById("img01");

// Je récupère la div caption qui est présente dans le modal
var captionText = document.getElementById("caption");


// Je fait une boucle sur les images car avec getElementsByClassName on à un tableau
for (let i = 0; i < img.length; i++) {

  // Sur le clique de l'image 
  img[i].onclick = function () {

    // Je met un style css block afin qu'il soit visible
    modal.style.display = "block";

    // Je récuprère le src de l'image  que je met dans modalImg
    modalImg.src = this.src;

    // Je récuprère le alt de l'image  que je met dans captionText 
    // captionText.innerHTML = this.alt;
  }
}

// Je récupère le span ou il y a la croix pour fermer le modal
let span = document.getElementById('clos');
if(span){
  // Quand je clique sur le span je met la proprété display none au modal pour qu'il disparait
span.onclick = function() {
  modal.style.display = "none";
}
}