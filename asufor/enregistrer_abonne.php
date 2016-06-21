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
					<center><h2 class="text">Nouveau Abonnement</h2></center>
					<form name="formulaire_abonne" onSubmit="return verification_formulaire_abonne()" action="traitement_enregistrer_abonne.php" method="POST" >
							<fieldset>
								<legend>Enregistrer un nouvel abonné</legend>
									<table class="text">
										<tr><td>Prenom(s):</td><td><input type="text" name="prenom" id="prenom"  tabindex="20" /></td></tr>
										<tr><td>Nom:</td><td><input type="text" name="nom" id="nom" tabindex="30" /></td></tr>
										<tr><td>CNI:</td><td> <input type="text" name="cni" id="cni"  tabindex="40"/></td></tr>
										<tr><td>Téléphone:</td><td><input type="text" name="telephone" id="telephone"  tabindex="40"/></td></tr>
										<tr><td>Adresse:</td>
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
											<td>Date d'abonnement:</td>
											<td><input type="text" name="date"  class="calendrier" id="date"/></td>
										</tr>
										<tr>
											<td><label for="ancien_index">Ancien Index:</label></td>
											<td><input type="text" name="ancien_index" id="ancien_index" tabindex="60" /></td>
										</tr>
										<tr>
											<td>Frais d'abonnement:</td>
											<td><input type="text" name="frais_abonnement" id="frais_abonnement" tabindex="60" /></td>
										</tr>
										<tr><td><br/>&nbsp <input type="reset" value="Reset" /></td> &nbsp &nbsp &nbsp <td><br/><input type="submit" value="Valider" /></td></tr>
									</table>
							</fieldset>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>

			 
                 


























