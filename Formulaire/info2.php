<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=challenge2016;charset=utf8', 'root', 'passer');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$titre="Soirée Casino!";
$contenu="C’est l’heure de la soirée casino ! Rendez-vous dès maintenant dans le foyer de Centrale pour se retrouver autour d’une table de poker et passer une bonne soirée.";
$date_info="Vendredi 18 Mars ";
$image_info="./Infos/21_00_00.jpg";
$heure_info"21:00";
$requete=$bdd->prepare("INSERT INTO Infos (titre,contenu,date_info,image_info,heure_info) VALUES (?,?,?,?,?) ");
		$bool=$requete->execute(array($titre,$contenu,$date_info,$image_info,$heure_info));

?>
