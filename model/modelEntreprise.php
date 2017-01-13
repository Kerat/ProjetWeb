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

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    function __construct2($name, $desc)
    {
        $this->nom=$name;
        $this->desc=$desc;
        $this->id_ent=NULL;
    }
    function __construct1($name)
    {
        $this->nom=$name;
        $this->desc="";
        $this->id_ent=NULL;
    }

    function ecritureBD($co)
    {
        mysqli_query($co, "INSERT INTO Entreprise(id_entreprise, nom, description) VALUES (NULL, '$this->nom', '$this->desc')");
        echo mysqli_affected_rows($co);
        $this->id_ent=mysqli_insert_id($co);
        echo "entreprise ici";

    }

    function getNom()
    {
        return $this->name;
    }
    public static function afficherListe($co)
    {
        $req = mysqli_query($co, "SELECT id_entreprise, nom FROM Entreprise");
        while ($data = mysqli_fetch_array($req)) {
            echo '<option value='.$data["id_entreprise"].'>' . $data["nom"] . '</option><br/>';
        }
    }
}