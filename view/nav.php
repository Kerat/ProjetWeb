<?php
require_once "../model/functions.php";

if(isConnected()){
    $connect = true;
    switch ($_SESSION["type"]){
        case "candidat":
            $menu=array("Informations"=>"informations.php","Offres"=>"offres.php","Connecté comme candidat"=>"");
            break;
        case "responsable":
            $menu=array("Connecté comme responsable"=>"");
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
            <form action="../controler/deconnexion.php" method="post">
                <input class="button alert" type="submit" name="deconnexion" value="Déconnexion"/>
            </form>
        <?php endif ?>
    </div>
</div>
<div class="content">