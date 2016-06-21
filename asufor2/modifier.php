<?php
require("head.php");
require("verification.php");

$id=$_SESSION['id'];

?>
<center>
<table border=1 width="1200px">
	
<?php include("entete.php"); ?>
<tr>
	<td width="200px" align=center >
	<?php include("layoutGauche.php"); ?>
	</td>
	<td class=contenu ><br/><br/>
	<!-- code du contenu de la page -->

<?php
$req = "select * from dic_citoyen where cty_id= :id ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("id"=>$id));
$donnees=$reponse->fetch();
	// On affiche chaque entrée une à une
	
	echo

			
						'<form method="post" action="traitement_modifier_abonne.php" class="formulaire">
						<fieldset><legend>Modifier les informations d\'un citoyen</legend> 
						<table width="650px">
						


						<tr><td><label for="prenom">Prenom</label></td><td><input type="text" name="prenom" value="'. htmlspecialchars($donnees['cty_prenom']) .'" /></td></tr> 
						<input type="hidden" name="id_abonne" value="'. htmlspecialchars($donnees['cty_id']) .'" /> 
						
						<tr><td><label for="nom">Nom</label></td><td><input type="text" name="nom" value="'. htmlspecialchars($donnees['cty_nom']) .'" /></td></tr> 
						
						<tr><td><label for="adresse">Lieu de naissance</label></td><td><input type="text" name="adresse" value="'. htmlspecialchars($donnees['cty_lieunaissance']) .'" /></td></tr> 
						<tr><td><label for="adresse">Date naissance</label></td><td><input type="text" name="datenaiss" value="'. htmlspecialchars($donnees['cty_datenaissance']) .'" /></td></tr> 
						<tr><td><label for="cin">CNI</label></td><td><input type="text" name="cni" value="'. htmlspecialchars($donnees['cty_nci']) .'" /></td></tr>
						<tr><td><label for="datecnideliv">Date delivrance CNI</label></td><td><input type="text" name="datecnideliv" value="'. htmlspecialchars($donnees['cty_datecnidelivre']) .'" /></td></tr> 
						<tr><td><label for="datecniexp"> Date expiration CNI</label></td><td><input type="text" name="datecniexp" value="'. htmlspecialchars($donnees['cty_datecniexpire']) .'" /></td></tr> 
						
						<tr><td>  Sexe</td><td> Homme<input type="radio"  name="sexe"  value="masculin" checked/> &nbsp; &nbsp
 						Femme<input type="radio"  name="sexe"  value="feminin"  /></td></tr>


						<tr><td><label for="profession">Profession</label></td><td><input type="text" name="profession" value="'. htmlspecialchars($donnees['cty_profession']) .'" /></td></tr> 
						<tr><td><label for="specialite">Specialite</label></td><td><input type="text" name="specialite" value="'. htmlspecialchars($donnees['cty_specialite']) .'" /></td></tr> 
						
						<tr><td> Situation matrimoniale</td><td> Marie<input type="radio"  name="matrimonial"  value="marie" checked/>&nbsp; &nbsp
    					Celibataire<input type="radio"  name="matrimonial"  value="Celibataire" /></td></tr>




						<tr><td><label for="dateentre">Date dentree </label></td><td><input type="text" name="dateentree" placeholder="Date entree" value=" '. htmlspecialchars($donnees['cty_dateentre']) .'" /></td></tr> 
						
						
    					<tr><td>Teint</td><td><input type="text"  name="teint" placeholder="teint" value=" '. htmlspecialchars($donnees['cty_teint']) .'"/></td></tr>
   						 <tr><td>Taille</td><td><input type="text"  name="taille" placeholder="taille" value=" '. htmlspecialchars($donnees['cty_taille']) .'" /></td></tr>


   				


						';


			 ?>
						<tr><td colspan="2" align="center"><input type="submit" value="VALIDER" /></td></tr>

						
						</fieldset> 
						</form>

								
				</td>
			</tr>
			
		</table>

	<br/><br/>
	</td>
</tr>
<tr>
	<?php include("footer.php");?>
</tr>
</table>
</center>