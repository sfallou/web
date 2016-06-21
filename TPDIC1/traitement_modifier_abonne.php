<?php
require("head.php");

$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$id_abonne=$_POST['id_abonne'];
$adresse=$_POST['adresse'];
$cni=$_POST['cni'];
$datenaiss=$_POST['datenaiss'];

//$bdd->exec("delete from dic_citoyen where cty_id='".$id."'");
$requete=$bdd->exec("update dic_citoyen set cty_prenom='$prenom', cty_nom='$nom',cty_datenaissance='$datenaiss',cty_lieunaissance='$adresse',cty_nci='$cni'  WHERE cty_id='$id_abonne' ");
if($requete)
{
?>
<script language="JavaScript">
	alert("Les informations ont été modifiés avec succès!!");
	window.location.replace("body.php");// On inclut le formulaire d'identification
	</script>
<?php
}
else
{
?>
<script language="JavaScript">
	alert("Echec de la modification! Merci de recommencer");
	window.location.replace("body.php");// On inclut le formulaire d'identification
	</script>
<?php
}
?>