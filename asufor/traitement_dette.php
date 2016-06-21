<?php
//connexion à la base de données
require("connexion_bd.php");
	//récupération des informations 
$id_abonne=$_POST['id_abonne'];	
$num_facture=$_POST['num_facture'];
$montant_dette=$_POST['dette'];
$date_dette=$_POST['date'];
$etat=0;
$timestamp=strtotime($date_dette);  //conversion de la date d'abonnement en timestamp
    // Insertion des informations dans la table abonne
$requete = " INSERT INTO dette (montant_dette,num_facture,id_abonne,date_dette,timestamp,etat) VALUES('$montant_dette','$num_facture','$id_abonne','$date_dette','$timestamp','$etat')";
$resultat= mysql_query($requete);	

?>
<script language="JavaScript">
	alert("Les informations ont été modifiés avec succès!!");
	window.location.replace("enregistrer_dette.php");// On inclut le formulaire d'identificatio
	</script>