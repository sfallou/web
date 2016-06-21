<?php
require('head.php');
require('header.php'); 
require('connexion.php'); 
require('classes/utilisateurs.php');
?>
<center><h2 class="text">Bon De coupure</h2>
					<form method="post" action="bon_coupure_pdf.php" target="_blank">
						<input type="submit" value="Imprimer ce bon en pdf" /><br/><br/>

						<?php
	
						//récupération des valeurs
						$id_index=$_GET['id_compteur'];
						$id_abonne=$_GET['id_abonne'];
		
						$reponse = $bdd->query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,cni,ancien_index,nouvel_index,id,id_compteur,DATE_FORMAT(date_index, '%d/%m/%Y') AS date,DATE_ADD(date_index, INTERVAL 15 DAY) AS date_expiration,DATE_SUB(date_index, INTERVAL 30 DAY) AS periode FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE id_compteur=$id_index ORDER BY date_index DESC LIMIT 0, 1");
					while ($donnees = $reponse->fetch())
		
						{
							$periode=$donnees['periode'];
							list($y,$m,$d)=explode("-",$periode);
							$periode="$d/$m/$y";
							$date_expiration=$donnees['date_expiration'];
							list($y1,$m1,$d1)=explode("-",$date_expiration);
							$date_expiration="$d1/$m1/$y1";
							$diff= $donnees['nouvel_index'] - $donnees['ancien_index'];
							$montant= $diff*$tarif;
							$req=$bdd->query("SELECT * FROM dette WHERE id_abonne='$id_abonne' AND etat=0 LIMIT 0,1");
							if ($data = $req->fetch())
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
				<tr><td><table style="margin-left:300px;"><td><strong>BON DE COUPURE</strong></td></table></td></tr>
				<tr><td><table style="margin-left:20px;"><tr><td>N°facture impayée: <?php echo $donnees['id_compteur'];?><br/>Date: <?php echo $donnees['date']?><br/>N°Abonné: <?php echo $donnees['id_abonne']; ?><br/></td>
				<td width="400px"></td><td><strong>Prénom:</strong> <?php echo $donnees['prenom_maj']; ?><br/><strong>Nom:</strong> <?php echo $donnees['nom_maj']; ?><br/><strong>Adresse:</strong> <?php echo $donnees['adresse']; ?></td></tr></table></td></tr>
				<tr><td align="center">Pour cause de retard de paiement de votre facture d'eau du <?php echo $donnees['date']; ?>, on vous informe qe votre compteur a été coupé jusqu'à ce que vous vous acquittez de vos droits</td></tr>
				<tr>
					<table border="1">
			<tr>
				<th colspan="6" > <center>Détails de la facture coupée</center></th></tr>
			<tr>
				<th>An-index</th>
				<th>Nv-index</th>
				<th>Consommation d'eau(m3)</th>
				<th>Tarif(FCFA/m3)</th>
				<th>Montant Consommation(FCFA)</th>
				<th>Frais Coupure(FCA)</th>
			</tr>
			<tr>
				<td> <?php echo $donnees['ancien_index']; ?></td>
				<td> <?php echo $donnees['nouvel_index']; ?></td>
				<td><?php echo $diff; ?></td>
				<td><?php echo $tarif; ?></td>
				<td> <?php echo $montant;?></td>
				<td>3000</td>
			</tr>
			<tr>
				<td colspan="4" ><strong>NET A PAYER</strong></td>
				<td colspan="2" ><?php echo $montant+3000; ?> FCFA</td>
			</tr>
		</table>
										<input type="hidden" name="id_compteur" value="<?php echo $donnees['id_compteur'];?>"/>
										<input type="hidden" name="id_abonne" value="<?php echo $donnees['id_abonne'];?>"/>
										<input type="hidden" name="prenom" value="<?php echo $donnees['prenom_maj'];?>"/>
										<input type="hidden" name="nom" value="<?php echo $donnees['nom_maj'];?>"/>
										<input type="hidden" name="adresse" value="<?php echo $donnees['adresse'];?>"/>
										<input type="hidden" name="date" value="<?php echo $donnees['date'];?>"/>
										<input type="hidden" name="periode" value="<?php echo $periode;?>"/>
										<input type="hidden" name="ancien_index" value="<?php echo $donnees['ancien_index'];?>"/>
										<input type="hidden" name="nouvel_index" value="<?php echo $donnees['nouvel_index'];?>"/>
										<input type="hidden" name="diff" value="<?php echo $diff;?>"/>
										<input type="hidden" name="tarif" value="<?php echo $tarif;?>"/>
										<input type="hidden" name="montant" value="<?php echo $montant;?>"/>
										<input type="hidden" name="dette" value="<?php echo $dette;?>"/>
										<input type="hidden" name="date_expiration" value="<?php echo $date_expiration;?>"/>
						<?php
						}
						?>
								</tr>
							</table>
						</div>
					</form>
			
	</center>
<?php require('footer.php'); ?>