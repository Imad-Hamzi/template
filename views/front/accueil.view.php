<?php ob_start();?>

<p class="my-5 text-info">
CONTENU DE LA PAGE D'ACCUEIL DU TEMPLATE MVC BY HAMZI
</p> 


<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>