<?php
require_once "../model/modeleCandidat.php";
require_once "../model/functions.php";
require_once "../model/connexion.php";
if(isset($_GET["mode"]) and !empty($_GET["mode"])){
    $mode = $_GET["mode"];
    if($mode==1){
        if(isset($_POST["nom"]) and !empty($_POST["nom"]))$nom=htmlentities($_POST["nom"]);
        else $erreur["Nom"];
        if(isset($_POST["prenom"]) and !empty($_POST["prenom"]))$prenom=htmlentities($_POST["prenom"]);
        else $erreur["Prenom"];
        if(isset($_POST["email"]) and !empty($_POST["email"]))$email=htmlentities($_POST["email"]);
        else $erreur["Email"];
        if(isset($erreur)){
            $postUrl = "?";
            foreach ($erreur as $key=>$value){
                $postUrl=$postUrl.$key."=1&";
            }
            header("Location: ../view/ajoutCandidats.php$postUrl");
        }
        $Ncandidat = new Candidat($nom,$prenom,(genMdp()),$email);
        $Ncandidat->inscriptionBienvenue($co);
        var_dump($Ncandidat);
    }
    elseif ($mode==2){
        echo "mode 2";
    }
    else{
        echo "Erreur mode non défini";
    }
}
else{
    echo "Erreur mode non défini";
}