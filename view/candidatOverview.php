<?php
require_once "../model/functions.php";
require_once "../model/modeleCandidat.php";
require_once "../model/connexion.php";
$title="Consulter la liste des candidats";

include "header.php";
include "nav.php";
if (isset($_POST['nom']) && !empty ($_POST['nom']))$nom=$_POST['nom'];
if (isset($_POST['id_cand']) && !empty ($_POST['id_cand']))$idCand=$_POST['id_cand'];
if (!empty($_POST['nom']))$top=$_POST['nom'];
?>
<form method="post" name="1" style="background-color: #eee">
    <select  name="nom" onchange="document.forms['1'].submit();">
        <option value="-1"> Selectionner un nom</option>
        <?php Candidat::afficherListeNom($co, $nom);?>
    </select>
    <select name="id_cand" onchange="document.forms['1'].submit();">
        <option value="-1"> Selectionner un prenom</option>
        <?php Candidat::afficherListePrenom($co, $nom);?>

    </select>

</form>


<?php
        if(!empty($_POST['id_cand'])&&($_POST['id_cand']>0)){ $id_cand=$_POST['id_cand']; $cand=new Candidat($_POST['id_cand'], $co, NULL);
            $tel=$cand->getTel();
            ?>
    <div class="card-divider" style="background-color: #eee">
            <table>
                <thead>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Telephone</th>

                </thead>
                <tbody>
                <tr>
                    <td><?php echo $cand->getPrenom();?></td>
                    <td><?php echo $cand->getNom();?></td>
                    <td><?php echo $cand->getEmail();?></td>
                    <td><?php echo $cand->getTel();?></td>

                </tr>
                </tbody>
            </table>
        </div>
        <div class="card-section">
                <h3>Documents</h3>
            </div>
            <div class="card">

    <table>
        <thead>
        <tr>
            <th width="80%">Nom</th>
            <th>Statut</th>
            <th>Date</th>
            <th>Télécharger</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $req = "SELECT * FROM Document WHERE id_candidat='$id_cand';";
        $results = mysqli_query($co,$req);
        while($ligne = mysqli_fetch_assoc($results)){
            $nom = $ligne["nom"];
            $statut = $ligne["statut"];
            $date = date_format(date_create($ligne["dateUpload"]),'d/m/Y');?>
            <tr>
                <td><?=$nom?></td>
                <td><?=$statut?></td>
                <td><?=$date?></td>
                <td><a href="">Ouvrir</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
    <?php } include "footer.php";
?>