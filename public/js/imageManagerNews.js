var lastClickedImage;
var urlImageClicked; // cette variable va nous permettre d'envoyer l'url de l'image au formulaire
var idImageClicked; // cette variable va nous permettre d'envoyer l'id au serveur



// Je récupère le boutton "image du site"
$("#multimedia").on("click", function (event) {
    event.preventDefault();

    //  Je récupère la div imageManager et avec toggleClass soit je rajoute d-none ou si celui-ci est dèja présent je l'enleve.
    $("#imageManager").toggleClass("d-none");

    // Si l'utilisateur choisit une image de la bibliothèque celui-ci ne peux pas choisir une  image à uploder. Je met l'input du champs 
    // imageActu à vide
    $("#imageActu").val("");
});


// Je récupère l'input imageActu ou l'utilisateur clique pour uploder une photo
$("#imageActu").on("click", function (event) {

    urlImageClicked = "";
    idImageClicked = "";
    // Si l'utilisateur choisit d'uploder une photo je ferme la bibliothèque avec d-none
    $("#imageManager").addClass("d-none");
    // J'envoi "rien" dans le formulaire dans la div resulat ou alors de supprimer la photo qui à été choisie dans la bibliothèque
    $("#resultat").html("");

    // ça me permet de déselectionner si une photo a été selectionnée dans la bibliothèque
    if (lastClickedImage !== null) {
        $(lastClickedImage).addClass("border");
        $(lastClickedImage).addClass("border-dark");
        $(lastClickedImage).removeClass("border-success");
        $(lastClickedImage).css("border", "");
    }
    lastClickedImage = "";
});


// Je récupère les images de la bibliothèque et lorsque je click dessus 
$("#imageManager img").on("click", function (event) {

    // Je récupère le parent de l'image cliquée(div)
    var parentClicked = event.target.parentElement;

    // Je supprime le border success sur la dernière image cliquée car je ne souhaite avoir qu'une seule image avec le border-success
    if (lastClickedImage !== null) {
        $(lastClickedImage).addClass("border");
        $(lastClickedImage).addClass("border-dark");
        $(lastClickedImage).removeClass("border-success");
        $(lastClickedImage).css("border", "");
    }

    // Si l'image à le border-dark
    if ($(parentClicked).hasClass("border-dark")) {
        $(parentClicked).removeClass("border"); //on supprime la bordure
        $(parentClicked).removeClass("border-dark");
        $(parentClicked).addClass("border-success"); // On met une bordure verte avec 5px
        $(parentClicked).css("border", "5px solid");
    }

    lastClickedImage = parentClicked; // Je fait en sorte a ce que la variable parentCliked devienne lastClickedImage

    urlImageClicked = $(event.target).attr("src"); // Je récupère l'url de l'image cliquée
    idImageClicked = event.target.parentElement.id; // Je récupère l'id de l'image cliquée
});


// Lorsque je clique sur le boutton confirmer
$("#validationImage").on("click", function (event) {
    event.preventDefault();

    // Une fois l'image choisit on referme la bibliothèque
    $("#imageManager").toggleClass("d-none");

    // J'utilise une balise image qui à pour src urlImageClicked
    var balise = "<img src='" + urlImageClicked + "' style='width:100px' />";

    // Je fait passer aussi un input de type hidden pour récupèrer l'id de l'image
    balise += "<input type='hidden' name='imageMultimedia' value='" + idImageClicked + "' />";

    // J'envoi dans le fomrulaire dans la div qui à pour id resultat l'image pour l'affichage
    $("#resultat").html(balise);
});