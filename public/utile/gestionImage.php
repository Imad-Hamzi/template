<?php

function tatoo($imageATatouer){
  // header ("Content-type: image/jpeg"); // L'image que l'on va créer est un jpeg
  
  // Récupération de l'extension de l'image
  $tab_ext = explode('.', $imageATatouer); 
  $extension  = strtolower($tab_ext[count($tab_ext)-1]);

  if($extension == "jpeg" || $extension == "jpg"){
  
  // On charge d'abord les images
  $source= imagecreatefromjpeg("public/sources/images/Autres/logoTatoo.jpg"); // Le logo est la source
  $destination= imagecreatefromjpeg($imageATatouer); // La photo est la destination
  
  
  // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
  $largeur_source = imagesx($source);
  $hauteur_source = imagesy($source);
  $largeur_destination = imagesx($destination);
  $hauteur_destination = imagesy($destination);
  
  // On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
  $destination_x = $largeur_destination - $largeur_source;
  $destination_y =  $hauteur_destination - $hauteur_source;
  ;
  // On met le logo (source) dans l'image de destination (la photo)
   imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
  
  // On affiche l'image de destination qui a été fusionnée avec le logo
  imagejpeg($destination, $imageATatouer);
  }
  }
  


function resize_img($image_path,$image_dest,$max_size = 300,$qualite = 80, $type1 = 'auto',$upload = false){
    
    // Vérification que l'image' existe
    if(!file_exists($image_path)):
      return 'wrong_path';
    endif;
  
    // Si le dossier de destination est vide je met l'image dans le dossier d'origine
    if($image_dest == ""):
      $image_dest = $image_path;
    endif;


    // Extensions et mimes autorisés
    $extensions = array('jpg','jpeg');
    $mimes = array('image/jpeg');
  
    // Récupération de l'extension de l'image
    $tab_ext = explode('.', $image_path); 
    $extension  = strtolower($tab_ext[count($tab_ext)-1]);
  
    // Récupération des informations de l'image sous forme de tableau l'index 0 contient la largeur et  l'index 1 contient la hauteur.
    $image_data = getimagesize($image_path);
  
    // Si c'est une image envoyé alors son extension est .tmp et on doit d'abord la copier avant de la redimentionner
    // if($upload && in_array($image_data['mime'],$mimes)):
    //   copy($image_path,$image_dest);
    //   $image_path = $image_dest;
  
    //   $tab_ext = explode('.', $image_path);
    //   $extension  = strtolower($tab_ext[count($tab_ext)-1]);
    // endif;
  
    // Test si l'extension et le mime sont autorisés
    if (in_array($extension,$extensions) && in_array($image_data['mime'],$mimes)):
      
      // On stocke les dimensions dans des variables
      $img_width = $image_data[0];
      $img_height = $image_data[1];
  
      // On vérifie quel coté est le plus grand
      if($img_width >= $img_height && $type1 != "height"):
  
        // Calcul des nouvelles dimensions à partir de la largeur
        if($max_size >= $img_width):
          return 'no_need_to_resize';
        endif;
  
        $new_width = $max_size;
        $reduction = ( ($new_width * 100) / $img_width );
        $new_height = round(( ($img_height * $reduction )/100 ),0);
  
      else:
  
        // Calcul des nouvelles dimensions à partir de la hauteur
        if($max_size >= $img_height):
          return 'no_need_to_resize';
        endif;
  
        $new_height = $max_size;
        $reduction = ( ($new_height * 100) / $img_height );
        $new_width = round(( ($img_width * $reduction )/100 ),0);
  
      endif;
  
      // Création de la ressource pour la nouvelle image
      $dest = imagecreatetruecolor($new_width, $new_height);
  
      // En fonction de l'extension on prépare l'iamge
      switch($extension){
        case 'jpg':
        case 'jpeg':
          $src = imagecreatefromjpeg($image_path); // Pour les jpg et jpeg
        break;
      }
  
      // Création de l'image redimentionnée
      if(imagecopyresampled($dest, $src, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height)):
        $logo ="../public/sources/images/Autres/logo2.png";
  
        // On remplace l'image en fonction de l'extension
        switch($extension){
          case 'jpg':
          case 'jpeg':
            imagejpeg($dest , $image_dest, $qualite); // Pour les jpg et jpeg
            // copylogo($logo,$dest);

          break;
        }
  
        return 'success';
        
      else:
        return 'resize_error';
      endif;
  
    else:
      return 'no_img';
    endif;
  }



// $file: fichier à uploder, $dir: repertoire dans lequel on mettre l'image, $nom: nom du fichier

function ajoutImage($file, $dir, $nom){


    if(!isset($file['name']) || empty($file['name']))
        throw new Exception("Vous devez indiquer une image");

        // On vérifie si on récupère une image car si cela nous retrourne false c'est que ce n'est pas une image. On vérifie cela dans le ficher temporaire $file["tmp_name"]
        if(!getimagesize($file["tmp_name"]))
        throw new Exception("Le fichier n'est pas une image");

    // On récupere l'extention de l'image avec pathinfo et l'option PATHINFO_EXTENSION. On met d'abord tout en minuscule
    $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));

    // On vérifie l'extension que l'on souhaite
    if($extension !== "jpg" && $extension !== "jpeg")
        throw new Exception("jpeg et jpg sont les seuls extensions autorisées");

    // On vérifie la taille de l'image 
    // if($file['size'] > 3145728)
    //     throw new Exception("Le fichier est trop gros");

    //On verifie si le repertoire existe, s'il n'existe pas on crée le repertoire avec mkdir et on donne le maximum de droit avec 0777
    if(!file_exists($dir)) mkdir($dir,0777);

    // Le chemin sera le repertoire avec le nom du fichier qui sera: 'le nom donné _ nom de la photo'
    $target_file = $dir. $nom . "_". $file['name'];
        // On vérifie que le fichier n'existe pas dèja
        if(file_exists($target_file))
        throw new Exception("Le fichier existe déjà");


    // On vérifie que le fichier $file['tmp_name'] à bien été téléchargé dans le repertoire $target_file
    if(!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");

    // Si le téléchargement fonctionne alors la fonction nous retourne le nom de l'image
    else return ($nom . "_". $file['name']);
}
