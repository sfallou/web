<?php
//connexion à la base de données
require("connexion_bd.php");

	//récupération des informations 
$cni=$_POST['cni'];	
$choix=$_POST['choix'];
if($choix=="Oui")
	{
		$req=mysql_query("SELECT * FROM attente WHERE cni='$cni' AND etat=0");
							while($data=mysql_fetch_array($req))
							{
							$prenom=$data['prenom'];
							$nom=$data['nom'];
							$adresse=$data['adresse'];
							$telephone=$data['telephone'];
							$date_abonnement=$data['date_abonnement'];
							$timestamp=$data['timestamp'];
							$frais=$data['frais_abonnement'];
							}
		    // Insertion des informations dans la table abonne
		$requete = " INSERT INTO abonne (prenom,nom,cni,telephone,adresse,date_abonnement,timestamp,frais_abonnement) VALUES('$prenom','$nom','$cni','$telephone','$adresse','$date_abonnement','$timestamp','$frais')";
		$resultat= mysql_query($requete);	
		$req1=mysql_query("DELETE FROM attente WHERE cni='$cni'");
		header('Location: validation_abonne.php');
		?>
	<script language="JavaScript">
	alert("L'abonnement a été validé avec succès!!");
	window.location.replace("validation_abonne.php");// On inclut le formulaire d'identification
	</script>
	<?php
	}
 else if($choix=="Non")
	{
	$req2=mysql_query("UPDATE attente SET etat=1 WHERE cni='$cni'");
		?>
	<script language="JavaScript">
	alert("L'abonnement n'a pas été validé!");
	window.location.replace("validation_abonne.php");// On inclut le formulaire d'identification
	</script>
	<?php	
	}
?>