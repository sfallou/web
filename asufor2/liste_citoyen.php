<?php
//require("head.php");
require("verification.php");
?>
<?php
//////////////////////////////////// Liste_citoyen /////////////////////////////////////////////


//$req = "select * from dic_citoyen";
$reponse = $bdd->query("select * from dic_citoyen");
	
echo"<center><h1>Liste des citoyens</h1>
<table border='1'  >
	<tr style='font-size: 15px;
  margin:2px;
  color: #FFF;
  font-family: Arial,sans-serif;
  background: #394963;' ><td>Immatricule</td><td>Prenom</td><td>Nom</td><td>Date de naissance</td><td>Lieu de naissance</td><td>CNI</td><td>Detailler</td><td>Modifier</td><td>Imprimer Carte</td><td>Supprimer</td></tr>";
// On affiche chaque entr�e une � une
while ($donnees = $reponse->fetch())
{
?>
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
<?php
}
$reponse->closeCursor(); // Termine le traitement de la requ�t
echo "</table></center>";
?>
