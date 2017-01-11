<?php
	class Candidat extends user {
        private $idCand;
		private $dateNaissance;
		private $tel;

		function __construct($prenom,$nom,$mdp,$email,$dateNaissance) {
			parent::__construct5($prenom,$nom,$mdp,$email);
		    $this->idCand = NULL;
			$this->dateNaissance = strip_tags($dateNaissance);
			$this->tel = '';
		}

		function inscription($co) {
			$req = mysqli_query($co, "INSERT INTO candidat(id_candidat, nom, prenom, dateDeNaissance, email, numeroTelephone, login, motDePasse) VALUES ('$this->idCand','$this->nom','$this->prenom','$this->dateNaissance','$this->email','$this->tel','$this->login','$this->mdp')");
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
			$erreur = false;
			$req = mysqli_query($co, "SELECT * FROM candidat WHERE login='$this->login' AND motDePasse= '$this->mdp'");
			if (mysqli_num_rows($req) != 1) {
				$erreur = true;
			}
			else {
                $result = mysqli_fetch_assoc($req);
                $this->idCand = $result['id_candidat'];
                $this->prenom = $result['prenom'];
                $this->nom = $result['nom'];
                $this->email = $result['email'];
                $this->dateNaissance = $result["dateNaissance"];
                $this->tel = $result["tel"];

                session_start();
                $_SESSION['id'] = $this->idResp;
                $_SESSION['type'] = "responsable";
                $_SESSION['login'] = $this->login;
                $_SESSION['mdp'] = $this->mdp;
					
			}
			mysqli_free_result($req);

			return $erreur;
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
