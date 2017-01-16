<?php
$title="Ajouter candidats";
include "header.php";
include "nav.php";?>
<?php
if(!empty($_GET)){
    $erreur="";
    foreach ($_GET as $key=>$value){
        $erreur=$erreur.$key." : champs non renseigné !<br>";
    }
    echo "
<div class=\"alert callout\" data-closable>
  <h5>Attention !</h5>
  <p>".$erreur."</p>
  <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
}
?>
    <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Ajout simple</a></li>
        <li class="tabs-title"><a href="#panel2">Ajout multiple</a></li>
    </ul>
    <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1">
            <p>
            <form action="../controler/ajoutCandidats.php?mode=1" method="post">
                <label for="nom">Nom</label>
                <input type="text" name="nom" placeholder="Nom">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" placeholder="Prénom">
                <label for="email">Adresse electronique</label>
                <input type="email" name="email" placeholder="Adresse electronique">
                <input class="button" type="submit" value="Ajouter">
            </form>
            </p>
        </div>
        <div class="tabs-panel" id="panel2">
            <p>
            <form action="../controler/ajoutCandidats.php?mode=2" method="post">
                <label for="fichier">Fichier au format CSV</label>
                <input type="file" name="fichier">
                <input class="button" type="submit" value="Ajouter">
            </form>
            </p>
        </div>
    </div>
<?php include "footer.php";?>