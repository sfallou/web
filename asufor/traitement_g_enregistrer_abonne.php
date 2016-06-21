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
$date=$_POST['date'];
$ancien_index=$_POST['ancien_index'];
$timestamp=strtotime($date);  //conversion de la date d'abonnement en timestamp
    // Insertion des informations dans la table abonne
$requete = " INSERT INTO attente (prenom,nom,cni,telephone,adresse,date_abonnement,timestamp,frais_abonnement,ancien_index) VALUES('$prenom','$nom','$cni','$telephone','$adresse','$date','$timestamp','$frais','$ancien_index')";
$resultat= mysql_query($requete);
// Redirection vers la page de génération du bon d'abonnement
?>
<script language="JavaScript">
		alert("Enregistrement effectué avec succès!! Il sera validé par l'administrateur");
		window.location.replace("g_enregistrer_abonne.php");// On inclut le formulaire d'identification
		</script>
		
