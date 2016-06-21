<?php
// Enregistrons les informations de date dans des variables

$jour = date("d");
$mois = date("m");
$annee = date("Y");
$heure = date("H");
$minute = date("i");
// Connexion à la base de données
require("connexion_bd.php");
?>
   
<!DOCTYPE html>
	<html>
	  <?php 
	 include("abonnes.php");
	 ?>
	  <body>
		<?php
		if($_POST['village']=="seokhaye")
			{
			include("seo.php");
			}
		elseif($_POST['village']=="sine")
			{
			include("sine.php");
			}
		elseif($_POST['village']=="keur_ibra")
			{
			include("keur_ibra.php");
			}
		elseif($_POST['village']=="khourwa")
			{
			include("khourwa.php");
			}
		elseif($_POST['village']=="kanene")
			{
			include("kanene.php");
			}
		elseif($_POST['village']=="keur_malamine")
			{
			include("keur_malamine.php");
			}
		elseif($_POST['village']=="keur_mory")
			{
			include("keur_mory.php");
			}
		elseif($_POST['village']=="daraja")
			{
			include("daraja.php");
			}
		else
			{
			echo "error";
			}
			?>
		</body>
	</html>	
