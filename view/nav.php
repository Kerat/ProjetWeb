<?php
require_once "../model/functions.php";

if(isConnected()){
    $menu=array("Informations"=>"informations.php","Offres"=>"offres.php");
    $connect = true;
    switch ($_SESSION["type"]){
        case "candidat":
            $menu["Mes documents"]="documents.php";
            $menu["Connecté comme candidat"]="";
            break;
        case "responsable":
            $menu["Connecté comme responsable"]="";
            break;
        default:
            $menu=array();
            break;
    }
}
else {
    $connect=false;
    $menu=array();
    $message="Vous n'êtes pas connecté.";
}
?>
<div class="top-bar" id="menuHaut" style="height: 65px">
    <div class="top-bar-left" id="menuHautContenu">
        <?php if($connect):?>
        <ul class="menu">
            <?php
            foreach($menu as $item => $url){
                echo "<li><a href='$url'>$item</a></li>";
            }
            ?>
        </ul>
        <?php else :
            echo $message;
        endif ?>
    </div>
    <div class="top-bar-right" id="menuHautContenu" style="text-align: right">
        <?php if($connect): ?>
            <?php if(!isResponsable()): ?>
                <a class="button" href="modifInfos.php">Éditer profil</a>
            <?php endif ?>
            <a class="button alert" href="../controler/deconnexion.php">Déconnexion</a>
        <?php endif ?>
    </div>
</div>
<div class="content">