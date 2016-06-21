<?php $adresse="keur_mory";
?>
<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Liste des abonnés de <?php echo strtoupper($adresse)?></span><br>
	</div>
</div>
	<table border="1" class="table">
		</tr>
			<th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Etat Abonnement</th>
			<th>Compteur</th>
		</tr>
		<?php
			// Récupération des abonnés 
			$requete = "SELECT * FROM abonne WHERE adresse='$adresse' AND etat!=2 ORDER BY id_abonne";
			$resultat= mysql_query($requete);
			while($donnees=mysql_fetch_array($resultat))
				{
					$prenom=$donnees['prenom'];
					$nom=$donnees['nom'];
					$tel=$donnees['telephone'];
					$cni=$donnees['cni'];
					$id_abonne=$donnees['id_abonne'];
					$etat=$donnees['etat'];
					$etat="$etat";
					if($etat=="2")
					{
					$etat="Suspendu";
					}
					else if($etat=="1")
					{
					$etat="Normal";
					}
					else 
					{
					$etat="A facturer";
					}
		?>
	<tr>
		<td><?php echo strtoupper($id_abonne);?></td>
		<td><?php echo $prenom;?></td>
		<td><?php echo strtoupper($nom);?></td>
		<td><?php echo $etat;?></td>
		<td><?php echo "<form action='traitement_liste.php' method='post'><input type='submit' value='visualiser'/>";echo'<input type="hidden" name="id_abonne" value="'. htmlspecialchars($donnees['id_abonne']) .'" /><input type="hidden" name="adresse" value="'.$adresse .'" /><input type="hidden" name="prenom" value="'.$prenom .'" /><input type="hidden" name="nom" value="'.$nom .'" /></form>';?></td>
	</tr>
		<?php
				}
		?>
</table>

