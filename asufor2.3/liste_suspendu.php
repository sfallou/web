 <?php
	
	 	//requete des informations sur les abonnees qui sont dans la liste des suspendus

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
						        <h2><i class="glyphicon glyphicon-user"></i> Les abonn&eacute;s qui sont coup&eacute;s</h2>

						        <div class="box-icon">
						     	  	 <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						        </div>
						        </div>

								<table class="table-striped table-bordered bootstrap-datatable datatable responsive">
											<tr class="danger">
												<th >ID</th>
												<th >Pr&eacute;nom</th>
												<th >Nom</th>
												<th >Adresse</th>
												<th >N Facture</th>
												<th >Date facture</th>
												<th >Bon coupure</th>
												<th >Retirer Suspension</th>
											</tr>';
		while($donnee3=$req->fetch() )
		{
				$id_abonne=$donnee3['id_abonne'];
				$prenom=$donnee3['prenom_maj'];	
				$nom=$donnee3['nom_maj'];	
				$num_facture=$donnee3['id_compteur'];
				$date=$donnee3['date_index'];
				$etat_abonne=$donnee3['etat_abonne'];
				$etat_compteur=$donnee3['etat_compteur'];
				if($etat_abonne==2 AND $etat_compteur==2)// etat=2 correspond à la liste des suspendus
					{
					echo 
						
						'<tr>
							<td>'. htmlspecialchars($donnee3['id_abonne']) .'</td><td>'. htmlspecialchars($donnee3['prenom_maj']) .'</td><td>'. htmlspecialchars($donnee3['nom_maj']) .'</td><td>'. htmlspecialchars($donnee3['adresse']) .'</td><td>'. htmlspecialchars($donnee3['id_compteur']) .'</td><td>'. htmlspecialchars($donnee3['date_index']) .'</td>
							<td>
								<form method="post" action="bon_coupure.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee3['id_abonne']) .'" />
								<input type="hidden" name="id_compteur"  value="'. htmlspecialchars($donnee3['id_compteur']) .'" />
								<a class="btn btn-info ">
									<i class="glyphicon glyphicon-print "></i>
									<input style="color:red" type="submit" value="Imprimer" /> 
								</a>   
								</form>
							</td>
							<td>
								<form method="post" action="retirer_suspension.php">
								<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnee3['id_abonne']) .'" />
								<input class="btn btn-info" type="submit" value="valider" />    
								</form>
							</td>
						</tr>';
					}
		}
         ?>
	 </table><br/></div>
</body>
	</html>	
