<?php
function isConnected(){
    if(!isset($_SESSION) or empty($_SESSION["login"]) or empty($_SESSION["mdp"])){
        return false;
    }
    else{
        return true;
    }

    function dateFr2dateISO($dateFr){
        $date = DateTime::createFromFormat('d/m/Y', $dateFr);
        $dateISO = $date->format("Y-m-d");

        return $dateISO;
    }
}
?>