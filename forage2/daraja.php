<?php $adresse="daraja";
?>
<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Liste des abonnés de <?php echo strtoupper($adresse)?></span><br>
	</div>
	<div id="tb-top">
		<div class="tb-top-cell">Prenom</div>
		<div class="tb-top-cell">Nom</div>
		<div class="tb-top-cell">Telephone</div>
		<div class="tb-top-cell">CNI</div>
		<div class="tb-top-cell">Plus d'infos</div>
	</div>
		<?php
			// Récupération des abonnés 
			$requete = "SELECT * FROM abonne WHERE adresse='$adresse' ORDER BY id_abonne";
			$resultat= mysql_query($requete);
			while($donnees=mysql_fetch_array($resultat))
				{
					$prenom=$donnees['prenom'];
					$nom=$donnees['nom'];
					$tel=$donnees['telephone'];
					$cni=$donnees['cni'];
					$id_abonne=$donnees['id_abonne'];
		?>
	<div id="tb-corps">
		<div class="tb-right-cell"><?php echo $prenom;?></div>
		<div class="tb-right-cell"><?php echo strtoupper($nom);?></div>
		<div class="tb-right-cell"><?php echo strtoupper($tel);?></div>
		<div class="tb-right-cell"><?php echo strtoupper($cni);?></div>
		<div class="tb-right-cell"><?php echo "<form action='traitement_liste.php' method='post'><input type='submit' value='visualiser'/>";echo'<input type="hidden" name="id_abonne" value="'. htmlspecialchars($donnees['id_abonne']) .'" /></form>';?></div>
	</div>
		<?php
				}
		?>
</div>

