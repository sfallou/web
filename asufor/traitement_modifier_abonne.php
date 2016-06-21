<?php
require("head.php");

$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$id_abonne=$_POST['id_abonne'];
$adresse=$_POST['adresse'];
$cni=$_POST['cni'];
$telephone=$_POST['telephone'];

$requete=mysql_query("UPDATE abonne SET prenom='$prenom', nom='$nom',adresse='$adresse',cni='$cni',telephone='$telephone'  WHERE id_abonne='$id_abonne' ");
if($requete)
{
?>
<script language="JavaScript">
	alert("Les informations ont été modifiés avec succès!!");
	window.location.replace("modifier_abonne.php");// On inclut le formulaire d'identification
	</script>
<?php
}
else
{
?>
<script language="JavaScript">
	alert("Echec de la modification! Merci de recommencer");
	window.location.replace("modifier_abonne.php");// On inclut le formulaire d'identification
	</script>
<?php
}
?>