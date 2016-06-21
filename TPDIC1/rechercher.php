<?php
require("head.php");
require("verification.php");

//$nom=strtolower($_POST['nom']);
$nom=$_POST['nom'];

$req = "select * from dic_citoyen where cty_nom= :nom ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("nom"=>$nom));
$rep=$reponse->fetchAll();
$n=count($rep);
$reponse->closeCursor();
echo "Résultat(s) trouvé(s): $n";
if($n!=0){

$requ = "select * from dic_citoyen where cty_nom= :nom ";
$rep = $bdd->prepare($req);
$rep->execute(array("nom"=>$nom));
	// On affiche chaque entrée une à une
	while ($donnees = $rep->fetch())
	{
	?>
    	<p>
		<strong>id</strong> : <?php echo $donnees['cty_id']; ?>
		<strong>Prénom</strong> : <?php echo $donnees['cty_prenom']; ?>
		<strong>Nom</strong> : <?php echo $donnees['cty_nom']; ?>
		<strong>Date de naissance</strong> : <?php echo $donnees['cty_datenaissance']; ?>
		<strong>Lieu de naissance</strong> : <?php echo $donnees['cty_lieunaissance']; ?>
		<strong>N° CNI</strong> : <?php echo $donnees['cty_nci']; ?>
		<br>
	<!--  <a href="toto.php?id=<?php //echo $donnees['cty_id']; ?>"><img src="../../nic/icones/iedit.png" width="34" height="31"></a><a href="supprimer.php?id=<?php //echo $donnees['cty_id']; ?>"><img src="../../nic/icones/resilier.png" width="28" height="30"></a><br />   -->
  		 </p>
	<?php
	}
	$rep->closeCursor(); // Termine le traitement de la requêt
}
?>
