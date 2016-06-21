<?php

	require_once("header.php");
	require_once('connexion_bd.php');	
	require_once ('classes/Statistique.php' );

	$objet=new Statistique(0,0);
	
	//====.....récupération des informations.........====== 

	$id_abonne=$_POST['id_abonne'];
	
	//===....on change l'état de la facture.........=====

	$objet->changeEtatFact($bdd,$id_abonne);

	//===.... on cchange l'etat de l'abonné...======== 

	$objet->changeEtatAbonne($bdd,$id_abonne)	
		
		
	?>
	<script language="JavaScript">
		alert("Modification effectuee avec succes!!");
		window.location.replace("statistique.php");// On inclut le formulaire d'identification
	</script>
	