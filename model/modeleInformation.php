<?php

/**
 * Created by PhpStorm.
 * User: Francois
 * Date: 12/01/2017
 * Time: 11:48
 */
class Information
{
    private $id_info;
    private $titre;
    private $texte;
    private $dateCreation;

    function __construct($title, $text)
    {
        $this->id_info=NULL;
        $this->dateCreation=date('Y-m-d');
        $this->titre=$title;
        $this->texte=$text;
    }

    function ecritureBD($co)
    {
        mysqli_query($co, "INSERT OR UPDATE INTO Information(id_information, titre, texte, dateCreation) VALUES ('$this->id_info','$this->titre','$this->texte','$this->dateCreation')");
        $this->id_info=mysqli_insert_id($co);
    }

}