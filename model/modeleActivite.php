<?php
require_once "../model/modeleOffre.php";
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

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    function __construct4($dateAct, $infos, $offre, $candidat)
    {
        $this->id_activite=NULL;
        $this->dateActivite=$dateAct;
        $this->infos=$infos;
        $this->offre=$offre;
        $this->candidat=$candidat;

    }
    function __construct2($co, $id_activite)
    {
        $req=mysqli_query($co, "SELECT * FROM activite WHERE id_activite='$id_activite';");
        while ($ligne=mysqli_fetch_assoc($req))
        {
            $this->id_activite=$id_activite;
            $this->dateActivite=$ligne["date_active"];
            $this->infos=$ligne["infos"];
            $this->candidat=$ligne["idcandidat"];
            $this->offre=$ligne["id_offre"];
        }
    }
    function ecritureBD($co)
    {
        mysqli_query($co, "INSERT OR UPDATE INTO Activite(id_activite, date_activite, infos, id_offre, id_candidat) VALUES ('$this->id_activite','$this->dateActivite','$this->infos','$this->offre->getID()','$this->candidat->getId()')");
        $this->id_activite=mysqli_insert_id();

    }

   public static function  afficheTableauActivite($id_cand, $co)
    {
        $req=mysqli_query($co, "SELECT infos, date_activite, id_offre FROM Activite WHERE id_candidat='$id_cand' ORDER BY id_offre;");
        while($ligne=mysqli_fetch_assoc($req))
        {
            echo '<tr>';
         echo '<td>'.$ligne["infos"].'</td>';
            echo '<td>'.$ligne["date_activite"].'</td>';
            echo '<td>'.$ligne["id_offre"].'</td>';
            offre::nomEntreprise($ligne["id_offre"], $co);
            echo '</tr>';
        }
    }
}
?>