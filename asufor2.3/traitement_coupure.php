<?php
	
require_once ('connexion_bd.php');
require_once ('classes/Statistique.php');

$objet=new Statistique(0,0);

//récupération des informations 

$id_abonne=$_POST['id_abonne'];
	
//on change l'état de la facture

$objet->etat_facture_rouge($bdd,$id_abonne);
	
// on cchange l'etat de l'abonné 	
		
$objet->etat_abonne_rouge($bdd,$id_abonne);
		
//on le redrige vers la page d'alerte OK.php
	
?>
<script language="JavaScript">
	alert("Modification effectuée avec succès!!");
	window.location.replace("traitement_historique1.php");// On inclut le formulaire d'identification
</script>