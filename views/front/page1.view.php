<?php
ob_start(); 
?>
<p class="my-5 text-primary">
PAGE 1 DU TEMPLATE MVC BY HAMZI
</p> 

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>