<?php
$req=mysql_query("SELECT * FROM variables");
while($data=mysql_fetch_array($req))
	{
	$title=$data['title'];
	$nom_asufor=$data['nom_asufor'];
	$nombre_villages=$data['nombre_villages'];
	$texte_accueil=$data['texte_accueil'];
	$an=$data['annee'];
	}
$req2=mysql_query("SELECT * FROM tarif");
while($datas=mysql_fetch_array($req2))
{
$tarif=$datas['montant_tarif'];
}
function entete_asufor()
{
echo "ASUFOR de Seokhaye<br/> Commune de Ngoundiane<br/> Telephone: 775952646<br/>-----------*****------------";
}
?>