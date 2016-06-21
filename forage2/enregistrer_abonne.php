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
					<center><h2 class="text">Nouveau Abonnement</h2></center>
					<form name="formulaire_abonne" onSubmit="return verification_formulaire_abonne()" action="traitement_enregistrer_abonne.php" method="POST" class="text" >
							<fieldset>
								<legend>Enregistrer un nouvel abonné</legend>
									<table>
										<tr><td><label for="prenom">Prenom(s): </label></td><td><input type="text" name="prenom" id="prenom"  tabindex="20" /></td></tr>
										<tr><td><label for="nom">Nom:</label></td><td><input type="text" name="nom" id="nom" tabindex="30" /></td></tr>
										<tr><td><label for="cni">CNI:</label></td><td> <input type="text" name="cni" id="cni"  tabindex="40"/></td></tr>
										<tr><td><label for="telephone">Téléphone:</label></td><td><input type="text" name="telephone" id="telephone"  tabindex="40"/></td></tr>
										<tr><td><label for="adresse">Adresse:</label></td>
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
										</tr>
										<tr>
											<td><label for="date_abonnement">Date d'abonnement:</label></td>
											<td><input type="text" name="date_abonnement" id="date"/></td>
										</tr>
										<tr>
											<td><label for="frais_abonnement">Frais d'abonnement:</label></td>
											<td><input type="text" name="frais_abonnement" id="frais_abonnement" tabindex="60" /></td>
										</tr>
										<tr><td><br/><input type="reset" value="Reset" /></td> &nbsp &nbsp &nbsp <td><br/><input type="submit" value="Valider" /></td></tr>
									</table>
							</fieldset>
					</form>
				</td>
			</tr>
			
		</table>
	</body>
</html>

			 
                 


























