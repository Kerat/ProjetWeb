<?php
require_once "User.php";
	class Candidat extends User {
        private $idCand;
		private $dateNaissance;
		private $tel;

		function __construct()
		{
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this,$f='__construct'.$i)) {
				call_user_func_array(array($this,$f),$a);
			}
		}

		function __construct5($prenom,$nom,$mdp,$email,$dateNaissance) {
			parent::__construct($prenom,$nom,$mdp,$email);
		    $this->idCand = NULL;
			$this->dateNaissance = strip_tags($dateNaissance);
			$this->tel = '';
		}
		function getId()
		{
			return $this->idCand;
		}

		function inscription($co) {

				$req = mysqli_query($co, "INSERT INTO candidat(id_candidat, nom, prenom, dateDeNaissance, email, numeroTelephone, login, motDePasse) VALUES ('$this->idCand','$this->nom','$this->prenom','$this->dateNaissance','$this->email','$this->tel','$this->login','$this->mdp')");
				$this->idCand=mysqli_insert_id();
		}
		function inscriptionBienvenue($co) {
			$req = mysqli_query($co, "INSERT INTO candidat(nom, prenom, dateDeNaissance, email, login, motDePasse, genre) VALUES ('$this->nom','$this->prenom','$this->dateNaissance','$this->email','$this->login','$this->mdp')");
		}
		static function afficherLogin($co) {
      $req = mysqli_query($co, 'SELECT id_candidat, login FROM candidat');
  		if (mysqli_num_rows($req) > 0) {
  			while($donnees = mysqli_fetch_assoc($req)) {
          ?><option value="<?php echo $donnees['id_candidat'] ?>"><?php echo $donnees['login'] ?></option><?php
        }
      }
      mysqli_free_result($req);
    }

		function connexion($co) {
			$succes = true;
			$req = mysqli_query($co, "SELECT * FROM Candidat WHERE login='$this->login' AND motDePasse= '$this->mdp'") OR DIE("Candidat : Erreur requete connexion.");
			if (mysqli_num_rows($req) != 1) {
				$succes = false;
			}
			else {
                $result = mysqli_fetch_assoc($req);
                $this->idCand = $result['id_candidat'];
                $this->prenom = $result['prenom'];
                $this->nom = $result['nom'];
                $this->email = $result['email'];
                $this->dateNaissance = $result["dateDeNaissance"];
                $this->tel = $result["numeroTelephone"];

                session_start();
                $_SESSION['id'] = $this->idCand;
                $_SESSION['type'] = "candidat";
                $_SESSION['login'] = $this->login;
                $_SESSION['mdp'] = $this->mdp;
					
			}
			mysqli_free_result($req);

			return $succes;
		}

		static function deconnexion() {
			session_destroy();
			unset($_SESSION['id']);
			unset($_SESSION['type']);
			unset($_SESSION['login']);
			unset($_SESSION['mdp']);
			unset($_SESSION['prenom']);
			unset($_SESSION['nom']);
			unset($_SESSION['email']);
			unset($_SESSION['tel']);			
		}
	}
?>
