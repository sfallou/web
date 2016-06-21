<?php
	include_once('Compte.class.php');
	$request=$_REQUEST['requete'];
	$sender=$_REQUEST['numero'];
	$morceaux=explode(".",$request);
	$type=$morceaux[0];
	if(($type=="new")and(count($morceaux)==9))
	{
		$c=new Compte();
		//$c->{ec()};
		echo $c->createAccount($request,$sender);
	/*
	if(($type=="contact")and(count($morceaux)==17))
	{
		Contact->createContact($request,$sender);
	}
	if(($type=="updatecompte")and(count($morceaux)==13))
	{
		Compte->updateAccount($request);
	}*/
	}


?>