<?php 
//on recupere les variables

$num=$_GET['num']; 
$day=$_GET['day'];
$date=$_GET['date'];
$month=$_GET['mois'];
$year=$_GET['year'];
$hour=$_GET['hour'];
$min=$_GET['min'];
	echo $date;
	header("Location: rv_mois.php?num=$num&day=$day&date=$date&mois=$month&year=$year&hour=$hour&min=$min");// lien vers la page d'accueil de l'espace privé 
?>
