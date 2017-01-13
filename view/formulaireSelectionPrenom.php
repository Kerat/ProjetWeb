<?php
/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 13/01/2017
 * Time: 15:38
 */
require_once "../model/modeleCandidat.php";
require_once "../model/modeleCandidat.php";
require_once "../model/connexion.php";
if (!empty($_POST['nom']))$top=$_POST['nom'];

?>

<form method="post"">
    <select  name="nom" onchange="this.form.submit()" size="3">
        <?php Candidat::afficherListeNom($co, $top);?>
    </select>
</form>
<?php if (isset($_POST['nom'])&&!empty($_POST['nom'])){?>
<form method="post" action="../controler/selectionCandidat.php">
    <select name="id_cand" size="3">
        <?php Candidat::afficherListePrenom($co, $_POST['nom'])?>
    </select>
</form>
<?php }?>