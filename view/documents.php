<?php
require_once "../model/functions.php";
require_once "../model/connexion.php";

$title = "Consulter mes documents";

include "header.php";
include "nav.php";

if(isConnected()){?>
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
    <?php $req = "SELECT * FROM Document WHERE id_candidat = ".$_SESSION['id']." ORDER BY id_document DESC;";
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
    <?php include "footer.php";
}
else{
    header("Location: index.php");
}
?>