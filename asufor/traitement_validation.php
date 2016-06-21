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
							$ancien_index=$data['ancien_index'];
							}
		    // Insertion des informations dans la table abonne
		$requete = " INSERT INTO abonne (prenom,nom,cni,telephone,adresse,date_abonnement,timestamp,frais_abonnement) VALUES('$prenom','$nom','$cni','$telephone','$adresse','$date_abonnement','$timestamp','$frais')";
		$resultat= mysql_query($requete);	
		$req1=mysql_query("DELETE FROM attente WHERE cni='$cni'");
		
	//initialisation du compteur de l'abonne
		$requete2 = "SELECT id_abonne,date_abonnement FROM abonne WHERE cni='$cni' AND prenom='$prenom' AND nom='$nom'";
		$resultat2= mysql_query($requete2);
				while($donnes=mysql_fetch_array($resultat2))
					{
					$id_abonne=$donnes['id_abonne']; // clé secondaire : permet de lier un abonné à un compteur
					//$ancien_index=0;
					//$nouvel_index=0;
					$date_index=$donnes['date_abonnement'];
					$etat=0; //permet de catégoriser les abonnés: etat=0 => abonné dans la liste rouge
					}
	//insertion des valeurs dans la table compteur
$requete3 = " INSERT INTO compteur (ancien_index,nouvel_index,date_index,timestamp,etat,id) VALUES('$ancien_index','$ancien_index','$date_index','$timestamp','$etat','$id_abonne')";
$resultat3= mysql_query($requete3);	
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