<?php
require_once "../model/modeleDocument.php";
require_once "../model/functions.php";
require_once "../model/connexion.php";
session_start();

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 13/01/2017
 * Time: 14:05
 */
if (isConnected())
{
    if(isset($_POST['nomDocument']) && !empty ($_POST['nomDocument']))$titre=$_POST['nomDocument'];
    if(isset($_FILES['avatar']))
    {
        $dossier = '../upload/';
        $fichier = basename($_FILES['avatar']['name']);
        $name=$titre.'_'.$fichier;
        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier.$name)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo 'Upload effectue avec succes !';
        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo 'Echec de l\'upload !';
        }
        if($_SESSION['type']="candidat")
        {
            $doc=new Document($name.$_FILES['avatar']['name'], $_SESSION['id'], -1, 'upload/'.$name);
            $doc->ecritureBd($co);
        }
        else
        {
            $doc=new Document($name.'_'.$_FILES['avatar']['name'], -1, $_SESSION['id'], 'upload/'.$fichier);
            $doc->ecritureBd($co);
        }
    }
}
else
{
    echo "Vous n'avez pas la permission";
}
?>