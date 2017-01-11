<?php
	class Candidat {
		private $id_cand;
		private $nom;
		private $prenom;
		private $dateNaissance;
		private $email;
		private $tel;
		private $login;
		private $mdp;
		private static $nbrCandidat=0;

		function __construct($prenom,$nom,$mdp,$mail,$dateNaissance) {
			$this->id_cand =Candidat::$nbrCandidat;
			$this->prenom = strip_tags($prenom);
			$this->nom = strip_tags($nom);
			$this->dateNaissance = strip_tags($dateNaissance);
			$this->email = strip_tags($mail);
			$this->tel = '';
			$this->login = strip_tags($prenom).strip_tags($nom);
			$this->mdp = strip_tags($mdp);

			Candidat::$nbrCandidat=Candidat::$nbrCandidat+1;
		}

		static function modifierInfo($co, $id, $prenom, $nom, $mdp, $email, $tel) {
			$prenom = strip_tags($prenom);
			$nom = strip_tags($nom);
			$mdp = strip_tags($mdp);
			$email = strip_tags($email);
			$tel = strip_tags($tel);
			$req = mysqli_query($co, "UPDATE  candidat SET prenom='$prenom', nom = '$nom', email = '$email', numeroTelephone = '$tel', motDePasse = '$mdp' WHERE id_candidat = '$id'");
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

		static function connexion($co, $login, $mdp) {
			$erreur = false;
			$req = mysqli_query($co, "SELECT * FROM candidat WHERE login='$login' AND motDePasse= '$mdp'");
			if (mysqli_num_rows($req) != 1) {
				$erreur = true;
			}
			else {
					$result = mysqli_fetch_assoc($req);
					session_start();
					$_SESSION['id'] = $result['id_candidat'];
					$_SESSION['type'] = "candidat";
					$_SESSION['login'] = $login;
					$_SESSION['mdp'] = $mdp;
					$_SESSION['prenom'] = $result['prenom'];
					$_SESSION['nom'] = $result['nom'];
					$_SESSION['email'] = $result['email'];
					$_SESSION['tel'] = $result['numeroTelephone'];
					
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
