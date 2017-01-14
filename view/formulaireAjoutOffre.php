<?php require_once "../model/modelEntreprise.php";
require_once "../model/connexion.php";
require_once "../model/modeleOffre.php";
?>

<form method ="Post" action=../controler/AjoutOffre.php style="margin: 10px">

	<div class="field-wrapper">

		<div class="field">

			<label>Parcourir entreprises:</label>
			<select name="entreprise">
				<option value="0" selected="selected">Sélectionner</option>
				<?php Entreprise::afficherListe($co);?>
			</select>
			<label for="nomSociete">ou</label>
			<input type="text" name="nomSociete" id="nomSociete" placeHolder="Saisir une nouvelle entreprise"/>
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

	<input class="button" type="submit" value="Valider"/>
</form>
