<?php
 function isConnected(){
    if(!isset($_SESSION) or empty($_SESSION["login"]) or empty($_SESSION["mdp"])){
        return false;
    }
    else{
        return true;
    }
}
?>