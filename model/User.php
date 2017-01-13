<?php
class User
{
    protected $nom;
    protected $prenom;
    protected $email;
    protected $login;
    protected $mdp;

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    function __construct2($login, $mdp){
        $this->login = $login;
        $this->mdp = $mdp;
    }

    function __construct4($prenom,$nom,$mdp,$email)
    {
        $this->prenom = strip_tags($prenom);
        $this->nom = strip_tags($nom);
        $this->email = strip_tags($email);
        $this->login = strip_tags($prenom) . strip_tags($nom);
        $this->mdp = strip_tags($mdp);
    }

    function __construct5($prenom,$nom,$mdp,$email, $login){
        $this->login = $login;
        $this->prenom = strip_tags($prenom);
        $this->nom = strip_tags($nom);
        $this->email = strip_tags($email);
        $this->login = strip_tags($prenom) . strip_tags($nom);
        $this->mdp = strip_tags($mdp);
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }
    static function deconnexion() {
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['type']);
        unset($_SESSION['login']);
        unset($_SESSION['mdp']);
    }
}
?>