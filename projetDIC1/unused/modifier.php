<?php
require("head.php");
require("verification.php");

//$nom=strtolower($_POST['nom']);
$id=$_GET['id'];
if(isset($id)){
	
$req = "select * from dic_citoyen where cty_id= :id ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("id"=>$id));
include ("menu.php");
	// On affiche chaque entrée une à une
	if ($donnees = $reponse->fetch())
	{
	echo
						'<form method="post" action="traitement_modifier_abonne.php" >
						<fieldset><legend>Modifier les informations d\'un citoyen</legend> 
						<table class="text" width="500">
						<tr><td><label for="prenom">Prenom</label>:</td><td><input type="text" name="prenom" value="'. htmlspecialchars($donnees['cty_prenom']) .'" /></td></tr> 
						<input type="hidden" name="id_abonne" value="'. htmlspecialchars($donnees['cty_id']) .'" /> 
						
						<tr><td><label for="nom">Nom</label>:</td><td><input type="text" name="nom" value="'. htmlspecialchars($donnees['cty_nom']) .'" /></td></tr> 
						
						<tr><td><label for="adresse">Lieu de naissance</label>:</td><td><input type="text" name="adresse" value="'. htmlspecialchars($donnees['cty_lieunaissance']) .'" /></td></tr> 
						<tr><td><label for="adresse">Date naissance</label>:</td><td><input type="text" name="datenaiss" value="'. htmlspecialchars($donnees['cty_datenaissance']) .'" /></td></tr> 
						<tr><td><label for="cin">CNI</label>:</td><td><input type="text" name="cni" value="'. htmlspecialchars($donnees['cty_nci']) .'" /></td></tr>
						';
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
	window.location.replace("body.php");// On inclut le formulaire d'identification
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
