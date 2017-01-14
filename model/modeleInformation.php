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
    private $id_responsable;

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    function __construct2($title, $text)
    {
        $this->id_info=NULL;
        $this->dateCreation=date('Y-m-d');
        $this->titre=$title;
        $this->texte=$text;
    }
    function __construct3($title, $text, $idresp)
    {
        $this->id_info=NULL;
        $this->dateCreation=date('Y-m-d');
        $this->titre=$title;
        $this->texte=$text;
        $this->id_responsable=$idresp;
    }

    function ecritureBD($co)
    {
        mysqli_query($co, "INSERT INTO Information(titre, texte, dateCreation) VALUES ('$this->titre','$this->texte','$this->dateCreation')");
        $this->id_info=mysqli_insert_id($co);
        $req = mysqli_query($co, "INSERT INTO poste (id_responsable, id_utilisateur, id_information) VALUES ($this->id_responsable, -1, '$this->id_info')");

    }
}
?>