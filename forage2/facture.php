<?php
	require("connexion_bd.php");
?>
	<body>
		<?php
		include("date.php");
		//fonction pour l'affichage des dates
		include("changer_format_date.php");
	
		//récupération des valeurs
		$id_index=$_POST['id_compteur'];
		$id_abonne=$_POST['id_abonne'];
		$requete = "SELECT * FROM tarif";
			$resultat= mysql_query($requete);
			if($donnees=mysql_fetch_array($resultat))
				{
					$tarif=$donnees['montant_tarif'];
				}
			$req="SELECT * FROM dette WHERE id_abonne='$id_abonne'";
		$res=mysql_query($req);
		if($data=mysql_fetch_array($res))
		{
		$dette=$data['montant_dette'];
		}
		else $dette=0;
		$reponse = mysql_query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,cni,ancien_index,nouvel_index,id,id_compteur,DATE_FORMAT(date_index, '%d/%m/%Y') AS date,DATE_ADD(date_index, INTERVAL 15 DAY) AS date_expiration,DATE_SUB(date_index, INTERVAL 30 DAY) AS periode FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE id=$id_abonne ORDER BY date_index DESC LIMIT 0, 1");
		while ($donnees = mysql_fetch_array($reponse))
		
		{
		$periode=$donnees['periode'];
		$date_expiration=$donnees['date_expiration'];
		$periode=changedate1($periode);
		$date_expiration=changedate1($date_expiration);
		$diff= $donnees['nouvel_index'] - $donnees['ancien_index'];
		$montant= $diff*350;
		?>
	                                                                                                                                     
		<table border="1" cellspacing="20px" width="400px">
		<caption>FACTURE D'EAU </caption> 
			<tr>
				<td>N°facture: <?php echo $donnees['id_compteur'];?>
					<br/>Date: <?php echo "$jour/$mois/$annee";?>
					<br/>Identifiant Abonné: <?php echo $donnees['id_abonne']; ?>
				</td>
				<td>Prénom: <?php echo $donnees['prenom_maj']; ?> 
				<br/> Nom: <?php echo $donnees['nom_maj']; ?>
				<br/> CNI:<?php echo $donnees['cni']; ?> 
				<br/>Adresse : <?php echo $donnees['adresse']; ?></td>
			</tr>
		</table>  
		<table border="0">
			<td>Nous avons relevé votre compteur d'eau le <?php echo $donnees['date']; ?> 
			<br/></strong>pour la période du : <?php echo $periode; ?> au <?php echo $donnees['date']; ?>
			</td>
		</table > 
		<table border="1" cellspacing="10px" width="400px">
			<tr>
				<th colspan="2" >Détails de la facturation</th>
			</tr>
			<tr><th>An-index</th><td> <?php echo $donnees['ancien_index']; ?></td></tr>
			<tr><th>Nv-index</th><td> <?php echo $donnees['nouvel_index']; ?></td></tr>
			<tr><th>Consommation d'eau(m3)</th><td><?php echo $diff; ?></td></tr>
			<tr><th>Tarif(FCFA/m3)</th><td><?php echo $tarif; ?></td><tr>
			<tr><th>Montant Consommation(FCFA)</th><td> <?php echo $montant;?></td></tr>
			<tr><th>Solde anterieur(FCA)</th><td> <?php echo $dette;?></td></tr>
			<tr>
				<td colspan="2" ><strong>TOTAL  de la facture = <?php echo $montant; ?> FCFA </strong></td>
			</tr>
			<tr>
				<td colspan="2" > <strong>A PAYER AVANT LE :  <?php echo $date_expiration; ?></strong></td>
			</tr>
		</table>
		<?php
		}
		

		?>
		</body>
</html>
