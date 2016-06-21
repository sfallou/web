<?php
	require("head.php");
	?>	<input type="button" value="Imprimer cette facture" onClick="window.print()"><br/><br/>
	
	<body class="stylebon">
		<?php
	
		//récupération des valeurs
		$id_index=$_POST['id_compteur'];
		$id_abonne=$_POST['id_abonne'];
		
		$reponse = mysql_query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,cni,ancien_index,nouvel_index,id,id_compteur,DATE_FORMAT(date_index, '%d/%m/%Y') AS date,DATE_ADD(date_index, INTERVAL 15 DAY) AS date_expiration,DATE_SUB(date_index, INTERVAL 30 DAY) AS periode FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE id_compteur=$id_index ORDER BY date_index DESC LIMIT 0, 1");
		while ($donnees = mysql_fetch_array($reponse))
		
		{
		$periode=$donnees['periode'];
		list($y,$m,$d)=explode("-",$periode);
		$periode="$d/$m/$y";
		$date_expiration=$donnees['date_expiration'];
		list($y1,$m1,$d1)=explode("-",$date_expiration);
		$date_expiration="$d1/$m1/$y1";
		$diff= $donnees['nouvel_index'] - $donnees['ancien_index'];
		$montant= $diff*$tarif;
		$req=mysql_query("SELECT * FROM dette WHERE id_abonne='$id_abonne' AND etat=0 LIMIT 0,1");
			if ($data = mysql_fetch_array($req))
			{
			$dette=$data['montant_dette'];
			$date_dette=$data['date_dette'];
			$num_facture=$data['num_facture'];
			}
			else
			{
			$dette=0;
			}
		?>
	    <div style="background:#fff;border: 1px solid #000;width:820px;">                                                                                                                           
			<table>
				<tr><td><?php entete_asufor()?></td></tr>
				<tr><table style="margin-left:300px;"><td><strong>FACTURE D'EAU</strong></td></table></tr>
				<tr><table style="margin-left:20px;"><tr><td>N°facture: <?php echo $donnees['id_compteur'];?><br/>Date: <?php echo "$jour/$mois/$annee";?><br/>N°Abonné: <?php echo $donnees['id_abonne']; ?><br/></td>
				<td width="400px"></td><td><strong>Prénom:</strong> <?php echo $donnees['prenom_maj']; ?><br/><strong>Nom:</strong> <?php echo $donnees['nom_maj']; ?><br/><strong>Adresse:</strong> <?php echo $donnees['adresse']; ?></td></tr></table></tr>
				<tr><td align="center">Nous avons relevé votre compteur d'eau le <?php echo $donnees['date']; ?> </strong>pour la période du : <?php echo $periode; ?> au <?php echo $donnees['date']; ?></td></tr>
				<tr>
					<table border="1">
			<tr>
				<th colspan="7" >Détails de la facturation</th></tr>
			<tr>
				<th>An-index</th>
				<th>Nv-index</th>
				<th>Consommation d'eau(m3)</th>
				<th>Tarif(FCFA/m3)</th>
				<th>Montant Consommation(FCFA)</th>
				<th>Solde anterieur(FCA)</th>
				<?php if($dette!=0)echo "<th>Detail de la solde</th>";?>
			</tr>
			<tr>
				<td> <?php echo $donnees['ancien_index']; ?></td>
				<td> <?php echo $donnees['nouvel_index']; ?></td>
				<td><?php echo $diff; ?></td>
				<td><?php echo $tarif; ?></td>
				<td> <?php echo $montant;?></td>
				<td><?php echo $dette;?></td>
				<?php if($dette!=0)
				{
				?>
				<td>Dette sur la facture n°<?php echo $num_facture;?> du <?php echo changedate1($date_dette);?></td>
				<?php
				} 
				?>
			</tr>
			<tr>
				<td colspan="4" ><strong>TOTAL  DE LA FACTURE</strong></td>
				<td colspan="2" ><?php echo $montant+$dette; ?> FCFA</td>
			</tr>
			<tr>
				<td colspan="6" align="center"><strong>A PAYER AVANT LE  <?php echo $date_expiration; ?></strong></td>
			</tr>
		</table>
		<?php
		}
		?>
				</tr>
			</table>
		</div>
	</body>
</html>
