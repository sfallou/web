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
					<h2 class="text">Enregistrer les dettes</h2>
						<form method="post" action="traitement_dette.php" >
							<fieldset>
								<legend>Informations</legend>
							<table class="text" width="500">
								<tr><td><label for="id_abonne">Identifiant abonné :</label></td><td><input type="text" name="id_abonne" id="id_abonne"  tabindex="20" /></td></tr>
								<tr><td><label for="num_facture">N°facture :</label></td><td><input type="text" name="num_facture" id="num_facture" tabindex="30" /></td></tr>
								<tr><td><label for="dette">Montant dette :</label></td><td><input type="text" name="dette" id="dette" tabindex="40"/></td></td>
								<tr><td><label for="date">Date d'enregistrement dette :</label></td><td><input type="text" name="date" id="date"  class="calendrier" tabindex="50"/></td></tr>
							</table>
							</fieldset>
							<input type="reset" value="Reset" />  <input type="submit" value="Valider" />   
						</form>
				</td>
			</tr>
			
		</table>
	</body>
</html>
