<?php 
    require('head.php');
	//require('header.php'); 
	$adresse=$_POST['adresse'];
	$mois=$_POST['mois'];
	$annee=$_POST['annee'];
	$moiss=convert_mois($mois);

	$_SESSION['adresse']=$adresse;
	$_SESSION['mois']=$mois;
	$_SESSION['annee']=$annee;
	$_SESSION['moiss']=$moiss;

    header('Location:etat_facturation.php');
?>