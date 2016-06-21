<?php
//connexion à la base de données
require("connexion_bd.php");
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
$timestamp=strtotime($date_depense);  //conversion de la date d'abonnement en timestamp
    // Insertion des informations dans la table abonne
$requete = " INSERT INTO depense (d_senelec,d_gazoil,d_entretien,salaire_conducteur,salaire_gerant,salaire_releveur,d_divers,date_depense,timestamp,detail) VALUES('$frais_senelec','$frais_gazoil','$frais_entretien','$salaire_conducteur','$salaire_gerant','$salaire_releveur','$divers','$date_depense','$timestamp','$detail')";
$resultat= mysql_query($requete);
?>
<script language="JavaScript">
	alert("Les dépenses ont été enregistrées avec succès!!");
	window.location.replace("enregistrer_depense.php");// On inclut le formulaire d'identification
</script>