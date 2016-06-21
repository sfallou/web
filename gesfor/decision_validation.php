<?php
session_start();
require('secure.php');?>
					<center><h2 >Les abonnements NON validés par l'administrateur</h2></center>
					<?php 
							$req=$bdd->query("SELECT * FROM attente WHERE etat=1");
						?>
						<table >
							<tr><th>Prénom</th><th>Nom</th><th>Adresse</th><th>CNI</th><th>Téléphone</th><th>Date</th></tr>
								<?php
								while($donnees=$req->fetch())
								{
									echo 
									'<tr><td>' . htmlspecialchars($donnees['prenom']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['nom']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['adresse']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['cni']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['telephone']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['date_abonnement']) .'</td>
									</tr>';
								}
							
							?>
					</table> 
