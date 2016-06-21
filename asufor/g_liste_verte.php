 <?php
	 	//requete des informations sur les abonnees qui sont dans la liste verte
		$req2 = mysql_query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE  compteur.timestamp >='$timestamp1' AND compteur.timestamp <='$timestamp2' ORDER BY date_index DESC ");
								echo "<table border='1' class='table'>
											<caption class='text'>Les abonnés qui ont déjà payé leurs factures </caption>
											<tr>
												<th style='background:#094963;color:#fff;'>ID</th>
												<th style='background:#094963;color:#fff;'>Prénom</th>
												<th style='background:#094963;color:#fff;'>Nom</th>
												<th style='background:#094963;color:#fff;'>Adresse</th>
												<th style='background:#094963;color:#fff;'>N°Facture</th>
												<th style='background:#094963;color:#fff;'>Date facture</th>
												<th style='background:#094963;color:#fff;'>Retirer de la liste</th>
											</tr>";
		while ($donnee2=mysql_fetch_array($req2))
		{
				$id_abonne2=$donnee2['id_abonne'];
				$prenom=$donnee2['prenom_maj'];	
				$nom=$donnee2['nom_maj'];	
				$num_facture=$donnee2['id_compteur'];
				$date=$donnee2['date_index'];
				$etat_compteur=$donnee2['etat_compteur'];
				$etat_abonne=$donnee2['etat_abonne'];
				if($etat_abonne==1  AND $etat_compteur==1 )// etat=1 correspond à la liste verte
					{
					echo 
						
						'<tr>
							<td>'. htmlspecialchars($donnee2['id_abonne']) .'</td><td>'. htmlspecialchars($donnee2['prenom_maj']) .'</td><td>'. htmlspecialchars($donnee2['nom_maj']) .'</td><td>'. htmlspecialchars($donnee2['adresse']) .'</td><td>'. htmlspecialchars($donnee2['id_compteur']) .'</td><td>'. htmlspecialchars($donnee2['date_index']) .'</td>
							<td>
								<form method="post" action="g_retirer_liste_payee.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee2['id_abonne']) .'" />
								<input type="submit" value="valider" />    
								</form>
							</td>
						</tr>';
					}
		}
         ?>
	 </table><br/>