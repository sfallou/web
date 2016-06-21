<?php
$reponse= mysql_query("SELECT SUM(nouvel_index-ancien_index) AS volume FROM compteur");
		if($donnees = mysql_fetch_array($reponse))
			{
			$volume=$donnees['volume'];	
			}
			$montant=$volume*$tarif;

$reponse2= mysql_query("SELECT SUM(d_senelec+d_gazoil+d_entretien+salaire_conducteur+salaire_gerant+salaire_releveur+d_divers) AS depenses FROM depense");
		if($donnees2 = mysql_fetch_array($reponse2))
			{
			$depense_total=$donnees2['depenses'];	
			}

$reponse3= mysql_query("SELECT SUM(r_facture+r_abreuvoir+r_potence+bon_coupure) AS recettes FROM recette");
		if($donnees3 = mysql_fetch_array($reponse3))
			{
			$recette_total=$donnees3['recettes'];	
			}
?>

<table >
	<tr>
		<td>
			<table border="1" class="text">
				<tr>
					<td  colspan="2"><h2 class="text"> Consommation Totale dépuis le début<h2></td>
				</tr>
				<tr><th>Volume(m3)</th><th>Montant (Fcfa)</th></tr>
				<tr ><td rowspan="10"><?php echo$volume;?></td><td rowspan="10" ><?php echo$montant;?></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table border="1" class="text">
				<tr>
					<td  colspan="2"><h2 class="text"> Etat  des  finances dépuis le début .....<h2></td>
				</tr>
				<tr><th>Recettes (Fcfa)</th><th>Dépenses (Fcfa)</th></tr>
				<tr ><td rowspan="10"><?php echo$recette_total;?></td><td rowspan="10" ><?php echo$depense_total;?></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
				<tr><td></td></tr><tr><td></td></tr>
			</table>
		</td>
	</tr>
</table>