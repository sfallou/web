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
					<center><h2 class="text">Gestion des listes (verte, rouge, suspendue)</h2></center>
					<table border="0" class="tab">
						<tr>
							<td class="text" colspan="2">
								<center><h2 class="text">Choisir le village, le mois et l'année</h2></center>
								<form name="formulaire_finance" onSubmit="return verification_formulaire()"  method="post" action="etat_facturation.php">
									<fieldset>
									<legend>Date & Adresse</legend>
									<table class="table">
										<tr><th>Adresse</th><th>Mois</th><th>Année</th></tr>
										<tr>
											<td><select name="adresse">
													<option value="seokhaye">Séokhaye</option>
													<option value="sine">Sine</option>
													<option value="keur_ibra">Keur Ibra</option>
													<option value="kanene">Kanene</option>
													<option value="daraja">Daraja</option>
													<option value="khourwa">Khourwa</option>
													<option value="keur_malamine">Keur malamine</option>
													<option value="keur_mory">Keur mory</option>
												</select>
											</td>
											<td><select name="mois">
													<option value="01">Janvier</option>
													<option value="02">Février</option>
													<option value="03">Mars</option>
													<option value="04">Avril</option>
													<option value="05">Mai</option>
													<option value="06">Juin</option>
													<option value="07">Juillet</option>
													<option value="08">Août</option>
													<option value="09">Septembre</option>
													<option value="10">Octobre</option>
													<option value="11">Novembre</option>
													<option value="12">Décembre</option>
												</select>
											</td>
											<td><input type="text" name="annee" value="2015"/></td>
										</tr>
										<tr><br/><td colspan="3"><input type="submit" value="VALIDER" style="margin-left:150px"/></td>
									</table>																		       
									</fieldset>
								</form> 
							</td>
						</tr>
					</table>  
					
				</td>
			</tr>
			
		</table>
	</body>
</html>





