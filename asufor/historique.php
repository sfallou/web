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
					<center><h2 class="text">Statistiques</h2></center>
					<table border="0" class="tab">
						<tr>
							<td class="text" colspan="2">
								<center><h2 class="text">Choisir une période de consultation des statistiques</h2></center>
								<form name="formulaire_finance" onSubmit="return verification_formulaire()"  method="post" action="traitement_historique.php">
									<fieldset>
									<legend>Période</legend>
									<label for="date1"> DU </label><input type="text" name="date1"   class="calendrier" />&nbsp&nbsp&nbsp
									<label for="date2"> AU </label><input type="text" name="date2"  class="calendrier"  /><br/><br/>
								    <input type="submit" value="VALIDER" style="margin-left:150px"/>   
									</fieldset>
								</form> 
							</td>
						</tr>
						<tr>
							<td valign="top">
							<br/>
							<?php include("total_abonne.php");?>
							</td>
							<td valign="top" >
							<br/>
								<?php include("total_consommation.php");?>
							</td>
						</tr>
					</table>  
					
				</td>
			</tr>
			
		</table>
	</body>
</html>





