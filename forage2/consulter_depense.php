<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Liste des Dépenses</span><br>
	</div>
	<div id="tb-top">
		<div class="tb-top-cell">Date</div>
		<div class="tb-top-cell">Gazoil</div>
		<div class="tb-top-cell">Electricité</div>
		<div class="tb-top-cell">Salaires</div>
		<div class="tb-top-cell">Entretien & divers</div>
	</div>
<?php
			// Récupération des abonnés 
			$requete = "SELECT * FROM depense WHERE date_depense>='$timestamp1' AND timestamp<='$timestamp2' ORDER BY id_depense";
			$resultat= mysql_query($requete);
			if($donnees=mysql_fetch_array($resultat))
			{
				while($donnees=mysql_fetch_array($resultat))
				{
					$id_depense=$donnees['id_depense'];
					$date=$donnees['date_depense'];
					$gazoil=$donnees['d_gazoil'];
					$elec=$donnees['d_senelec'];
					$salaire=$donnees['salaire_conducteur']+$donnees['salaire_gerant']+$donnees['salaire_releveur'];
					$divers=$donnees['d_entretien']+$donnees['d_divers'];
		?>

			<div id="tb-corps">
				<div class="tb-right-cell"><?php echo $date;?></div>
				<div class="tb-right-cell"><?php echo $gazoil;?></div>
				<div class="tb-right-cell"><?php echo $elec;?></div>
				<div class="tb-right-cell"><?php echo $salaire;?></div>
				<div class="tb-right-cell"><?php echo $divers;?></div>
			</div>
		<?php
				}
			}
			else
				echo"Aucune dépense pour la période choisie!";
		?>
</div>

