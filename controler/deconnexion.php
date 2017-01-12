<?php
    require_once "../model/User.php";
    session_start();
    /*switch ($_SESSION["type"]){
        case "candidat":
            $user = new Candidat($_SESSION["login"],$_SESSION["mdp"]);
            break;
        case "responsable":
            $user = new Responsable($_SESSION["login"],$_SESSION["mdp"]);
            break;
    }*/
    User::deconnexion();
    header("Location: ../view/index.php");
?>