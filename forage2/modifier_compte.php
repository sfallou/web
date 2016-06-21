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
					<center><h2 class="text">Modifier les paramètres d'un compte</h2></center>
					<?php	
	if(!isset($_POST['choix']))
		{
		?>
			<form method="post" action="modifier_compte.php" class="text">
				<fieldset><legend>Choix du compte à modifier</legend>
				<table>
					<tr><td><label for="administrateur"> Administrateur?</label></td><td><input type="radio" name="choix" value="administrateur" checked /></td></tr>
					<tr><td><label for="gerant"> Gérant?</label></td><td><input type="radio" name="choix" value="gerant"/></td></tr>
					<tr><td><label for="tresorier"> Trésorier?</label></td><td><input type="radio" name="choix" value="tresorier"/></td></tr>
					<tr><td colspan="2"><input type="submit" value="Valider" /></td></tr>
				</table>
				</fieldset>
			</form>
		<?php
		}
	else
		{
		 if(isset($_POST['choix']) AND $_POST['choix']=="administrateur")
			{
			?>
			<form  name="formulaire_update" onSubmit="return verification_formulaire_update()" method="post" action="traitement_modifier_compte.php" class="text">
				<fieldset><legend>Modifier le mot de passe administrateur</legend>
				<table>
					<tr><td><label for="admin1">Entrez le mot de passe actuel de l'administrateur</label> :</td><td> <input type="password" name="pass1" id="pass1" /></td></tr>
					<tr><td><label for="admin2">Entrez un nouveau mot de passe pour l'administrateur</label> : </td><td><input type="password" name="pass2" id="pass2" /></td></tr>
					<tr><td><label for="admin3">Confirmer le mot de passe pour l'administrateur</label> :</td><td> <input type="password" name="pass3" id="pass3" /></td></tr>
					<tr><td><input type="reset" value="Reset" /><td><td><input type="submit" value="Valider" /></td></tr>
				</fieldset>
				</table>
				<input type="hidden" name="profil" value="administrateur"/>
			</form>			
			
			<?php
			}
		 if(isset($_POST['choix']) AND $_POST['choix']=="gerant")
			{
			?>
			<form  name="formulaire_update" onSubmit="return verification_formulaire_update()" method="post" action="traitement_modifier_compte.php" class="text">
				<fieldset><legend>Modifier le mot de passe du gérant</legend>
				<table>
					<tr><td><label for="gerant1">Entrez le mot de passe actuel du gérant</label> :</td><td> <input type="password" name="pass1" id="pass1" /></td></tr>
					<tr><td><label for="gerant2">Entrez le nouveau mot de passe du gérant</label> :</td><td> <input type="password" name="pass2" id="pass2" /></td></tr>
					<tr><td><label for="gerant3">Confirmer mot de passe du gérant</label> : </td><td><input type="password" name="pass3" id="pass3" /></td></tr>
					<tr><td><input type="reset" value="Reset" /><td><td><input type="submit" value="Valider" /></td></tr>
				</table>
				</fieldset>
				<input type="hidden" name="profil" value="gerant"/>
			</form>			
			<?php
			}
			else if(isset($_POST['choix']) AND $_POST['choix']=="tresorier")
			{
			?>
			<form  name="formulaire_update" onSubmit="return verification_formulaire_update()" method="post" action="traitement_modifier_compte.php" class="text" >
				<fieldset><legend>Modifier le mot de passe du trésorier</legend>
				<table>
					<tr><td><label for="tresorier1">Entrez le mot de passe actuel du trésorier</label> :</td><td> <input type="password" name="pass1" id="pass1" /></td></tr>
					<tr><td><label for="tresorier2">Entrez le nouveau mot de passe du trésorier</label> :</td><td><input type="password" name="pass2" id="pass2" /></td></tr>
					<tr><td><label for="tresorier3">Confirmer mot de passe du trésorier</label> : </td><td><input type="password" name="pass3" id="pass3" /></td></tr>
					<tr><td><input type="reset" value="Reset" /><td><td><input type="submit" value="Valider" /></td></tr>
				</table>
				</fieldset>
				<input type="hidden" name="profil" value="tresorier"/>
			</form>
			<?php
			}
		}
?>
					
				</td>
			</tr>
			
		</table>
	</body>
</html>

















	
	
	
