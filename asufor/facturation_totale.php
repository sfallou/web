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
					<center><h2 class="text">Choisir une période pour imprimer l'ensemble des factures de cette période</h2></center>
					<p>
						<form method="post" action="totale_facture.php" class="text" >
						<fieldset>
						<legend>Période de facturation</legend>
							<label for="date1">DU</label> <input type="text" name="date1"  class="calendrier" />
							<label for="date2">AU</label> <input type="text" name="date2"  class="calendrier" />
							<input type="submit" value="Valider" />
						</fieldset>
						</form>		 
					</p><br/><br/>
					<center><h2 class="text">Imprimer un bon d'abonnement</h2></center>
					<p>
						<form method="post" action="bon_abonnement2.php" class="text" >
							<fieldset>
								<legend>Bon d'abonnement</legend>
									<label for="id_abonne">ID abonné</label> <input type="text" name="id_abonne" />
									<input type="submit" value="Valider" />
								</fieldset>
						</form>	
				</td>
			</tr>
			
		</table>
	</body>
</html>





