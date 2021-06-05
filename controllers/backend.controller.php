<?php
require_once "public/utile/formatage.php"; 
require_once "public/utile/gestionImage.php"; 
require_once "config/config.php";


/*********************************************************************
    Page de 
 *********************************************************************/

function getPageConnexion(){
    $title = "";
    $description = "";
    $type = "";
    $imagePage = "";
    $urlPage = "";
    $alert="";

    if($_POST){
        header('location:pageBack');
        $_SESSION['utilisateur'] = "utilisateur";
    }

    if(isset($_POST['deconnexion'])){
        unset($_SESSION['utilisateur']);
    }

    require_once "views/back/connexion.view.php";

}

function getPageBack(){
    $title = "";
    $description = "";
    $type = "";
    $imagePage = "";
    $urlPage = "";
    $alert="";

    require_once "views/back/pageBack.view.php";
}
