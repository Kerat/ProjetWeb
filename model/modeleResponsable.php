<?php
require_once "User.php";
	class Responsable extends User{
		private $idResp;

		function modifierInfo($co, $id, $prenom, $nom, $mdp, $email) {
			$prenom = strip_tags($prenom);
			$nom = strip_tags($nom);
			$mdp = strip_tags($mdp);
			$email = strip_tags($email);
			mysqli_query($co, "UPDATE  Responsable SET prenom='$prenom', nom = '$nom', email = '$email', motDePasse = '$mdp' WHERE id_responsable = '$id'");
		}

		function inscription($co) {
			$req = mysqli_query($co, "INSERT INTO Responsable(id_responsable, nom, prenom, email, login, motDePasse) VALUES ('$this->idResp','$this->nom','$this->prenom','$this->email','$this->login','$this->mdp')");
			$this->idResp=mysqli_insert_id();
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
		public function getId()
		{
			return $this->idResp;
		}

		function connexion($co) {
			$succes= true;
			$req = mysqli_query($co, "SELECT * FROM Responsable WHERE login='$this->login' AND motDePasse= '$this->mdp'");
			if (mysqli_num_rows($req) != 1) {
				$succes = false;
			}
			else {
					$result = mysqli_fetch_assoc($req);
                    $this->idResp = $result['id_responsable'];
                    $this->prenom = $result['prenom'];
                    $this->nom = $result['nom'];
                    $this->email = $result['email'];
					session_start();
					$_SESSION['id'] = $this->idResp;
					$_SESSION['type'] = "responsable";
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
		}
	}
?>
