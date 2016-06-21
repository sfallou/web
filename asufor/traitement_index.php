<?php
//connexion à la base de données
require("connexion_bd.php");
	//récupération des informations 
$id_abonne=$_POST['id_abonne'];	
$ancien_index=$_POST['ancien_index'];
$nouvel_index=$_POST['nouvel_index'];
$date_index=$_POST['date'];
$etat=0;
$timestamp=strtotime($date_index);  //conversion de la date d'abonnement en timestamp
    // Insertion des informations dans la table abonne
$requete = " INSERT INTO compteur (ancien_index,nouvel_index,date_index,timestamp,etat,id) VALUES('$ancien_index','$nouvel_index','$date_index','$timestamp','$etat','$id_abonne')";
$resultat= mysql_query($requete);
//$requete = " UPDATE compteur SET ancien_index='$ancien_index',nouvel_index='$nouvel_index',date_index='$date_index',timestamp='$timestamp',etat='$etat' WHERE id='$id_abonne' AND ancien_inex='$ancien_index'";
//$resultat= mysql_query($requete);	
	?>
	<script language="JavaScript">
	alert("Enregistré avec succès!!");
	window.location.replace("liste_abonnes.php");// On inclut le formulaire d'identification
	</script>