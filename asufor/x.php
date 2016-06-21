<?php
require("head.php");

								
							?>
								<form method="post" action="etat_facture.php">
								<table class="table" border="1">
									<tr><th>Prénom</th><th>Nom</th><th>N°Facture</th><th>Montant</th><th><input type="submit" name="liste_verte" value="Payer"/></th><th><input type="submit" name="liste_suspendu" value="Couper"/></th></tr>
								<?php
									$reponse = mysql_query("SELECT * FROM compteur");
									while($donnees =mysql_fetch_array($reponse))
									{
										$id_abonne=$donnees['id'];
										$id_compteur=$donnees['id_compteur'];
										$rep = mysql_query("SELECT * FROM abonne WHERE id_abonne='$id_abonne' AND adresse='$adresse' AND  ");
											if($data =mysql_fetch_array($rep))
											{
												$prenom=$data['prenom'];
												$nom=$data['nom'];
												$montant=$tarif*($donnees['nouvel_index']-$donnees['ancien_index']);
												echo	'<tr><td>$prenom</td><td>$nom</td><td>$id_compteur</td><td>$montant</td><td><input type="checkbox" name="payer[]"/></td><td><input type="checkbox" name="couper[]"/></td></tr>';
											}
									}
						?>	
						</table>
		</form>
	