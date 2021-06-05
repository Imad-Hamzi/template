<?php ob_start();  ?>
<div class="banner-fond position-relative">

</div>

<div class="my-3">
    <h3 class="text-center font-weight-bold mt-5"><?= $errorMessage ?></h3>
    <i class="fas fa-paw text-primary text-center d-block patte-chien fa-lg mb-4"></i>
</div>

<div class="container">

    <div class="text-center">
        <img class="img-fluid " src="public/sources/images/Autres/fond-erreur.png" alt="image d'erreur">
    </div>

</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>