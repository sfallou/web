<?php
			//requete des informations sur les abonnees qui sont dans la liste rouge
		$req1 = mysql_query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE YEAR(date_index)='$annee' AND MONTH(date_index)='$mois' AND compteur.etat=0 AND adresse='$adresse' ");
								echo "<table border='1' class='table' >
											<caption class='text'>Liste Rouge $adresse: $moiss $annee </caption>
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
							<td>'. $id_abonne.'</td><td>'.$prenom .'</td><td>'. $nom.'</td><td>'. $adresse .'</td><td>'. htmlspecialchars($donnee1['id_compteur']) .'</td><td>'. changedate1($date) .'</td>
							<td>
								<form method="post" action="traitement_liste_paiement.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee1['id_abonne']) .'" />
								<input type="hidden" name="id_compteur"  value="'. htmlspecialchars($donnee1['id_compteur']) .'" />
								<input type="submit" value="OK" />    
								</form>
							</td>
							<td>
								<form method="post" action="traitement_liste_coupure.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee1['id_abonne']) .'" />
								<input type="hidden" name="id_compteur"  value="'. htmlspecialchars($donnee1['id_compteur']) .'" />
								<input type="submit" value="valider" />    
								</form>
							</td>
						</tr>';
					}
				}
         ?>
			</table>