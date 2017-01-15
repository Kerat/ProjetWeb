<form method="POST" action="../controler/ajoutDocument.php" enctype="multipart/form-data">
	<div>
	<input type="text" name="nomDocument" id="nomDocument" placeholder="Titre du document"/>
	<select>
		<option id="cv">CV</option>
		<option id="lettreMotivation">Lettre de motivation </option>
		<option id="attestation">Attestation de diplôme</option>
		<option id ="autre">Autre</option>
	</select>
	</div>
	<!-- On limite le fichier à 100Ko -->
	<input type="hidden" name="MAX_FILE_SIZE" value="100000">
	<input type="file" name="avatar">
	<input type="submit" name="envoyer" value="Envoyer le fichier">
</form>