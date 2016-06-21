<?php

/*********** les includes ****************/
require("config.php");
require("paiement_class.php");
//require("Communication.class.php");
//include("fsmsFonction.php");
/**************** END *******************/

/**** on suppose que le format du message est:
Keyword nomService password numCompte Montant
****/

/******* Définition des fonctions uiles ******/

//fonction qui renvoie le mot clé
function getKeyword($message){
	list($keyword) = explode(" ", $message);
	$keyword=strtolower($keyword);
	return $keyword;
	}

//fonction qui renvoie le code d'identification (mot de passe)
function getCodeId($sms){
	list($a,$b,$codeId) = explode(" ", $sms);
	return $codeId;
	}

//fonction qui renvoie le numero du compte
function getNumCompte($message){	
	list($a,$b,$c,$compte) = explode(" ", $message);
	return $compte;
	}

/************* END *****************/

/****** DEBUT *******/

//récupération des parametres de l'URL
$sms=$_GET['message'];
$numero=$_GET['num'];
//récupération du mot clè, du code et du numero de compte
$keyword=getKeyword($sms);
$identifiant=getCodeId($sms);
$cpt=getNumCompte($sms);
/*
$tab=explode(".",$sms);
$keyword=$tab[0];
$service=$tab[1];
$cpt=$tab[3];
$identifiant=$tab[2];
*/
//on verifie si le mot clè, le code et le compte sont valides
if($keyword=="paiement" and $identifiant=="sfallou" and $cpt=="2015"){
	//on récupère l'état de la communication de ce numéro
	$etatcomm=1;
	//crée un objet paiement
	$payment=new InitPaiement($numero,$sms,$cpt,$etatcomm);
	//on récupère le type de service de paiement demandé
	$service=$payment->getNameService();
	//on récupére le montant qu'il souhaite débiter
	$montant=$payment->getMontant();
	//on récupère le solde
	$solde=$payment->getSolde();
	//On appelle la méthode gotoService
	$rep=$payment->gotoService($service,$montant);
	//on declare la variable qui va contenir le rapport
	$rapport="";
	//on teste si le service demandé est executé
	if($rep==1){
		//on debite le compte
		$newSolde=$payment->debiter($solde,$montant);
		//on génére un CCE
		$cce=$payment->codeAleatoire();
		//on sauvegarde la transaction
		$rapport=$payment->sauvegarde($cpt,$numero,$service,$montant,$cce,$newSolde);

	}

	//On appelle la méthode notification 
	$payment->notifier($rep);
	echo$rapport;
}
else{
	echo "$numero $keyword $identifiant $cpt";
}
//echo "yes";
?>