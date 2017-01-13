<?php

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 12/01/2017
 * Time: 12:33
 */
class Document
{
    private $id_doc;
    private $nom;
    private $date_up;
    private $chemin;
    private $statut;
    private $candidat;
    private $responsable;

    function __construct($nom, $id_candidat, $id_responsable, $chemin)
    {
        $this->id_doc = NULL;
        $this->date_up = date('Y-m-d');
        $this->nom = $nom;
        $this->chemin = $chemin;
        $this->statut = 0;
        $this->candidat = $id_candidat;
        $this->responsable = $id_responsable;
    }


    function ecritureBD($co)
    {
        $req = mysqli_query($co, "INSERT INTO Document VALUES (NULL, '$this->nom', '$this->date_up', '$this->chemin', '$this->statut', '$this->candidat', -1, '$this->responsable', -1)");
    }
}
?>