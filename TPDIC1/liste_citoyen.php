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
  background: #394963;' ><td>Id</td><td>Prénom</td><td>Nom</td><td>Date de naissance</td><td>Lieu de naissance</td><td>CNI</td><td>Modifier</td><td>Supprimer</td></tr>";
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
   <tr>
	<tr >
    <td align="center"><?php echo $donnees['cty_id']; ?></td>
	<td align="center"><?php echo $donnees['cty_prenom']; ?></td>
	<td align="center"><?php echo $donnees['cty_nom']; ?></td>
	<td align="center"><?php echo $donnees['cty_datenaissance']; ?></td>
	<td align="center"><?php echo $donnees['cty_lieunaissance']; ?></td>
	<td align="center"><?php echo $donnees['cty_nci']; ?></td>
	<td align="center"><a href="modifier.php?id=<?php echo $donnees['cty_id']; ?>"><img src="images/modif.png" width="34" height="31"></a></td>
	<td align="center"><a href="supprimer.php?id=<?php echo $donnees['cty_id']; ?>"><img src="images/sup.jpg" width="28" height="30"></a></td>  
   </tr>
<?php
}
$reponse->closeCursor(); // Termine le traitement de la requêt
echo "</table></center>";
?>
