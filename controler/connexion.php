<?php
    require_once "../model/connexion.php";
    require_once "../model/modeleCandidat.php";
    require_once "../model/modeleResponsable.php";

    if(!isset($_POST["id_Connexion"]) or empty($_POST["id_Connexion"]))$errors["id_Connexion"]=1;
    if(!isset($_POST["password"]) or empty($_POST["password"]))$errors["password"]=1;

    if(empty($errors) && !isset($errors)){
        $login = htmlentities($_POST["id_Connexion"]);
        $mdp = htmlentities($_POST["password"]);
        $candidat = new Candidat($login,$mdp);
        if($candidat->connexion($co)){
            header("Location: ../view/informations.php");
        }
        else{
            unset($candidat);
            $responsable = new Responsable($login,$mdp);
            if($responsable->connexion($co)){
                echo "OK responsable";
            }
            else{
                header("Location: ../view/index.php");
            }
        }
    }
    var_dump($_SESSION);
?>