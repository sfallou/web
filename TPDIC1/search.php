<?php
require("head.php");
require("verification.php");

//$nom=strtolower($_POST['nom']);
$nom=$_POST['nom'];
if(!isset($nom)){
	?>
	<center>
<table cellspacing="10" class="form">
<form action="search.php" method="post" >
	<tr><td align="center">Saisie  le nom</td><tr>
	<tr><td align="center"><input type="text" name="nom" required placeholder="NOM" size="20" required/> </td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="Find"/></td></tr>
</form>
</table>
</center>
<?php
}
else{
	?>
	<style type="text/css">

p               { margin: 2em auto; margin-left: 5px;  border: 5px solid #394963;
                  padding: 0.8em; background: white;font-size: 20px;color: #394963; }

.page           { margin: 2em auto; width: 1000px;height:800px; border: 5px solid #ccc;
                  padding: 0.8em; background: white; }

	</style>
	<div class="page">
	<?php
$req = "select * from dic_citoyen where cty_nom= :nom ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("nom"=>$nom));
$rep=$reponse->fetchAll();
$n=count($rep);
$reponse->closeCursor();
include("menu.php");
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
		<strong>id</strong> : <?php echo $donnees['cty_id']; ?><br/>
		<strong>Prénom</strong> : <?php echo $donnees['cty_prenom']; ?><br/>
		<strong>Nom</strong> : <?php echo $donnees['cty_nom']; ?><br/>
		<strong>Date de naissance</strong> : <?php echo $donnees['cty_datenaissance']; ?><br/>
		<strong>Lieu de naissance</strong> : <?php echo $donnees['cty_lieunaissance']; ?><br/>
		<strong>N° CNI</strong> : <?php echo $donnees['cty_nci']; ?><br/>
		<br>
	<!--  <a href="toto.php?id=<?php //echo $donnees['cty_id']; ?>"><img src="../../nic/icones/iedit.png" width="34" height="31"></a><a href="supprimer.php?id=<?php //echo $donnees['cty_id']; ?>"><img src="../../nic/icones/resilier.png" width="28" height="30"></a><br />   -->
  		 </p>
	<?php
	}
	$rep->closeCursor(); // Termine le traitement de la requêt
}

echo"<br></div>";
}
?>

