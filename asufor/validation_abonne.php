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
					<center><h2 class="text">Valider les abonnements enregistrés par le gérant</h2></center>
					<table>
						<tr>
							<td class="text"  >
							<?php 
							$req=mysql_query("SELECT * FROM attente WHERE etat=0");
							
							
							echo"<table border='1' class='text'>
									<tr><th>Prénom</th><th>Nom</th><th>Adresse</th><th>CNI</th><th>Téléphone</th><th>Date</th><th>Décision</th></tr>";
								while($donnees=mysql_fetch_array($req))
								{
									echo 
									'<tr><td>' . htmlspecialchars($donnees['prenom']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['nom']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['adresse']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['cni']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['telephone']) .'</td>'
									.'<td>'. htmlspecialchars($donnees['date_abonnement']) .'</td>'
									.'<td><form method="post" action="traitement_validation.php">
									<input type="hidden" name="cni" value="'. htmlspecialchars($donnees['cni']) .'" /> 
									<label >Oui</label> <input type="radio" name="choix" checked value="Oui" />
									&nbsp&nbsp<label >Non</label><input type="radio"  name="choix"  value="Non" /><br/>
									&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit"  value="ok" />
									</form></td></tr>';
								}
							
							?>
							</td>
						</tr>
					</table> 
				</td>
			</tr>
		</table>
	</body>
</html>
