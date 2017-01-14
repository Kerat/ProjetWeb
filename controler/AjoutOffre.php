<?php
require_once "../model/connexion.php";
require_once "../model/modelEntreprise.php";
require_once "../model/modeleOffre.php";

    if(isset($_POST['descriptionPoste'])&&!empty($_POST['descriptionPoste']))$desc=$_POST['descriptionPoste'];
    else
    {
        include_once('../view/formulaireAjoutOffre.php');
        die ("Erreur : Vous n'avez pas renseignez les deux champs.");
    }
    if(isset($_POST['instructionCandidat'])&&!empty($_POST['instructionCandidat']))$instr=$_POST['instructionCandidat'];
    else
    {
        include_once('../view/formulaireAjoutOffre.php');
        die ("Erreur : Vous n'avez pas renseignez les champs description et instructions.");
    }

    if (isset($_POST['entreprise']) && ($_POST['entreprise']!=0))
    {
        $idEntChoisi=htmlentities($_POST['entreprise']);
    }
    elseif(isset($_POST['nomSociete'])&&!empty($_POST['nomSociete']))
    {
        $entreprise= new Entreprise (strip_tags($_POST['nomSociete']));
        $entreprise->ecritureBD($co);
        $idEntChoisi=$entreprise->getIdEnt();
    }
    if (isset($instr, $desc,$idEntChoisi)){
        $offre=new Offre($desc, $instr, $idEntChoisi);
        $offre->inscriptionBD($co);
        header("Location: ../view/offres.php");
    }
    else
    {
        include_once('../view/formulaireAjoutOffre.php');
        die ("Vous n'avez pas renseignez tous les champs");
    }
?>