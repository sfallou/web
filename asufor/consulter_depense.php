<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text"><center>Journal des Dépenses</center></span><br>
	</div>
</div>
<table border="1" class="table">
	<tr>
		<th style="background:#094963;color:#fff;">Date</th>
		<th style="background:#094963;color:#fff;">Gazoil</th>
		<th style="background:#094963;color:#fff;">Sénélec</th>
		<th style="background:#094963;color:#fff;">Salaire</th>
		<th style="background:#094963;color:#fff;">Entretien</th>
		<th style="background:#094963;color:#fff;">Divers</th>
		<th style="background:#094963;color:#fff;">Note</th>
		<th style="background:#094963;color:#fff;">Effacer</th>
	</tr>
<?php
			// Récupération des abonnés 
			$requete = "SELECT * FROM depense WHERE timestamp>='$timestamp1' AND timestamp<='$timestamp2' ORDER BY id_depense";
			$resultat= mysql_query($requete);
			$frais=0;
			while($donnees=mysql_fetch_array($resultat))
				{
					$id_depense=$donnees['id_depense'];
					$date=$donnees['date_depense'];
					$gazoil=$donnees['d_gazoil'];
					$elec=$donnees['d_senelec'];
					$salaire_conducteur=$donnees['salaire_conducteur'];
					$salaire_gerant=$donnees['salaire_gerant'];
					$salaire_releveur=$donnees['salaire_releveur'];
					$entretien=$donnees['d_entretien'];
					$d_divers=$donnees['d_divers'];
					$note=$donnees['detail'];
					$salaire=$salaire_conducteur+$salaire_gerant+$salaire_releveur;
					$frais=$frais+$salaire+$d_divers+$entretien+$elec+$gazoil;
		?>

			<tr>
				<td><?php echo changedate1($date);?></td>
				<td><?php echo $gazoil;?></td>
				<td><?php echo $elec;?></td>
				<td><a href="#" title="Somme des salaires: conducteur+gérant+releveur"><?php echo $salaire;?></a></td>
				<td><?php echo $entretien;?></td>
				<td><?php echo $d_divers;?></td>
				<td><?php echo $note;?></td>
				<td><form method="post" action="traitement_supprimer_depense.php"><input type="submit" style="color:red;" value="X"/><input type="hidden" name="id_depense" value="<?php echo $id_depense;?>"/></form></td>
			</tr>
		<?php
				}
		?>
</table>

