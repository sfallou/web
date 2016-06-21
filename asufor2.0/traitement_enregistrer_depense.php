<?php
 require('head.php');
 require('header.php'); 
 require('classes/utilisateurs.php');

	//récupération des informations 
$frais_gazoil=$_POST['gazoil'];	
$frais_senelec=$_POST['electricite'];
$frais_entretien=$_POST['entretien'];
$salaire_releveur=$_POST['salaire_releveur'];
$salaire_gerant=$_POST['salaire_gerant'];
$salaire_conducteur=$_POST['salaire_conducteur'];
$divers=$_POST['divers'];
$detail=$_POST['note'];
$date_depense=$_POST['date'];
/***************************/
$depense=new Finance($bdd);
$depense->saveDepense($frais_gazoil,$frais_senelec,$frais_entretien,$salaire_releveur,$salaire_gerant,$salaire_conducteur,$divers,$detail,$date_depense);
?>
	<script language="JavaScript">
		alert("Depense enregistrer avec succes!!");
		window.location.replace("enregistrer_depense.php");
	</script>