<?php
require_once "../model/connexion.php";
require_once "../model/modeleInformation.php";

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 13/01/2017
 * Time: 13:09
 */
if (isset($_SESSION['type'])&& ($_SESSION['type'])=="responsable")
{
    if (isset($_POST['titreMessage'])&&!empty($_POST['titreMessage']))$titre=$_POST['titreMessage'];
    if (isset($_POST['contenuMessage'])&&!empty($_POST['contenuMessage']))$contenu=$_POST['contenuMessage'];
    else
    {
        include_once ('../view/formulaireAjoutMessagePublic.html');
        die ("Vous n'avez pas rempli les deux champs");
    }

    $titre=$_POST['titreMessage'];
    $contenu=$_POST['contenuMessage'];
    $message=new Information($titre, $contenu, $_SESSION['id']);
    $message->ecritureBD($co);
}
else echo 'Vous n\'avez pas la permission'.'</br>';
