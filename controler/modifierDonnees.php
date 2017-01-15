<?php
require_once "../model/connexion.php";
require_once "../model/modeleCandidat.php";
require_once "../model/modeleResponsable.php";
require_once "../model/functions.php";

session_start();

if (isConnected())
{
        $candidat = new Candidat($_SESSION['id'], $co,NULL);
        if (isset($_POST["tel"]) && !empty($_POST["tel"])) {
            $candidat->setTel($_POST["tel"]);
        }
        if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
            $candidat->setNom($_POST["nom"]);
        }
        if (isset($_POST["prenom"]) && !empty($_POST["prenom"])) {
            $candidat->setPrenom($_POST["prenom"]);
        }
        if (isset($_POST["email"]) && !empty($_POST["email"])) {
            $candidat->setEmail($_POST["email"]);
        }
        if (isset($_POST["loginInscription"]) && !empty($_POST["loginInscription"])) {
            $candidat->setLogin($_POST["loginInscription"]);
        }

        if (isset($_POST["mdpModif"]) && !empty($_POST["mdpModif"]) && isset($_POST["mdpModifConfirmation"]) && !empty($_POST["mdpModifConfirmation"])) {
            if ($_POST["mdpModif"] == $_POST["mdpModifConfirmation"]) {
                $candidat->setMdp($_POST['mdpModif']);
            } else {

                include_once('../view/formulaireModifierDonnees.html');
                die ("Mot de passes saisis non identiques");

            }
        }
        $candidat->ecrireModif($co);
        var_dump($candidat);
        echo "Nouvelles informations enregistrees";
        header("Location: ../view/index.php");
    }
    else die("Vous devez etre connecte");

 ?>