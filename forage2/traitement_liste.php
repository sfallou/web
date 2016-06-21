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
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php include("menu2_admin.php");?></td>
				<td align="center" align="center" valign="top">
					<?php
						include("date.php");
						$id=$_POST['id_abonne'];
						$requete1 = "SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,UPPER(adresse) AS adresse,cni FROM abonne WHERE id_abonne='$id'";
						$resultat1=mysql_query($requete1);
						while ($donnes = mysql_fetch_array($resultat1))
							{
							$nom=$donnes['nom_maj'];
							$prenom=$donnes['prenom_maj'];
							$adresse=$donnes['adresse'];
							$telephone=$donnes['telephone'];
							?>
							<center><h2 class="text">Informations sur l'abonné <?php echo"$prenom $nom<br/> Village: $adresse &nbsp&nbsp Identifiant: $id"?> </h2></center>
								<table border="1" class="text">
									<tr><th>Date</th><th>Ancien Index</th><th>Nouvel Index</th><th>N°Facture</th><th>Facturer</th></tr>
									<?php
							
							}
						$requete2="SELECT id_abonne,id,ancien_index,nouvel_index,date_index, id_compteur FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE id_abonne=$id ORDER BY date_index DESC ";
						$resultat2=mysql_query($requete2); 
					while ($donnees = mysql_fetch_array($resultat2))
							{
					
							echo 
							'<tr><td>' . htmlspecialchars($donnees['date_index']) .'</td>'
							.'<td>'. htmlspecialchars($donnees['ancien_index']) .'</td>'
							.'<td>'. htmlspecialchars($donnees['nouvel_index']) .'</td>'
							.'<td>'. htmlspecialchars($donnees['id_compteur']) .'</td>'
							.'<td><form method="post" action="facture.php" target="_blank">
							<input type="hidden" name="id_compteur" value="'. htmlspecialchars($donnees['id_compteur']) .'" /> 
							<input type="hidden" name="id_abonne"  value="'. htmlspecialchars($donnees['id_abonne']) .' " />
							<input type="submit" value="Ok" />    
							</form></td></tr>';
							}
    
									?>
								</table><br/><br/>
	 
						<?php
						$repons = mysql_query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,ancien_index,nouvel_index,id,id_compteur,MAX(nouvel_index) AS indexe FROM abonne
									JOIN compteur
									ON abonne.id_abonne=compteur.id
									WHERE id=$id ORDER BY date_index DESC ");
						while ($donnes = mysql_fetch_array($repons))
							{
								$indexe=$donnes['indexe'];
								$id_abonne=$donnes['id_abonne'];
							}
						?>
					<form name="formulaire" method="POST" action="traitement_index.php" class="text" onSubmit="return verif_formulaire()">
					<fieldset>
						<legend>Enregistrer les données du prélevement</legend><br/>
						<input type="hidden" name="id_abonne"value="<?php echo $id_abonne;?>" /> 
						<table>
						<tr><td><label for="ancien_index">Ancien Index</label> :</td><td><input type="text" name="ancien_index"  value="<?php echo $indexe?>"/></td></tr>
						<tr><td><label for="nouvel_index">Nouvel Index</label> :</td><td><input type="text" name="nouvel_index" /></td></tr>
						<tr><td><label for="date">Date</label> 		    :</td><td><input type="text" name="date"  class="calendrier" value="<?php echo "$annee-$mois-25";?>" /></td></tr>
						</table>
						<input type="submit" name="submit" value="Valider"  "/>    <input type="reset" value="Reset"/>
					</fieldset>
					</form>
				</td>
			</tr>
			<tr>
				<td height="50" colspan="2" align="center" valign="midlle" >PIED DE PAGE</td>
			</tr>
		</table>
	</body>
</html>
