<?php

class Securite {

/*******************************************************************************
     Sécurisation des données
*******************************************************************************/
public static function secureHTML($string){
    $string = trim($string); //va supprimer les espaces inutiles
    $string = stripslashes($string); //qui va supprimer les antislashes que certains hackers pourraient utiliser pour échapper des caractères spéciaux.
    $string = htmlspecialchars($string); // Convertit les caractères spéciaux en entités HTML
    return $string;
}

/*******************************************************************************
     Mise en place du cookie sécurisé et de la $_SESSION[COOKIE_PROTECT]
     Je génère un ticket de manière aléatoire que l'on va envoyer dans 
     les cookies de l'utilisateur lors de sa connexion et a chaque fois qu'il 
     voudra se connecter on verifira deux choses la session et que le
     cookie génèré correspond.
*******************************************************************************/

public static function genereCookiePassword(){

    // microtime()-> récupère la date et l'heure de l'action (timestamp)
    $ticket = session_id().microtime().rand(0,9999999);

    // On hache le ticket
    $ticket = hash("sha512", $ticket);

    // On génère le cookie COOKIE_PROTECT c'est la const dans config.php pdt 30 min qui est le nom du cookie, puis la valeur du cookie qui est le ticket
    setcookie(COOKIE_PROTECT, $ticket, time() + (60 * 30));

    // On génère une session que l'on va pouvoir comparer au cookie
    $_SESSION[COOKIE_PROTECT] = $ticket;

    }


/*******************************************************************************
     Je vérifie que le cookie correspond à la $_SESSION[COOKIE_PROTECT]
*******************************************************************************/

public static function verificationCookie(){

    // On vérifie que la session est crée et qu'elle est égale au cookie
    if(isset($_SESSION[COOKIE_PROTECT]) && isset($_COOKIE[COOKIE_PROTECT]) && $_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT]){
        Securite::genereCookiePassword();
        return true;
    } else {
        // Si c'est pas ok je detruis la session et je mets un message d'erreur
        session_destroy();
        header('Refresh: 3; URL=login');
        throw new Exception("Votre session a expiré. Veuillez vous reconnecter!");
        }

    }

/*******************************************************************************
     Accès global
*******************************************************************************/

public static function verifAccessSession(){
    return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && ($_SESSION['acces'] === "admin" || $_SESSION['acces'] === "professionnel de sante" || $_SESSION['acces'] === "benevole"));
}


/*******************************************************************************
     Accès administrateur
*******************************************************************************/

public static function verifAccessSessionAdmin(){
    return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && ($_SESSION['acces'] === "admin"));
}


/*******************************************************************************
     Accès professionnel de sante
*******************************************************************************/

public static function verifAccessSessionProfessionnel(){
    return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && ($_SESSION['acces'] ===  "professionnel de sante"));
}


/*******************************************************************************
     Accès benevole
*******************************************************************************/

public static function verifAccessSessionBenevole(){
    return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && ($_SESSION['acces'] === "benevole"));
}


/*******************************************************************************
     On verifie qu'on à les acces avec $_SESSION['acces']  
     et que le cookie est égale à $_SESSION[COOKIE_PROTECT]
*******************************************************************************/

public static function verificationAccess(){
    return (self::verifAccessSession() && self::verificationCookie());
}


/*******************************************************************************
     Gestion de la déconnexion
*******************************************************************************/

public static function deconnexion(){
    // Si le $_POST est déclaré et qu'il est égal a true(voir le formulaire dans le menu)
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){

        unset($_SESSION['acces']);
        header("Location: accueil");
    }
}


/*******************************************************************************
     Suppression des coups de coeurs
*******************************************************************************/

public static function viderListeCoeur(){
    // Si le $_POST est déclaré et qu'il est égal a true(voir le formulaire dans le menu)
    if(isset($_POST['viderListeCoeur']) && $_POST['viderListeCoeur'] === "true"){

        unset($_SESSION['coupDeCoeur']);
        setcookie("coupDeCoeur", " " , time() -3600*24*30);
        header('location:mon-coup-de-coeur');
    } 
}


}