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
?>	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Modification Abonnement</h2></center>
						<?php
if(!isset($_POST['id']))
	{
?>
	<form method="post" action="modifier_abonne.php" >
		<fieldset><legend>Modifier les informations d'un abonné</legend> 
		<table class="text">
			<tr></tr>
			<tr><td><label for="id">Quel est l'ID de l'abonné à modifier?</label> :</td><td><input type="text" size="10" name="id" id="id" /></td></tr>
			<tr><td><br/>&nbsp <input type="reset" value="Reset" /></td><td><br/><input type="submit" value="Valider" /></td></tr>	
		</table>
		</fieldset>
 </form>			
<?php						
					
	}
else
	{
 $id_abonne=$_POST['id'];
		$reponse = mysql_query("SELECT * FROM abonne WHERE id_abonne='$id_abonne' ");
		if($donnees =mysql_fetch_array($reponse))
		{
		
		echo
						'<form method="post" action="traitement_modifier_abonne.php" >
						<fieldset><legend>Modifier les informations d\'un abonné</legend> 
						<table class="text" width="500">
						<tr><td><label for="prenom">Prénom</label>:</td><td><input type="text" name="prenom" value="'. htmlspecialchars($donnees['prenom']) .'" /></td></tr> 
						<input type="hidden" name="id_abonne" value="'. htmlspecialchars($donnees['id_abonne']) .'" /> 
						
						<tr><td><label for="nom">Nom</label>:</td><td><input type="text" name="nom" value="'. htmlspecialchars($donnees['nom']) .'" /></td></tr> 
						
						<tr><td><label for="adresse">Adresse</label>:</td><td><input type="text" name="adresse" value="'. htmlspecialchars($donnees['adresse']) .'" /></td></tr> 
						<tr><td><label for="cin">CNI</label>:</td><td><input type="text" name="cni" value="'. htmlspecialchars($donnees['cni']) .'" /></td></tr>
						<tr><td><label for="telephone">Téléphone</label>:</td><td><input type="text" name="telephone" value="'. htmlspecialchars($donnees['telephone']) .'" /></td></tr> ';
			 ?>
						<tr><td colspan="2" align="center"><input type="submit" value="VALIDER" /></td></tr>
						</fieldset> 
						</form>
<?php
		}
		else
		{
		?>
		<script language="JavaScript">
	alert("Echec!! Merci de recommencer");
	window.location.replace("modifier_abonne.php");// On inclut le formulaire d'identification
	</script>
<?php
		}
	}
?>								
				</td>
			</tr>
			
		</table>
	</body>
</html>
