<?php
require("head.php");
if ($_SESSION['connect']!=1)
{
?>
<script language="JavaScript">
		alert("Merci de vouloir vous identifier d'abord!!!");
		window.location.replace("index.php");// On inclut le formulaire d'identification
		</script>
<?php
}
?>
<?php
	//récupération des informations  
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$cni=$_POST['cni'];
$telephone=$_POST['telephone'];
$adresse=$_POST['adresse'];
$frais=$_POST['frais_abonnement'];
$date=$_POST['date_abonnement'];
$timestamp=strtotime($date);  //conversion de la date d'abonnement en timestamp
    // Insertion des informations dans la table abonne
$requete = " INSERT INTO abonne (prenom,nom,cni,telephone,adresse,date_abonnement,timestamp,frais_abonnement) VALUES('$prenom','$nom','$cni','$telephone','$adresse','$date','$timestamp','$frais')";
$resultat= mysql_query($requete);
	
	//initialisation du compteur de l'abonne
$requete2 = "SELECT id_abonne FROM abonne ORDER BY id_abonne DESC LIMIT 0,1";
$resultat2= mysql_query($requete2);
				while($donnes=mysql_fetch_array($resultat2))
					{
					$id_abonne=$donnes['id_abonne']; // clé secondaire : permet de lier un abonné à un compteur
					$ancien_index=0;
					$nouvel_index=0;
					$date_index=$date;
					$etat=0; //permet de catégoriser les abonnés: etat=0 => abonné dans la liste rouge
					}
	//insertion des valeurs dans la table compteur
$requete3 = " INSERT INTO compteur (ancien_index,nouvel_index,date_index,timestamp,etat,id) VALUES('$ancien_index','$nouvel_index','$date_index','$timestamp','$etat','$id_abonne')";
$resultat3= mysql_query($requete3);	
// Redirection vers la page de génération du bon d'abonnement
?>
<script language="JavaScript">
		alert("Enregistrement effectué avec succès!!");
		window.location.replace("bon_abonnement.php");// On inclut le formulaire d'identification
		</script>
		
