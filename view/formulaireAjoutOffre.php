<?php require_once "../model/modeleOffre.php";
require_once "../model/connexion.php";
?>

<link rel="stylesheet" type="text/css" href="../styles/form.css">

<form method ="Post" action=#>

	<div class="field-wrapper">

		<div class="field">
			<label for="nomSociete">Nom de la société : </label>
			<input type="text" name="nomSociete" id="nomSociete"/>
		</div>
		<div>
			<select>
				<?php Offre::afficherListe($co);?>
			</select>
		</div>

		<div class="field">
			<label for="descriptionPoste" >Description du poste: </label> <br/>
			<textarea cols="30" rows="8" id="descriptionPoste" name="descriptionPoste"></textarea>
		</div>

		<div class="field">
			<label for="instructionCandidat" >Instruction pour candidater: </label> <br/>
			<textarea cols="30" rows="8" id="instructionCandidat" name="instructionCandidat"></textarea>
		</div>

		<div class="field">

		</div>

		<div class="field upload">
			<label for="file-upload" class="custom-file-upload">Ajouter un fichier...</label>
			<input id="file-upload" type="file"/>
		</div>

	</div>

	<div class="button valider">
		<input type="submit" value="Valider"/>
	</div>


</form>
