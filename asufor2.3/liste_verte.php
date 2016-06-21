 <?php
	 	//requete des informations sur les abonnees qui sont dans la liste verte
		$req=$bdd->prepare("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE  compteur.timestamp >= :times1 AND compteur.timestamp <= :times2 ORDER BY date_index DESC ");
		$req->execute(array(
						':times1' =>$timestamp1,
						':times2' =>$timestamp2
							));




								echo '
								<div class="box-header well" data-original-title="">
						        <h2><i class="glyphicon glyphicon-user"></i>Les abonn&eacute;s qui ont d&eacutej&agrave; pay&eacute; leurs factures</h2>

						        <div class="box-icon">
						     	  	 <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						        </div>
						        </div>
								<table class="table table-striped table-bordered bootstrap-datatable datatable responsive"> 
											<tr class="danger">
												<th >ID</th>
												<th >Pr&eacute;nom</th>
												<th >Nom</th>
												<th >Adresse</th>
												<th >Num Facture</th>
												<th >Date facture</th>
												<th >Retirer de la liste</th>
											</tr>';
		while ($donnee2=$req->fetch() )
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
								<form method="post" action="retirer_liste_payee.php">
								<input  type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee2['id_abonne']) .'" />
								<input class="btn btn-info" type="submit" value="valider" />    
								</form>
							</td>
						</tr>';
					}
		}
         ?>
	 </table><br/>