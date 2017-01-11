<?php
	class Offre {
		private $id_offre;
		private $description;
		private $instructions;

		private static $nbrOffre=0;

		function __construct($desc,$instructions) {
			Offre::$nbrOffre=Offre::$nbrOffre+1;
			$this->id_offre = Offre::$nbrOffre;
			$id=Offre::$nbrOffre;
			$this->description = strip_tags($desc);
			$this->instructions = strip_tags($instructions);
			mysqli_query($co, "INSERT OR UPDATE INTO Offre(description, instructions) VALUES ('$id','$this->description','$this->instructions')");

		}


		function miseAjourBD($co) {
			$req = mysqli_query($co, "INSERT OR UPDATE INTO Offre(description, instructions) VALUES ('$this->id','$this->description','$this->instructions')");
		}
	}
?>
