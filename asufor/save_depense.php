
<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Enregistrer vos Dépenses</span><br>
	</div>
</div>
<form name="formulaire_finance" onSubmit="return verification_formulaire_finance()" method="post" action="traitement_enregistrer_depense.php" class="text">
	<fieldset>
		<legend>Saisir les dépenses</legend>
		<table border="1" class="table">
	<tr>
		<th style="background:#094963;color:#fff;">Date</th>
		<th style="background:#094963;color:#fff;">Gazoil</th>
		<th style="background:#094963;color:#fff;">Electricité</th>
		<th style="background:#094963;color:#fff;">Entretien</th>
		<th style="background:#094963;color:#fff;">Divers</th>
		<th style="background:#094963;color:#fff;">Notes</th>
	</tr>
	<tr>
		<td><input type="text" size="10" name="date" class="calendrier"/></td>
		<td><input type="text" size="10" name="gazoil"/></td>
		<td><input type="text" size="10" name="electricite"/></td>
		<td><input type="text" size="10" name="entretien"/></td>
		<td><input type="text" size="10" name="divers"/></td>
		<td><textarea name="note" cols="10" rows="1"></textarea></td>
	</tr>
	<tr><th colspan="7" style="background:#094963;color:#fff;">Salaires</th></tr>
	<tr><th colspan="2">Conducteur</th><th colspan="2">Gérant</th><th colspan="2" >Releveur</th></tr>
	<tr><td colspan="2"><input type="text" size="20" name="salaire_conducteur"/></td><td colspan="2"><input type="text" size="20" name="salaire_gerant"/></td><td colspan="2"><input type="text" size="20" name="salaire_releveur"/></td>	</tr>
</table><br/>
	<center><input type="submit" value="Enregistrer"/></center>
	</fieldset>
</form>

