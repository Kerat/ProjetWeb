<?php
	class Responsable {
		private $idResp;
		private $nom;
		private $prenom;
		private $email;
		private $login;
		private $mdp;

		function __construct($prenom,$nom,$mdp,$email) {
			$this->idResp = NULL;
			$this->prenom = strip_tags($prenom);
			$this->nom = strip_tags($nom);
			$this->email = strip_tags($email);
			$this->login = strip_tags($prenom).strip_tags($nom);
			$this->mdp = strip_tags($mdp);
		}

		static function modifierInfo($co, $id, $prenom, $nom, $mdp, $email) {
			$prenom = strip_tags($prenom);
			$nom = strip_tags($nom);
			$mdp = strip_tags($mdp);
			$email = strip_tags($email);
			$req = mysqli_query($co, "UPDATE  Responsable SET prenom='$prenom', nom = '$nom', email = '$email', motDePasse = '$mdp' WHERE id_responsable = '$id'");
		}

		function inscription($co) {
			$req = mysqli_query($co, "INSERT INTO Responsable(id_responsable, nom, prenom, email, login, motDePasse) VALUES ('$this->idResp','$this->nom','$this->prenom','$this->email','$this->login','$this->mdp')");
		}
		
		static function afficherLogin($co) {
			$req = mysqli_query($co, 'SELECT id_responsable, login FROM Responsable');
			if (mysqli_num_rows($req) > 0) {
				while($donnees = mysqli_fetch_assoc($req)) {
					?><option value="<?php echo $donnees['id_responsable'] ?>"><?php echo $donnees['login'] ?></option><?php
				}
			}
			mysqli_free_result($req);
		}

		static function connexion($co, $login, $mdp) {
			$erreur = false;
			$req = mysqli_query($co, "SELECT * FROM Responsable WHERE login='$login' AND motDePasse= '$mdp'");
			if (mysqli_num_rows($req) != 1) {
				$erreur = true;
			}
			else {
					$result = mysqli_fetch_assoc($req);
					session_start();
					$_SESSION['id'] = $result['id_responsable'];
					$_SESSION['type'] = "responsable";
					$_SESSION['login'] = $login;
					$_SESSION['mdp'] = $mdp;
					$_SESSION['prenom'] = $result['prenom'];
					$_SESSION['nom'] = $result['nom'];
					$_SESSION['email'] = $result['email'];
					
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
		}
	}
?>
