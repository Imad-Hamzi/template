var btnSup = document.querySelector("#btnSup");

// Au click sur le boutton supprimer
btnSup.addEventListener("click", function () {

    // j'empêche la soumission du formulaire
    event.preventDefault();

    // je récupère la valeur de actualites(id) et son libellé(titre)
    var idActualite = document.querySelector("#actualites").value;
    var libelleActualite = document.querySelector("#titreActu").value;

    // Ouverture d'une boîte de dialogue
    if (confirm("Voulez-vous supprimer l'actualité " + idActualite + " - " + libelleActualite + " ?")) {

        // si c'est true que l'utilisateur clique sur Ok on le redirige vers la page de suppression à laquelle j'ajoute dans l'url un parametre 
        // que je nomme sup qui à la valeur de l'id de l'actualité
        document.location.href = "genererNewsAdminSup&sup=" + idActualite;
    }
});