<?php
	// Enregistrons les informations de date dans des variables
		 $jour = date("d");
		 $mois = date("m");
		//$annee = date("Y");
		//$annee2 = date("Y");
		//$heure = date("H");
		//$minute = date("i");
		//gestion des dates pour l'affichage 
				if(date("m")!=1)
				{
				$mois_prec=date("m")-1; //mois précédent
				$annee=date("Y"); // de la même année
				}
				else if (date("m")==1)
				{
				$mois_prec=12; //mois précedent corespond à decembre
				$annee=date("Y")-1; // de l'année passé
				}
				$date1="$annee-$mois_prec-25"; // c'est la date d'avant
				$date2="$annee-$mois-$jour";  //date d'après
				//formulaire de saisie de la période concernant les recettes à enregistrer
				if(!isset($_POST['date1']) OR !isset($_POST['date2']))
				{
				?>
				<center><h2 class="text">Consulter les dépenses</h2></center>
					<form  name="formulaire_finance" onSubmit="return verification_formulaire()" method="post" action="depense.php">
						<fieldset><legend>Periode</legend>
							<br/><label for="date1">DU</label> <input type="text" name="date1" id="date1" value="<?php echo$date1;?>" />
							<label for="date2">AU</label> <input type="text" name="date2" id="date2" value="<?php echo$date2;?>" />
							<br/><br/><center><input type="submit" value="Valider" /></center>
						</fieldset>
					</form><br/>
				<?php
				}
				else
				{
					if(isset($_POST['date1']) AND isset($_POST['date2']))
						{
						$time1=$_POST['date1'];
						$time2=$_POST['date2'];
						$timestamp1=strtotime($time1);
						$timestamp2=strtotime($time2);
						}
				?>
			<center><h2 class="text">Gestion des dépenses</h2></center>
			<form method="post" action="traitement_saisie_depense.php">
				<table>
				<caption>Tableau des dépenses pour la période du <?php echo$time1?> au <?php echo$time2?> </caption>
				<tr>
					<th>Frais Gasoil</th>
					<th>Frais Senelec</th>
					<th>Frais Entretien</th>
				</tr>
					<td><input type="text" name="frais_gasoil" id="frais_gasoil" value="0" /></td>
					<td><input type="text" name="frais_senelec" id="frais_senelec" value="0" /></td>
					<td><input type="text" name="frais_entretien" id="frais_entretien" value="0"/></td>
				<tr>
					<th>Salaire Releveur</th>
					<th>Salaire Conducteur</th>
					<th>Salaire gérant</th>
				</tr>
					<td><input type="text" name="salaire_releveur" id="salaire_releveur" value="0" /></td>
					<td><input type="text" name="salaire_conducteur" id="salaire_conducteur" value="0" /></td>
					<td><input type="text" name="salaire_gerant" id="salaire_gerant" value="0"/></td>
				</tr>
				<tr>
					<th >Divers</th>
					<th colspan="2">Détails</th>
				</tr>
				<tr>
					<td><input type="text" name="divers" id="divers" value="0" /></td>
					<td colspan="2"><textarea name="detail" id="detail">RAS</textarea></td>
				</tr>
			</table><br/>
				<input type="hidden" name="date_depense" id="date_depense" value="<?php echo$time2?>" />
				<input type="submit" value="Valider enregistrement " />
				</form>	<br/><br/>
				<?php
		}
		?>