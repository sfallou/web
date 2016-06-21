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
	<body onload="plus()" >
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
				<?php			
					$id_compteur=$_POST['id_compteur'];
					$id_abonne=$_POST['id_abonne'];
					echo'<h3 class="text">Modification index de l\'abonné N° '.  $id_abonne.'</h3>';
					$reponse = mysql_query("SELECT * FROM compteur WHERE id_compteur='$id_compteur'");
					if($donnees = mysql_fetch_array($reponse))
						{
							echo
								'<form method="post" action="traitement_modifier_index_gerant.php" class="text">
								<fieldset><legend>Modifier les enregistrements de la date du '. htmlspecialchars($donnees['date_index']) .' </legend> 
								<table>
								<tr><td>Nouvel Index</td><td><input type="text" name="nouvel_index" value="'. htmlspecialchars($donnees['nouvel_index']) .'" /></td></tr> 
								<input type="hidden" name="id_compteur" value="'. htmlspecialchars($donnees['id_compteur']) .'" />
								<input type="hidden" name="date_index" value="'. htmlspecialchars($donnees['date_index']) .'" />
								<input type="hidden" name="id_abonne" value="'. $id_abonne .'" />';
								
						}	?>
									<tr><td colspan="2" align="center"><input type="submit" value="VALIDER" /></td></tr></table>
								</fieldset> 
								</form>
				</td>
			</tr>
			<tr>
				<td height="50" colspan="2" align="center" valign="midlle" ><?php include("footer.php");?></td>
			</tr>
		</table>
	</body>
</html>
