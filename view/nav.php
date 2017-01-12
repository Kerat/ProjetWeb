<?php require_once "../model/functions.php"; ?>
<div class="top-bar" id="menuHaut">
    <div class="top-bar-left" id="menuHautContenu">
        <?php
            if(isConnected()) echo "Vous êtes connecté.";
            else {
                echo "Vous n'êtes pas connecté.";
            }
        ?>
    </div>
    <div class="top-bar-right" id="menuHautContenu">
        <?php if(isConnected()): ?>
            <form action="../controler/deconnexion.php" method="post">
                <input class="button alert" type="submit" name="deconnexion" value="Déconnexion"/>
            </form>
        <?php endif ?>
    </div>
</div>
<div class="content">