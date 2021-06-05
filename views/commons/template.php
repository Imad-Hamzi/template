<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?= $description?>">
  <title><?= $title?></title>

  <!-- Manifest pour le PWA -->
  <link rel="manifest" href="<?= URL ?>manifest.json">
  <!-- Intégration de owl caroussel -->
  <link rel="stylesheet" href="<?= URL ?>public/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= URL ?>public/css/owl.theme.default.min.css">

  <!-- Intégration de Bootstrap -->
  <!-- <link href="<?= URL ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Intégration de mon fichier CSS -->
  <link href="<?= URL ?>public/css/main.css" rel="stylesheet" />

  <!-- Intégration de Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">

  <!-- Intégration de AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Mise en palce de l'icone -->
  <link rel="icon" type="image/png" href="<?= URL ?>public/sources/images/Autres/logo2.png" />


  <!-- open graph/ (penser a désindexer les pages du backoffice sur google tools) -->
  <meta property="fb:app_id" content="134101581921946" />
  <meta property="og:title" content="<?=$title?>" />
  <meta property="og:type" content="<?= $type?>" />
  <meta property="og:image" content="<?=$imagePage?>" />
  <meta property="og:url" content="<?=$urlPage?>" />
  <meta property="og:description" content="<?= $description?>" />

  <!-- card twitter -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@" />
  <meta name="twitter:creator" content="@" />




  <!-- Intégration de fontawesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Intégration de Jquery -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>


</head>

<body>
  <header>
    HEADER
    <?php include("views/commons/menu.php") ?>
  </header>


  <main>
    <?= $content ?>
  </main>

  <footer>
    <p class="mt-5">FOOTER</p> 
  </footer>

  <!-- JS perso -->
  <script src="<?=URL?>public/js/script_divers.js"></script>
  <script src="<?= URL ?>public/js/imageModal.js"></script>

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Bootsrap -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="<?= URL ?>public/bootstrap/js/bootstrap.js"> </script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
  </script>

  <!-- OWL carousel -->
  <script src="<?= URL ?>public/js/owl.carousel.js"></script>

</body>

</html>