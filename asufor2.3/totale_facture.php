<?php
require("header.php");
require_once ('connexion_bd.php');
include("variables.php");
include ("changer_format_date.php");
?>

	<body>
		<center><h2 class="text">Facturation sur une p&eacute;riode</h2></center>
		<table style="border:1px dashed"; width="80%" height="50%" align="center" cellspacing="10">
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"></td>
				<td align="center" align="center" valign="top">
					<form method="post" action="facture_totale_pdf.php" target="_blank">
		
						<?php
						
						//r�cup�ration des valeurs
						$date1=$_POST["date1"];
						$date2=$_POST["date2"];
						$timestamp1=strtotime($date1);
						$timestamp2=strtotime($date2);

						//====..requete Sql....==============
						$req=$bdd->prepare("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,cni,ancien_index,nouvel_index,id,id_compteur,DATE_FORMAT(date_index, '%d/%m/%Y') AS date,DATE_ADD(date_index, INTERVAL 15 DAY) AS date_expiration,DATE_SUB(date_index, INTERVAL 30 DAY) AS periode FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE compteur.timestamp >= :times1 AND compteur.timestamp <= :times2 ORDER BY adresse");
						$req->execute(array(
											':times1' => $timestamp1,
											':times2' => $timestamp2

											));

						while ($donnees = $req->fetch() )
		
						{
							$periode=$donnees['periode'];
							list($y,$m,$d)=explode("-",$periode);
							$periode="$d/$m/$y";
							$date_expiration=$donnees['date_expiration'];
							list($y1,$m1,$d1)=explode("-",$date_expiration);
							$date_expiration="$d1/$m1/$y1";
							$diff= $donnees['nouvel_index'] - $donnees['ancien_index'];
							$montant= $diff*$tarif;

							$req=$bdd->prepare("SELECT * FROM dette WHERE id_abonne= :id_abonne AND etat=0 LIMIT 0,1");
							$req->execute(array( ':id_abonne' => $id_abonne ));
							if ($data = $req->fetch() )
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
						<div >                                                                                                                           
							<table>
								<tr><td><?php entete_asufor()?></td></tr>
								<tr><td><table style="margin-left:200px;"><td><strong>FACTURE D'EAU</strong></td></table></td></tr>
								<tr><td><table style="margin-left:20px;"><tr><td>N facture: <?php echo $donnees['id_compteur'];?><br/>Date: <?php echo "$jour/$mois/$annee";?><br/>N Abonn&eacute;: <?php echo $donnees['id_abonne']; ?><br/></td>
								<td width="300px"></td><td><strong>Pr&eacute;nom:</strong> <?php echo $donnees['prenom_maj']; ?><br/><strong>Nom:</strong> <?php echo $donnees['nom_maj']; ?><br/><strong>Adresse:</strong> <?php echo $donnees['adresse']; ?></td></tr></table></td></tr>
								<tr><td align="center">Nous avons relev&eacute; votre compteur d'eau le <?php echo $donnees['date']; ?> </strong>pour la p&eacute;riode du : <?php echo $periode; ?> au <?php echo $donnees['date']; ?></td></tr>
								<tr>
									<table border="1">
										<tr>
											<th colspan="7" >D&eacute;tails de la facturation</th>
										</tr>
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
												<td>Dette sur la facture n�<?php echo $num_facture;?> du <?php echo changedate1($date_dette);?></td>
											<?php
											} 
											?>
										</tr>
										<tr>
											<td colspan="4" ><strong>TOTAL  DE LA FACTURE</strong></td>
											<td colspan="2" ><?php echo $montant+$dette; ?> FCFA</td>
										</tr>
										<tr>
											<td colspan="6"><strong><center>A PAYER AVANT LE  <?php echo $date_expiration; ?></center></strong></td>
										</tr>
									</table>
										<input type="hidden" name="id_compteur[]" value="<?php echo $donnees['id_compteur'];?>"/>
										<input type="hidden" name="id_abonne[]" value="<?php echo $donnees['id_abonne'];?>"/>
										<input type="hidden" name="prenom[]" value="<?php echo $donnees['prenom_maj'];?>"/>
										<input type="hidden" name="nom[]" value="<?php echo $donnees['nom_maj'];?>"/>
										<input type="hidden" name="adresse[]" value="<?php echo $donnees['adresse'];?>"/>
										<input type="hidden" name="date[]" value="<?php echo $donnees['date'];?>"/>
										<input type="hidden" name="periode[]" value="<?php echo $periode;?>"/>
										<input type="hidden" name="ancien_index[]" value="<?php echo $donnees['ancien_index'];?>"/>
										<input type="hidden" name="nouvel_index[]" value="<?php echo $donnees['nouvel_index'];?>"/>
										<input type="hidden" name="diff[]" value="<?php echo $diff;?>"/>
										<input type="hidden" name="tarif[]" value="<?php echo $tarif;?>"/>
										<input type="hidden" name="montant[]" value="<?php echo $montant;?>"/>
										<input type="hidden" name="dette[]" value="<?php echo $dette;?>"/>
										<input type="hidden" name="date_expiration[]" value="<?php echo $date_expiration;?>"/>
									<center>.......................................................................................................</center><br/>
		
						<?php
						}
						?>
								</tr>
							</table>
						</div>
						<center><button class="btn btn-large btn-primary" type="submit">Imprimer Bon</button></center>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
