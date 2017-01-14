<?php
session_start();
require_once "../model/connexion.php";
require_once "../model/modeleInformation.php";
require_once "../model/functions.php";

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 13/01/2017
 * Time: 13:09
 */
if (isConnected())
{
    if (isset($_SESSION['type'])&& ($_SESSION['type'])=="responsable")
    {
        if (isset($_POST['titreMessage'])&&!empty($_POST['titreMessage']))$titre=$_POST['titreMessage'];
        if (isset($_POST['contenuMessage'])&&!empty($_POST['contenuMessage']))$contenu=$_POST['contenuMessage'];
        else
        {
            include_once ('../view/formulaireAjoutMessagePublic.html');
            die ("Vous n'avez pas rempli les deux champs");
        }

        $titre=htmlentities($_POST['titreMessage']);
        $contenu=htmlentities($_POST['contenuMessage']);
        $message=new Information($titre, $contenu, $_SESSION['id']);
        $message->ecritureBD($co);
        header("Location: ../view/informations.php");
    }
    else echo 'Vous n \'avez pas la permission'.'</br>';
}
else
{
    die("Vous devez etre connecte");
}

?>