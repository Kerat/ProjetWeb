<?php
    require_once "../model/functions.php";
    require_once "../model/connexion.php";

    $title = "Consulter les offres";

    include "header.php";
    include "nav.php";

    if(isConnected()){
        if(isResponsable()):
            ?>
            <div style="background-color: #eee;text-align: left">
                <form action="../view/ajoutOffre.php" method="post">
                    <input class="button" type="submit" name="ajoutOffre" value="Ajouter une offre"/>
                </form>
            </div>
            <?php
        endif;
        $req = "SELECT * FROM Offre ORDER BY id_offre DESC;";
        $results = mysqli_query($co,$req);
        while($ligne = mysqli_fetch_assoc($results)){
            $req2 = "SELECT nom FROM Entreprise WHERE id_entreprise = (SELECT id_entreprise FROM emisePar WHERE id_offre = ".$ligne["id_offre"].");";
            $entreprise=mysqli_fetch_assoc(mysqli_query($co,$req2))["nom"];
            $description = $ligne["description"];
            $instructions = $ligne["instructions"];?>
            <div class="card" style="margin-bottom: 0">
                <div class="card-divider">
                    <h2><?=$description?></h2>
                    <span style="text-align: right"><?=$entreprise?></span>
                </div>
                <div class="card-section">
                    <?=$instructions?>
                </div>
            </div>
            <div style="background-color: #eee;height: 1em"></div>
            <?php
        }
        include "footer.php";
    }
    else{
        header("Location: index.php");
    }
?>
