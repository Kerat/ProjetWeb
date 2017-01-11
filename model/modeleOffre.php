<?php
	class Offre {
		private $id_offre;
		private $description;
		private $instructions;

		function __construct($desc,$instructions) {
			$this->description = strip_tags($desc);
			$this->instructions = strip_tags($instructions);
			mysqli_query($co, "INSERT OR UPDATE INTO Offre(description, instructions) VALUES ('$this->description','$this->instructions')");
			$this->id_offre=mysqli_insert_id();
		}


		function miseAjourBD($co) {
			$req = mysqli_query($co, "INSERT OR UPDATE INTO Offre(description, instructions) VALUES ('$this->id','$this->description','$this->instructions')");
		}
	}
?>
