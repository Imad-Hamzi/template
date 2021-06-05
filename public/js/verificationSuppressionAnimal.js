var btnSup = document.querySelector("#btnSup");

// Au click sur le boutton supprimer
btnSup.addEventListener("click", function () {

    // j'empêche la soumission du formulaire
    event.preventDefault();

    // je récupère le nom et l'id de l'animal
    var idAnimal = document.querySelector("#idAnimal").value;
    var nomAnimal = document.querySelector("#nom").value;

    // Ouverture d'une boîte de dialogue
    if (confirm("Voulez-vous supprimer l'animal " + idAnimal + " - " + nomAnimal + " ?")) {

        // si c'est true que l'utilisateur clique sur Ok on le redirige vers la page de suppression à laquelle j'ajoute dans l'url un parametre 
        // que je nomme sup qui à la valeur de l'id de l'animal
        document.location.href = "genererPensionnaireAdminSup&sup=" + idAnimal;
    }
});