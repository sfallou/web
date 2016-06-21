<?php
require("head.php");
if ($_SESSION['connect']!=1)
{
?>
<script language="JavaScript">
		alert("Merci de vouloir vous identifier d'abord!!!");
		window.location.replace("index.php");// On inclut le formulaire d'identification
		</script>
<?php
}
?>
	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Suppression Dette</h2></center>
						<?php
							$req=mysql_query("select * from dette order by id_dette");
							echo'<table border="1" class="table"> 
							<tr><th>Prénom & Nom</th><th>Adresse</th><th>Montant dette</th><th>N°facture</th><th>Date</th><th>Supprimer</th></tr>';

								while($don=mysql_fetch_array($req))
								{
								$id_dette=$don['id_dette'];
								$id_abonne=$don['id_abonne'];
								$montant=$don['montant_dette'];
								$num_facture=$don['num_facture'];
								$date_dette=$don['date_dette'];
								$resultat=mysql_query("select * from abonne where id_abonne='$id_abonne'");
								if($data=mysql_fetch_array($resultat))
									{
									$prenom=$data['prenom'];
									$nom=$data['nom'];
									$adresse=$data['adresse'];
									}
								?>
								<tr><td><?php echo"$prenom $nom";?></td><td><?php echo"$adresse";?></td><td><?php echo"$montant";?></td>
									<td><?php echo"$num_facture";?></td><td><?php echo"$date_dette";?></td>
									<td>
										<form  action="traitement_supprimer_dette.php" method="POST" >
											<input type="hidden" name="id_dette" value="<?php echo"$id_dette";?>" />
											<input type="submit" value="Valider" />
										</form>
									</td>
								</tr>
								<?php
								}
							
							?>
						</table>
				
				</td>
			</tr>
			
		</table>
	</body>
</html>

			 
                 


























