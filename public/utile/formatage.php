<?php 

// Fonction qui me permet d'afficher une alerte selon le type de l'alerte et d'y intègrer un text
function afficherAlert($text, $type){
    $alertType = "";
    if($type === ALERT_SUCCESS) $alertType = "success";
    if($type === ALERT_DANGER) $alertType = "danger";
    if($type === ALERT_INFO) $alertType = "info";
    if($type === ALERT_WARNING) $alertType = "warning";
    $txt = '<div class="alert alert-'.$alertType.' m-2" role="alert">';
    $txt .= ($alertType == 'success'? "<i class='fas fa-check'></i>" : "")." ".$text; 
    $txt .= '</div>';
    return $txt;
}
?>