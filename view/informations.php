<?php
    require_once "../model/functions.php";
    require_once "../model/connexion.php";

    $title = "Informations";

    include "header.php";
    include "nav.php";

    if(isConnected()){
        $req = "SELECT * FROM Information;";
        $results = mysqli_query($co,$req);
        while($ligne = mysqli_fetch_assoc($results)){
            $titre = $ligne["titre"];
            $date = date_format(date_create($ligne["dateCreation"]),"d/m/Y");
            $texte = $ligne["texte"];?>
            <div class="card" style="margin-bottom: 0">
                <div class="card-divider">
                    <h2><?=$titre?></h2>
                    <?=$date?>
                </div>
                <div class="card-section">
                    <?=$texte?>
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
