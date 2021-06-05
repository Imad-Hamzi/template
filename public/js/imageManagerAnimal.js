var imgToDel = [];

// Je récupere les images au click
$("#imageOfAnimal img").on("click", function (event) {

    //Si l'image sur laquelle je clique à la class border-danger
    //On supprime la class border-danger ansi que le style css 5px solid
    if ($(this).hasClass("border-danger")) {

        $(this).removeClass("border-danger");
        $(this).css("border", "");

        // Si je supprime le border-danger il faut enlever l'id de l'image dans imgToDel
        // pour cela je dois trouver la position de l'image dans imgToDel
        var pos = imgToDel.indexOf(event.target.id);
        // On supprime l'image en fonction de la position, le 1 signifie 1 seul element a supprimer
        imgToDel.splice(pos, 1);
    } else {
        // Si l'image n'a pas la class alors on lui rajoute et on met un style css
        $(this).addClass("border-danger");
        $(this).css("border", "5px solid");
        // On ajoute dans imageToDel l'id de l'image
        imgToDel.push(event.target.id);
    }

    // Je fait en sorte d'avoir dans listeImage la liste des id a supprimer 
    // car imgToDel est un tableau. On aura dans listeImage 3-2-56-4
    var listeImage = "";
    for (var i = 0; i < imgToDel.length; i++) {
        listeImage += imgToDel[i];
        if (i < imgToDel.length - 1) listeImage += "-";
    }
    // J'insére dans le formulaire les images à supprimer
    $("#imgToDelete").val(listeImage);
});

// J'ajoute 2events sur le champs nbImage 
$("#nbImage").on("keyup click", function () {
    var nbImage = $(this).val(); //Je récupère la valeur que l'utilisateur tape 
    var input = "";

    // Je génère les input en fonctions de la valeur de nbImage
    for (var i = 0; i < nbImage; i++) {
        input += "<input type='File' name='image" + i + "' id='image" + i + "' /> <br />";
    }

    // Je met dans ce champs la variable input
    $("#imageToAdd").html(input);
});