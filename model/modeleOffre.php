<?php
	class Offre
	{
		private $id_offre;
		private $description;
		private $instructions;
		private $id_ent;

		function __construct()
		{
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this,$f='__construct'.$i)) {
				call_user_func_array(array($this,$f),$a);
			}
		}

		function __construct3($desc, $instructions, $idEnt)
		{
			$this->id_offre = NULL;
			$this->description = strip_tags($desc);
			$this->instructions = strip_tags($instructions);
			$this->id_ent = $idEnt;
		}


		function inscriptionBD($co)
		{
			$req = mysqli_query($co, "INSERT INTO Offre(id_offre, description, instructions) VALUES (NULL,'$this->description', '$this->instructions')");
			$this->id_offre = mysqli_insert_id($co);
			$req = mysqli_query($co, "INSERT INTO emisePar(id_offre, id_entreprise) VALUES ($this->id_offre, $this->id_ent)");


		}

		function getID()
		{
			return $this->id_offre;
		}
	}
