
					<center><h2 class="text">Les abonnements NON validés par l'administrateur</h2></center>
					<?php 
							$req=mysql_query("SELECT * FROM attente WHERE etat=1");
							
							echo"<table border='1' class='table'>
									<tr><th>Prénom</th><th>Nom</th><th>Adresse</th><th>CNI</th><th>Téléphone</th><th>Date</th></tr>";
								while($donnees=mysql_fetch_array($req))
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
