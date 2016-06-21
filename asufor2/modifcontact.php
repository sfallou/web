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
$donnees1=$reponse->fetch();

$cni=$donnees1['cty_nci'];
//echo$cni;
$req2 = "SELECT * FROM contacts WHERE cty_contact_cni=:cni";
$reponse2 = $bdd->prepare($req2);
$reponse2->execute(array("cni"=>$cni));

if($donnees=$reponse2->fetch()){

	// On affiche chaque entrée une à une
	
	echo '		<center><h2  align=center >Modifier Les Coordonnees</h2>
					<table width="500px" class="formulaire" ><tr><td align="center" >
					<form  action="traitementmodifcontact.php" method="POST" enctype="multipart/form-data">
					</br>
					<input type="hidden" name="idcontact" value="'. htmlspecialchars($donnees['cty_contact']) .'" /> 
					<tr><td>	Telephone		</td><td><input type="text"  name="Telephone" placeholder="Telephone" value="'. htmlspecialchars($donnees['cty_telephone']) .'"  /></br></br>
					<tr><td>	Email	</td><td><input type="text"  name="email" placeholder="Email" value="'. htmlspecialchars($donnees['cty_email']) .'" /></br></br>
					<tr><td>	Tel Gondwana	</td><td><input type="text"  name="telGondwana" placeholder="Telephone Gondwana" value="'. htmlspecialchars($donnees['cty_telGondwana']) .'" /></br></br>      
					<tr><td>	Adresse Gondwana	</td><td><input type="text"  name="adresseGondwana" placeholder="Adresse Gondwana"  value="'. htmlspecialchars($donnees['cty_adresseGondwana']) .'" /></br></br>
					<tr><td>	Telephone Senegal	</td><td><input type="text"  name="telSenegal" placeholder="Telephone Senegal" value="'. htmlspecialchars($donnees['cty_telSenegal']) .'" /></br></br>
					<tr><td>	Adresse Senegal	</td><td><input type="text"  name="adresseSenegal" placeholder="Adresse Senegal" value="'. htmlspecialchars($donnees['cty_adresse']) .'" /></br></br>
					<tr><td>	Adresse Travail	</td><td><input type="text"  name="adresseTravail" placeholder="Adresse Travail"  value="'. htmlspecialchars($donnees['cty_adresseTravail']) .'" /></br></br>
					<tr><td>	adresse Domicile	</td><td><input type="text"  name="adresseDomicile" placeholder="adresse Domicile"  value="'. htmlspecialchars($donnees['cty_adresseDomicile']) .'" /></br></br>
					<tr><td>	CIN	</td><td><input type="text"  name="contactcni" placeholder="CIN"  value="'. htmlspecialchars($donnees['cty_contact_cni']) .'" /></br></br>
					<tr><td>		</td><td><input   type="submit" value="Ajouter"/>
					
					</form>
					</td></tr></table>
					</center>
';
}

?>
	<br/><br/>
	</td>
</tr>
<tr>
	<?php include("footer.php");?>
</tr>
</table>
</center>




