<?php
//  Je demarre la session dans l'index pour plus de simplicité
session_start();
$_SESSION['panier'] = session_id();

// require le controllers back et front pour faire appel au fonctions 
require_once "controllers/backend.controller.php";
require_once "controllers/frontend.controller.php";

// require la class securité pour gerer la variable page en cas d'injection sql ou autres
require_once "config/Securite.class.php";


// JE fait un switch sur la variable page que je passe dans la réecriture d'url
try {
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = Securite::secureHTML($_GET['page']);

        // Chaque case correspond en réalité à la variable $1 dans le .htacces, par sécurité je fait appel à la page accueil si aucune case ne correspond 
        switch ($page){
            case "accueil": getPageAccueil();
            break;
            case "page1": getPage1();
            break;
            case "page2": getPage2();
            break;
            case "page3": getPage3();
            break;
            case "page4": getPage4();
            break;
            case "connexion": getPageConnexion();
            break;
            case "pageBack": getPageBack();
            break;

            // case "error301":throw new Exception("Erreur 301 : Document déplacé de façon permanente.... " ); //redirection permanente
            // break;
            // case "error302":throw new Exception("Erreur 302: La syntaxe de la requête est erronée... " ); //redirection temporaire
            // break;
            // case "error400":throw new Exception("Erreur 400: Version HTTP non prise en charge... " ); //La syntaxe de la requête est erronée.
            // break;
            // case "error401":throw new Exception("Erreur 401: Une authentification est nécessaire pour accéder à la ressource... " ); //utilisateur non authentifié
            // break;
            // case "error402": throw new Exception("Erreur 402: Paiement requis pour accéder à la ressource... " );//Paiement requis pour accéder à la ressource.
            // break;
            // case "error405":throw new Exception("Erreur 405: Méthode de requête non autorisée..." ); //Méthode de requête non autorisée.
            // break;
            // case "error505": throw new Exception("Erreur 505: Version HTTP non gérée par le serveur... " );//Erreur interne du serveur.
            // break;
            // case "error500": throw new Exception("Erreur 500: Erreur interne du serveur... " ); //Version HTTP non gérée par le serveur.
            // break;
            // case "error403": throw new Exception("Erreur 403 : Vous n'avez pas le droit d'accéder à ce dossier...");  //accès refusé
            // break;
            // case "error404":
            default: throw new Exception("Erreur 404 : La page n'existe pas...");
        }
    } else {
        getPageAccueil();
    }

// Si j'ai des execeptions je les récupère dans le catch et j'envoi l'exeption dans la vue erreur.view.php
} catch(Exception $e){
    $title = "Erreur";
    $description = "Page de gestion des erreurs";
    $errorMessage = $e->getMessage();
    require "views/commons/erreur.view.php";
}


?>
