<?php 
/*******************************************************************************
     Constante que j'utilise pour le cookie
*******************************************************************************/

const COOKIE_PROTECT = "timer";

/*******************************************************************************
     Constante pour le type d'alerte que j'utilise dans formatage 
     avec la fonction afficherAlert
*******************************************************************************/
    // 
    const ALERT_SUCCESS = 1;
    const ALERT_DANGER = 2;
    const ALERT_INFO = 3;
    const ALERT_WARNING = 4;


/*******************************************************************************
    On definie une constante qu'on appel URL 
*******************************************************************************/

    define("URL",str_replace("index.php","", (isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
?>

