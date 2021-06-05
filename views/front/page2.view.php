<?php
ob_start(); 
?>
<p class="my-5 text-success">
PAGE 2 U TEMPLATE MVC BY HAMZI
</p> 

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>