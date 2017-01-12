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

    function __construct($nom, $candidat, $responsable)
    {
        $this->id_doc=NULL;
        $this->date_up=date('Y-m-d');
        $this->nom=$nom;
        $this->chemin=NULL;
        $this->statut=NULL;
        $this->candidat=$candidat;
        $this->responsable=$responsable;
    }

}