<?php ob_start();  ?>

<div class="container">
    <!-- Si $alert n'est pas vide j'affiche le message qu'elle cointient -->
    <?php if($alert !== ""){ 
    echo afficherAlert($alert, ALERT_DANGER);
    } 
    ?>

    <form class="w-50 mx-auto mt-5" action="" method="POST">
        <label for="login" class="form-label">Login : </label>
        <input type="text" class="form-control mb-3" id="login" name="login" required />
        <label for="password" class="form-label">Password : </label>
        <input type="password" class="form-control mb-4" id="password" name="password" required />
        <button type="submit" class="btn btn-primary px-4 w-100">Valider</button>
    </form>

</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>