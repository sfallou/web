<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Liste des Recettes</span><br>
	</div>
	<div id="tb-top">
		<div class="tb-top-cell">Date</div>
		<div class="tb-top-cell">Facturation</div>
		<div class="tb-top-cell">Abreuvoir</div>
		<div class="tb-top-cell">Potence</div>
		<div class="tb-top-cell">Bon Coupure</div>
	</div>
<?php
			// Récupération des abonnés 
			$requete = "SELECT * FROM recette WHERE date_recette>='$timestamp1' AND timestamp<='$timestamp2' ORDER BY id_recette";
			$resultat= mysql_query($requete);
			if($donnees=mysql_fetch_array($resultat))
			{
				while($donnees=mysql_fetch_array($resultat))
				{
					$id_recette=$donnees['id_recette'];
					$date=$donnees['date_recette'];
					$facture=$donnees['r_facture'];
					$abreuvoir=$donnees['r_abreuvoir'];
					$potence=$donnees['r_potence'];
					$bon_coupure=$donnees['bon_coupure'];
		?>

			<div id="tb-corps">
				<div class="tb-right-cell"><?php echo $date;?></div>
				<div class="tb-right-cell"><?php echo $facture;?></div>
				<div class="tb-right-cell"><?php echo $abreuvoir;?></div>
				<div class="tb-right-cell"><?php echo $potence;?></div>
				<div class="tb-right-cell"><?php echo $bon_coupure;?></div>
			</div>
		<?php
				}
			}
			else
				echo"Aucune recette pour la période choisie!";
		?>
</div>

