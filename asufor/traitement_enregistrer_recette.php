<?php
//connexion � la base de donn�es
require("connexion_bd.php");
	//r�cup�ration des informations 
//$r_facture=$_POST['r_facture'];	
//$bon_coupure=$_POST['bon_coupure'];
$abreuvoir=$_POST['abreuvoir'];
$potence=$_POST['potence'];
$divers=$_POST['divers'];
$detail=$_POST['note'];
$date_recette=$_POST['date'];
$timestamp=strtotime($date_recette);  //conversion de la date d'abonnement en timestamp
    // Insertion des informations dans la table abonne
$requete = " INSERT INTO recette (r_abreuvoir,r_potence,divers,date_recette,timestamp,detail) VALUES('$abreuvoir','$potence','$divers','$date_recette','$timestamp','$detail')";
$resultat= mysql_query($requete);
?>
<script language="JavaScript">
	alert("Les recettes ont �t� enregistr�es avec succ�s!!");
	window.location.replace("enregistrer_recette.php");// On inclut le formulaire d'identification
</script>