<?php
			//requete des informations sur les abonnees qui sont dans la liste rouge
		$req1 = mysql_query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE  compteur.timestamp >='$timestamp1' AND compteur.timestamp <='$timestamp2' ORDER BY date_index DESC ");
								echo "<table border='1' class='table' >
											<caption class='text'>Les abonnés qui n'ont pas encore payé leurs factures </caption>
											<tr>
												<th style='background:#094963;color:#fff;'>ID</th>
												<th style='background:#094963;color:#fff;'>Prénom</th>
												<th style='background:#094963;color:#fff;'>Nom</th>
												<th style='background:#094963;color:#fff;'>Adresse</th>
												<th style='background:#094963;color:#fff;'>N°Facture</th>
												<th style='background:#094963;color:#fff;'>Date facture</th>
												<th style='background:#094963;color:#fff;'>Paiement</th>
												<th style='background:#094963;color:#fff;'>Coupure</th>
											</tr>";
			while ($donnee1=mysql_fetch_array($req1))
				{
				$id_abonne=$donnee1['id_abonne'];
				$prenom=$donnee1['prenom_maj'];	
				$nom=$donnee1['nom_maj'];	
				$num_facture=$donnee1['id_compteur'];
				$date=$donnee1['date_index'];
				$etat_compteur=$donnee1['etat_compteur'];
				$etat_abonne=$donnee1['etat_abonne'];
				if($etat_abonne==0 AND $etat_compteur==0)// etat=0 correspond à la liste rouge
					{
					echo 
						
						'<tr>
							<td>'. htmlspecialchars($donnee1['id_abonne']) .'</td><td>'. htmlspecialchars($donnee1['prenom_maj']) .'</td><td>'. htmlspecialchars($donnee1['nom_maj']) .'</td><td>'. htmlspecialchars($donnee1['adresse']) .'</td><td>'. htmlspecialchars($donnee1['id_compteur']) .'</td><td>'. htmlspecialchars($donnee1['date_index']) .'</td>
							<td>
								<form method="post" action="g_traitement_paiement.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee1['id_abonne']) .'" />
								<input type="submit" value="OK" />    
								</form>
							</td>
							<td>
								<form method="post" action="g_traitement_coupure.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee1['id_abonne']) .'" />
								<input type="submit" value="valider" />    
								</form>
							</td>
						</tr>';
					}
				}
         ?>
			</table><br/>