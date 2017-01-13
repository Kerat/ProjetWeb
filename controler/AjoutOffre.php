<?php
require_once "../model/connexion.php";
require_once "../model/modelEntreprise.php";
require_once "../model/modeleOffre.php";

if(isset($_POST['descriptionPoste'])&&!empty($_POST['descriptionPoste']))$desc=$_POST['descriptionPoste'];
if(isset($_POST['instructionCandidat'])&&!empty($_POST['instructionCandidat']))$instr=$_POST['instructionCandidat'];
else
{
    include_once('../view/formulaireAjoutOffre.php');
    die ("Erreur : Vous n'avez pas renseignez les deux champs.");
}

if (isset($_POST['entreprise']) && ($_POST['entreprise']!=0))
{
    $idEntChoisi=$_POST['entreprise'];

    if (isset($instr, $desc))
    {
        $offre=new Offre($desc, $instr, $idEntChoisi);
        $offre->inscriptionBD($co);
        echo "Offre cree";
    }
}
elseif (isset($_POST['nomSociete'])&&!empty($_POST['nomSociete']))
{
    $entreprise= new Entreprise (strip_tags($_POST['nomSociete']));
    $entreprise->ecritureBD($co);
}
else
{
    include_once('../view/formulaireAjoutOffre.php');
    die ("Vous n'avez pas renseignez d'entreprise");
}
?>