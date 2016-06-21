<?php
require('head.php');
 require('header.php'); 
 require('classes/utilisateurs.php');

	//récupération des informations 
$abreuvoir=$_POST['abreuvoir'];
$potence=$_POST['potence'];
$divers=$_POST['divers'];
$detail=$_POST['note'];
$date_recette=$_POST['date'];
/***************************/
$recette=new Finance($bdd);
$recette->saveRecette($abreuvoir,$potence,$divers,$detail,$date_recette);
?>
<script language="JavaScript">
	alert("Les recettes ont été enregistrées avec succès!!");
	window.location.replace("enregistrer_recette.php");
</script>