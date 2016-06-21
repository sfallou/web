<?php
			//requete des informations sur les abonnees qui sont dans la liste rouge
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
						        <h2><i class="glyphicon glyphicon-user"></i> Les abonn&eacute;s qui n ont pas encore pay&eacute; leurs factures</h2>

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
												<th >N Facture</th>
												<th >Date facture</th>
												<th >Paiement</th>
												<th >Coupure</th>
											</tr>';
			while ($donnee1=$req->fetch() )
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
								<form method="post" action="traitement_paiement.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee1['id_abonne']) .'" />
								<input class="btn btn-danger orange" type="submit" value="OK" />    
								</form>
							</td>
							<td>
								<form method="post" action="traitement_coupure.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee1['id_abonne']) .'" />
								<input class="btn btn-info"  type="submit" value="valider" />    
								</form>
							</td>
						</tr>';
					}
				}
         ?>
			</table><br/>