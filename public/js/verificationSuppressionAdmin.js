var btnSup = document.querySelector("#btnSup");

// Au click sur le boutton supprimer
btnSup.addEventListener("click", function () {

    // j'empêche la soumission du formulaire
    event.preventDefault();

    // je récupère la valeur du nom, prenom et l'id de l'admin
    var idAdmin = document.querySelector("#idAdmin").value;
    var nomAdmin = document.querySelector("#nom").value;
    var prenomAdmin = document.querySelector("#prenom").value;

    // Ouverture d'une boîte de dialogue
    if (confirm("Voulez-vous supprimer l'utilisateur Mr/Mme " + nomAdmin + " " + prenomAdmin + " ?")) {

        // si c'est true que l'utilisateur clique sur Ok on le redirige vers la page de suppression à laquelle j'ajoute dans l'url un parametre 
        // que je nomme sup qui à la valeur de l'id de l'admin
        document.location.href = "genererAdminAdminSup&sup=" + idAdmin;
    }
});