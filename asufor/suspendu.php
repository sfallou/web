 <?php
	 	//requete des informations sur les abonnees qui sont dans la liste des suspendus
		$req3 = mysql_query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE YEAR(date_index)='$annee' AND MONTH(date_index)='$mois' AND compteur.etat=2 AND adresse='$adresse' ");
								echo "<table border='1' class='table'>
											<caption class='text'>Liste des suspendus $adresse: $moiss $annee </caption>
											<tr>
												<th style='background:#094963;color:#fff;'>ID</th>
												<th style='background:#094963;color:#fff;'>Pr�nom</th>
												<th style='background:#094963;color:#fff;'>Nom</th>
												<th style='background:#094963;color:#fff;'>Adresse</th>
												<th style='background:#094963;color:#fff;'>N�Facture</th>
												<th style='background:#094963;color:#fff;'>Date facture</th>
												<th style='background:#094963;color:#fff;'>Bon coupure</th>
												<th style='background:#094963;color:#fff;'>Retirer Suspension</th>
											</tr>";
		while ($donnee3=mysql_fetch_array($req3))
		{
				$id_abonne=$donnee3['id_abonne'];
				$prenom=$donnee3['prenom_maj'];	
				$nom=$donnee3['nom_maj'];	
				$num_facture=$donnee3['id_compteur'];
				$date=$donnee3['date_index'];
				$etat_abonne=$donnee3['etat_abonne'];
				$etat_compteur=$donnee3['etat_compteur'];
				/*if($etat_abonne==2 AND $etat_compteur==2)// etat=2 correspond � la liste des suspendus
					{*/
					echo 
						
						'<tr>
							<td>'. htmlspecialchars($donnee3['id_abonne']) .'</td><td>'.$prenom .'</td><td>'. $nom .'</td><td>'. $adresse .'</td><td>'. htmlspecialchars($donnee3['id_compteur']) .'</td><td>'. changedate1($date) .'</td>
							<td>
								<form method="post" action="bon_coupure.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee3['id_abonne']) .'" />
								<input type="hidden" name="id_compteur"  value="'. htmlspecialchars($donnee3['id_compteur']) .'" />
								<input type="submit" value="imprimer" />    
								</form>
							</td>
							<td>
								<form method="post" action="traitement_retirer_suspension.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee3['id_abonne']) .'" />
								<input type="hidden" name="id_compteur"  value="'. htmlspecialchars($donnee3['id_compteur']) .'" />
								<input type="submit" value="valider" />    
								</form>
							</td>
						</tr>';
					//}
		}
         ?>
	 </table>
	