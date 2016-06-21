
<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Enregistrer vos Recettes</span><br>
	</div>
</div>
<form name="formulaire_finance" onSubmit="return verification_formulaire_finance()" method="post" action="traitement_enregistrer_recette.php" class="text">
	<fieldset>
		<legend>Saisir et valider les recettes</legend>
		<table border="1" class="table">
			<tr>
				<th style="background:#094963;color:#fff;">Date</th>
				<th style="background:#094963;color:#fff;">Abreuvoir</th>
				<th style="background:#094963;color:#fff;">Potence</th>
				<th style="background:#094963;color:#fff;">Divers</th>
				<th style="background:#094963;color:#fff;">Notes</th>
			</tr>
			<tr>
				<td><input type="text" size="10" name="date" class="calendrier"/></td>
				<td><input type="text" size="10" name="abreuvoir"/></td>
				<td><input type="text" size="10" name="potence"/></td>
				<td><input type="text" size="10" name="divers"/></td>
				<td><textarea name="note" cols="10" rows="1"></textarea></td>
			</tr>
		</table><br/>
	<center><input type="submit" value="Enregistrer"/></center>
	</fieldset>
</form>

