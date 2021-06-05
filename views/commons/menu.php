<nav>
    <ul class="d-flex inline-flex mt-3">
    <li class="mr-4"><a href="<?=URL?>accueil">ACCUEIL</a></li>
    <li class="mr-4"><a href="<?=URL?>page1">PAGE 1</a></li>
    <li class="mr-4"><a href="<?=URL?>page2">PAGE 2</a></li>
    <li class="mr-4"><a href="<?=URL?>page3">PAGE 3</a></li>
    <li class="mr-4"><a href="<?=URL?>page4">PAGE 4</a></li>

    <?php if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']=="utilisateur"){ ?>
            <li>
                <a class="mr-4" href="<?=URL?>connexion">
                 CONNEXION</a>
            </li>
            <?php } else { ?>
            <li>
                <form method="POST" action="">
                    <a href="<?=URL?>accueil" class=" mr-4"><input
                            type="submit" class="border-0 bg-light" value="DECONNEXION" />
                        <input type='hidden' name='deconnexion' value="true" />
                    </a></form>
            </li>
            <?php } ?>











    <?php if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur'] == "utilisateur"){ ?>
    <li class="mr-4"><a href="<?=URL?>pageBack">PAGE 1 BACK</a></li>
    <?php } ?>


    </ul> 
</nav>