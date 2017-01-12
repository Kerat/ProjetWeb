<?php

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 12/01/2017
 * Time: 11:19
 */
class Entreprise
{
    private $id_ent;
    private $nom;
    private $desc;

    function __construct($name, $desc)
    {
        $this->nom=$name;
        $this->desc=$desc;
        $this->id_ent=NULL;
    }

    function ecritureBD($co)
    {
        mysqli_query($co, "INSERT OR UPDATE INTO Entreprise(id_entreprise, nom, description) VALUES ('$this->id_ent','$this->nom','$this->desc')");
        $this->id_ent=mysqli_insert_id();

    }

    function getNom()
    {
        return $this->name;
    }

}