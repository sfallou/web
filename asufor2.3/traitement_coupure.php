<?php
	
require_once ('connexion_bd.php');
require_once ('classes/Statistique.php');

$objet=new Statistique(0,0);

//r�cup�ration des informations 

$id_abonne=$_POST['id_abonne'];
	
//on change l'�tat de la facture

$objet->etat_facture_rouge($bdd,$id_abonne);
	
// on cchange l'etat de l'abonn� 	
		
$objet->etat_abonne_rouge($bdd,$id_abonne);
		
//on le redrige vers la page d'alerte OK.php
	
?>
<script language="JavaScript">
	alert("Modification effectu�e avec succ�s!!");
	window.location.replace("traitement_historique1.php");// On inclut le formulaire d'identification
</script>