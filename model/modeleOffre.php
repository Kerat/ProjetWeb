<?php
	class Offre {
		private $id_offre;
		private $description;
		private $instructions;
		private $id_ent;

		function __construct($desc,$instructions, $id_ent) {
			$this->id_offre=NULL;
			$this->description = strip_tags($desc);
			$this->instructions = strip_tags($instructions);
			$this->$id_ent=strip_tags($id_ent);
		}


		function inscriptionBD($co) {
			$req = mysqli_query($co, "INSERT OR UPDATE INTO Offre(id_offre, description, instructions) VALUES ('$this->id','$this->description','$this->instructions')");
			$this->id_offre=mysqli_insert_id();
		}

		function getID()
		{
			return $this->id_offre;
		}
	}
?>
