<?php
require("head.php");

$id_compteur=$_POST['id_compteur'];
$nouvel_index=$_POST['nouvel_index'];
$date_index=$_POST['date_index'];
$id_abonne=$_POST['id_abonne'];
list($y,$m,$d)=explode("-",$date_index);
$m=$m+1;
if($m==12)
{
$m=1;
$y=$y+1;
}
$requete1=mysql_query("UPDATE compteur SET nouvel_index='$nouvel_index' WHERE id_compteur='$id_compteur' ");

$sql=mysql_query("SELECT DISTINCT id_compteur,id FROM compteur WHERE id='$id_abonne' AND MONTH(date_index)='$m' AND YEAR(date_index)='$y' ");
		if($data = mysql_fetch_array($sql))
		{
		$id_compteur2 = $data['id_compteur'];
		$requete2=mysql_query("UPDATE compteur SET ancien_index='$nouvel_index' WHERE id_compteur='$id_compteur2' ");
		}
if($requete1 AND $reque)
{

?>
<script language="JavaScript">
	alert("Les informations ont été modifiés avec succès!!");
	<?php 
	if($_SESSION['profil']=="gerant")
	{?>
	window.location.replace("g_liste_abonnes.php");// On inclut le formulaire d'identification
	<?php
	}
	else if($_SESSION['profil']=="administrateur")
	{
	?>
	window.location.replace("liste_abonnes.php");// On inclut le formulaire d'identification
	<?php
	}
	?>
	</script>
<?php
}
else
{
?>
<script language="JavaScript">
	alert("Echec de la modification! Merci de recommencer");
	<?php 
	if($_SESSION['profil']=="gerant")
	{?>
	window.location.replace("g_liste_abonnes.php");// On inclut le formulaire d'identification
	<?php
	}
	else if($_SESSION['profil']=="administrateur")
	{
	?>
	window.location.replace("liste_abonnes.php");// On inclut le formulaire d'identification
	<?php
	}
	?>
	</script>
<?php
}
?>