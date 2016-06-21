<?php
require('secure.php');
$req=$bdd->query("SELECT * FROM variables");
while($data=$req->fetch())
	{
	$title=$data['title'];
	$nom_asufor=$data['nom_asufor'];
	$nombre_villages=$data['nombre_villages'];
	$texte_accueil=$data['texte_accueil'];
	$an=$data['annee'];
	}
$req2=$bdd->query("SELECT * FROM tarif where id_tarif=1");
$datas=$req2->fetch();
$tarif=$datas['montant_tarif'];
$req3=$bdd->query("SELECT * FROM tarif where id_tarif=2");
$datas2=$req3->fetch();
$tarifSpecial=$datas2['montant_tarif'];

function entete_asufor()
{
echo "ASUFOR de Seokhaye<br/> Commune de Ngoundiane<br/> Telephone: 775952646<br/>-----------*****------------";
}
?>