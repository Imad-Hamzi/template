<?php
// Fichier qui contient les constantes
require "config.models.php";

/*******************************************************************************
    Connection à la base de données avec PDO
*******************************************************************************/

function connexionPDO(){
    $bdd = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME.";charset=utf8",USER_NAME,PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $bdd;
}































