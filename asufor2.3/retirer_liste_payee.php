<?php
session_start();
require_once ('header.php'); 
require_once ('connexion_bd.php');
require_once ('classes/Statistique.php' );


$objet=new Statistique(0,0);

//récupération des informations 
	$id_abonne=$_POST['id_abonne'];
//execution des requetes
	
$objet->changeEtatFact($bdd,$id_abonne);
$objet->changeEtatAbonne($bdd,$id_abonne);	
	
	?>
<script language="JavaScript">
		alert("Modification effectuée avec succès!!");
		window.location.replace("statistique.php");// On inclut le formulaire d'identification
	</script>