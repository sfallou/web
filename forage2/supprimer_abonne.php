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
					<center><h2 class="text">Suppression Abonné</h2></center>
					<form name="formulaire_tarif" onSubmit="return verification_formulaire_tarif()" action="traitement_supprimer_abonne.php" method="POST" class="text" >
                    <fieldset>
						<legend>Supprimer un abonné</legend>
						<table> 
							<tr><td><br/><label>ID de l'abonné à supprimer</label></td><td><br/><input type="text" name="nv_tarif"  /></td></tr>
							<tr><td> <br/><input type="reset" value="Reset"/></td><td><br/><input type="submit" value="Valider" /></td></tr>
						</table>
					</fieldset>
				</form>
				</td>
			</tr>
			
		</table>
	</body>
</html>

			 
                 


























