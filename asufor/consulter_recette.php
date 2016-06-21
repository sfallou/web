<div id="dbm-table">
	<div id="dbm-header">
		<span class="header-text"><center>Journal des Recettes</center></span><br>
	</div>
</div><br/>
<?php
	// Récupération des abonnés 
	$requet = "SELECT SUM(nouvel_index-ancien_index) AS total_index FROM compteur WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' ";
	$resulta= mysql_query($requet);
	if($don=mysql_fetch_array($resulta))
		{
		$facture_total=$don['total_index']*$tarif;
		}
	else{$facture_total=0;}
	//*********
	$repon = mysql_query("SELECT SUM(frais_abonnement) AS abonnement FROM abonne WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' ");
	if($donn = mysql_fetch_array($repon))
		{
		$abonnement=$donn['abonnement'];
		}
	else{$abonnement=0;}
	
	//*********
	$n=0;
	$rep = mysql_query("SELECT id_compteur FROM compteur WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' AND etat=2 ");
	while($dat = mysql_fetch_array($rep))
		{
		$n+=$n;
		}
	$bon=$n*3000;

?>
<table border="1" class="table">
	<tr>
		<th style="background:#094963;color:#fff;">Période</th>
		<th style="background:#094963;color:#fff;">Facturation</th>
		<th style="background:#094963;color:#fff;">Abonnement</th>
		<th style="background:#094963;color:#fff;">Bon Coupure</th>
	</tr>
	<tr>
		<td><?php echo changedate1($time1);?> au <?php echo changedate1($time2);?> </td>
		<td><?php echo $facture_total;?></td>
		<td><?php echo $abonnement;?></td>
		<td><?php echo $bon;?></td>
	</tr>
</table><br/>
<table border="1" class="table">
	<tr>
		<th style="background:#094963;color:#fff;">Date</th>
		<th style="background:#094963;color:#fff;">Abreuvoir</th>
		<th style="background:#094963;color:#fff;">Potence</th>
		<th style="background:#094963;color:#fff;">Divers</th>
		<th style="background:#094963;color:#fff;">Notes</th>
		<th style="background:#094963;color:#fff;">Effacer</th>
	</tr>
<?php
			// Récupération des abonnés 
			$requete = "SELECT * FROM recette WHERE timestamp>='$timestamp1' AND timestamp<='$timestamp2' ORDER BY id_recette";
			$resultat= mysql_query($requete);
			$gain=0;
			while($donnees=mysql_fetch_array($resultat))
				{
					$id_recette=$donnees['id_recette'];
					$date=$donnees['date_recette'];
					$abreuvoir=$donnees['r_abreuvoir'];
					$potence=$donnees['r_potence'];
					$divers=$donnees['divers'];
					$note=$donnees['detail'];
					$gain=$gain+$abreuvoir+$potence+$divers;
					
		?>

			<tr>
				<td><?php echo changedate1($date);?></td>
				<td><?php echo $abreuvoir;?></td>
				<td><?php echo $potence;?></td>
				<td><?php echo $divers;?></td>
				<td><?php echo $note;?></td>
				<td><form method="post" action="traitement_supprimer_recette.php"><input type="submit" style="color:red;" value="X"/><input type="hidden" name="id_recette" value="<?php echo $id_recette;?>"/></form></td>
			</tr>
		<?php
				}
		?>
</table>

