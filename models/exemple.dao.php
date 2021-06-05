<?php
require_once "pdo.php";

/*******************************************************************************
    Fonction qui permet de récupérer les actualités selon le type 
    et seulement 10 par 10 pour pagination
 *******************************************************************************/

function getActualitesFromBDTen($type,$premier,$parPage){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM actualite
    WHERE id_type_actualite = :type
    ORDER BY date_publication_actualite DESC 
    LIMIT :premier,:parPage
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":type",$type,PDO::PARAM_INT);
    $stmt->bindValue(":premier",$premier,PDO::PARAM_INT);
    $stmt->bindValue(":parPage",$parPage,PDO::PARAM_INT);

    $stmt->execute();
    $actualites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualites;
}

/*******************************************************************************
    Fonction qui me permet d'inserer une actualité dans la BDD
 *******************************************************************************/

function insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$image){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO actualite (libelle_actualite, contenu_actualite, date_publication_actualite, id_image, id_type_actualite)
    values (:titre, :contenu, :date, :image, :typeActualite)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":titre",$titreActu,PDO::PARAM_STR);
    $stmt->bindValue(":contenu",$contenuActu,PDO::PARAM_STR);
    $stmt->bindValue(":date",$date,PDO::PARAM_STR);
    $stmt->bindValue(":image",$image,PDO::PARAM_INT);
    $stmt->bindValue(":typeActualite",$typeActu,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    // Si c'est true c'est qu'on à pu entrer les données dans la BDD
    // Ces lignes sont utile pour indiquer à l'utilisateur si l'insertion est ok
    if($resultat >0) return true;
    else return false;
}

/*******************************************************************************
    Fonction qui permet de faire une mise à jour de l'actualité lors d'une modif
 *******************************************************************************/
 
function updateActualiteIntoBD($idActualite,$titreActu,$typeActu,$contenuActu,$idImage){
    $bdd = connexionPDO();
    $req = '
    update actualite
    set libelle_actualite = :libelle, contenu_actualite = :contenu, id_type_actualite = :type, id_image= :image
    where id_actualite = :idActualite
    ';
    $stmt = $bdd->prepare($req); 
    $stmt->bindValue(":libelle",$titreActu,PDO::PARAM_STR);
    $stmt->bindValue(":contenu",$contenuActu,PDO::PARAM_STR);
    $stmt->bindValue(":type",$typeActu,PDO::PARAM_INT);
    $stmt->bindValue(":image",$idImage,PDO::PARAM_INT);
    $stmt->bindValue(":idActualite",$idActualite,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    return false;
}

/*******************************************************************************
     Suppression d'une actualité en fonction de l'ID
 *******************************************************************************/

function deleteActuFromBD($idActualite){
    $bdd = connexionPDO();
    $req = '
    delete from actualite where id_actualite = :idActualite
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idActualite",$idActualite,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    return false;
}

