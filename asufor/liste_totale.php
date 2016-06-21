
<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Liste de tous les abonnés </span><br>
	</div>
</div>
	<table border="1" class="table">
		</tr>
			<th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Adresse</th>
			<th>CNI</th>
			<th>Téléphone</th>
		</tr>
		<?php
			// Récupération des abonnés 
			$requete = "SELECT * FROM abonne ORDER BY id_abonne";
			$resultat= mysql_query($requete);
			while($donnees=mysql_fetch_array($resultat))
				{
					$prenom=$donnees['prenom'];
					$nom=$donnees['nom'];
					$tel=$donnees['telephone'];
					$cni=$donnees['cni'];
					$adresse=$donnees['adresse'];
					$id_abonne=$donnees['id_abonne'];
					$etat=$donnees['etat'];
					$etat="$etat";
					
		?>
	<tr>
		<td><?php echo strtoupper($id_abonne);?></td>
		<td><?php echo $prenom;?></td>
		<td><?php echo strtoupper($nom);?></td>
		<td><?php echo $adresse;?></td>
		<td><?php echo $cni;?></td>
		<td><?php echo $tel;?></td>
	</tr>
		<?php
				}
		?>
</table>

