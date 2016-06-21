<?php
require('head.php');
 require('header.php'); 
 require('classes/utilisateurs.php');

	//récupération des informations 
$id_abonne=$_POST['id_abonne'];	
$num_facture=$_POST['num_facture'];
$montant_dette=$_POST['dette'];
$date_dette=$_POST['date'];
/***************************/
$dette=new Finance($bdd);
$dette->saveDette($id_abonne,$num_facture,$montant_dette,$date_dette);
?>
<script language="JavaScript">
	alert("La dette a ete enregistree avec succès!!");
	window.location.replace("enregistrer_dette.php");// On inclut le formulaire d'identificatio
	</script>