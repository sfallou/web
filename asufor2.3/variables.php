<?php

$req=$bdd->prepare("SELECT * FROM variables");
$req->execute();

while($data=$req->fetch() );
	{
	$title=$data['title'];
	$nom_asufor=$data['nom_asufor'];
	$nombre_villages=$data['nombre_villages'];
	$texte_accueil=$data['texte_accueil'];
	$an=$data['annee'];
	}

$req2=$bdd->prepare("SELECT * FROM tarif");
$req2->execute();

while($datas=$req2->fetch() )
{
$tarif=$datas['montant_tarif'];
}
function entete_asufor()
{
echo "ASUFOR de Seokhaye<br/> Commune de Ngoundiane<br/> Telephone: 775952646<br/>-----------*****------------";
}
?>