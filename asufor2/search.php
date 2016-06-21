<?php
require("head.php");
require("verification.php");

//$nom=strtolower($_POST['nom']);
$immatricule=$_POST['immatricule'];
if(!isset($immatricule)){
	?>
	<center>
<table cellspacing="10" class="formulaire">
<form action="search.php" method="post" >
	<tr><td align="center">Saisir l'immatricule</td><td align="center"><input type="text" name="immatricule" required placeholder="N°immatricule" size="20" required/> </td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="Find"/></td></tr>
</form>
</table>
</center>
<?php
}
else{
	
$req = "select * from dic_citoyen where cty_immatricul= :immatricule ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("immatricule"=>$immatricule));

if ($donnees = $reponse->fetch())
	{
	?>
	<?php
require("head.php");
require("verification.php");
?>
<center>
<table border=1 width="1200px">
	
<?php include("entete.php"); ?>
<tr>
	<td width="200px" align=center >
	<?php include("layoutGauche.php"); ?>
	</td>
	<td class=contenu ><br/><br/>
	<center><h1>Citoyen retrouve</h1>
<table border='1'  >
	<tr style='font-size: 15px;  margin:2px;  color: #FFF;  font-family: Arial,sans-serif;  background: #394963;' >
	<td>Immatricule</td><td>Prenom</td><td>Nom</td><td>Date de naissance</td><td>Lieu de naissance</td><td>CNI</td><td>Detailler</td><td>Modifier</td><td>Imprimer Carte</td><td>Supprimer</td></tr>

      <tr>
	<tr >
    <td align="center"><?php echo $donnees['cty_immatricul']; ?></td>
	<td align="center"><?php echo $donnees['cty_prenom']; ?></td>
	<td align="center"><?php echo $donnees['cty_nom']; ?></td>
	<td align="center"><?php echo $donnees['cty_datenaissance']; ?></td>
	<td align="center"><?php echo $donnees['cty_lieunaissance']; ?></td>
	<td align="center"><?php echo $donnees['cty_nci']; ?></td>
	<td align="center"><a href="detailler.php?id=<?php echo $donnees['cty_id']; ?>"><img src="images/loupe.jpg" width="34" height="31"></a></td>
	<td align="center"><a href="modification.php?id=<?php echo $donnees['cty_id']; ?>"><img src="images/modif.png" width="34" height="31"></a></td>
	<td align="center"><a href="imprimer.php?id=<?php echo $donnees['cty_id']; ?>" target="blank"><img src="images/imprimer.jpg" width="34" height="31"></a></td>  
   	
	<?php
		if( $_SESSION['profilUser']=="agent"){
			?>
			<td align="center"><a href="#"><img src="images/sup.jpg" width="28" height="30"></a></td>
		<?php
		}
		else{
			?>
   	<td align="center"><a href="supprimer.php?id=<?php echo $donnees['cty_id']; ?>"><img src="images/sup.jpg" width="28" height="30"></a></td>
  		<?php
  		}
  		?>
   </tr>
</table>
	<?php
	}
	
else{
	echo"Aucun Citoyen retrouve";
	}
$reponse->closeCursor(); // Termine le traitement de la requêt
?>
<br/><br/>
	</td>
</tr>
<tr>
	<?php include("footer.php");?>
</tr>
</table>
</center>
<?php
}

?>

