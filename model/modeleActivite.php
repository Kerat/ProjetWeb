<?php

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 12/01/2017
 * Time: 11:55
 */
class Activite
{
    private $id_activite;
    private $dateActivite;
    private $infos;
    private $offre;
    private $candidat;

    function __construct($dateAct, $infos, $offre, $candidat)
    {
        $this->id_activite=NULL;
        $this->dateActivite=$dateAct;
        $this->infos=$infos;
        $this->offre=$offre;
        $this->candidat=$candidat;

    }

    function ecritureBD($co)
    {
        mysqli_query($co, "INSERT OR UPDATE INTO Activite(id_activite, date_activite, infos, id_offre, id_candidat) VALUES ('$this->id_activite','$this->dateActivite','$this->infos','$this->offre->getID()','$this->candidat->getId()')");
        $this->id_activite=mysqli_insert_id();

    }

}
?>