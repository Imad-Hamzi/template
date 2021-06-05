var btnSup = document.querySelector("#btnSup");

// Au click sur le boutton supprimer
btnSup.addEventListener("click", function () {

    // j'empêche la soumission du formulaire
    event.preventDefault();

    // je récupère l'id et le nom du soin
    var idSoin = document.querySelector("#idSoin").value;
    var nomSoin = document.querySelector("#nomSoin").value;

    // Ouverture d'une boîte de dialogue
    if (confirm("Voulez-vous supprimer le soin : " + nomSoin + " ?")) {

        // si c'est true que l'utilisateur clique sur Ok on le redirige vers la page de suppression à laquelle j'ajoute dans l'url un parametre 
        // que je nomme sup qui à la valeur de l'id du soin
        document.location.href = "genererSoinsAdminSup&sup=" + idSoin;
    }
});