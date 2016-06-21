<?php
	include_once('DataBaseClasse.class.php');


	/*
	//Test updateAccount
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	$bd->updateAccount(5,4,"gelé",date("Y-m-d h:i:s"),500,"repasser");
	*/

	/*
	//Test changePwd
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	$bd->changePwd(5,"morsmordre");
	*/

	
	/*
	//Test countDown
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	echo $bd->countDown("compte");
	*/

	/*
	//Test insert between 
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	$bd->insertBetween(5,5);
	*/

	/*
	//Test insertClient
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	echo $bd->insertClient(771931380,17,"Diop","Aboubakrine Makhtar","koutinio","Parcelles","khout@hh.com",7);
	*/

	/*
	//Test insertAccount
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	echo $bd->insertAccount(18,84832,"courant");
	*/

	/*
	//Test updateClient
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	echo $bd->updateClient(5,"Ndiaye","Pamodzou","Saint Louis",776532511,"mamodzou@hotmail.fr","morsmordre",4);
	*/

	/*
	//Test retrieveClient
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	echo $bd->retrieveClient(17,"koutinio");
	*/

	/*
	//Test retrieveClientPro
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	echo $bd->retrieveClientPro(5,"morsmordre");
	*/

	/*
	//Test retrieveAccount
	//Cette methode fonctionne
	$bd=new DataBaseClasse();
	echo $bd->retrieveAccount(5,"morsmordre");
	*/

	/*
	//Test retrieveAccount
	//Cette methode fonctionne
	$compte=new Compte();
	echo $compte->getAccount(5,"morsmordre");
	*/
	/*
	//Test updateAccount
	//Cette methode fonctionne
	$compte=new Compte();
	echo $compte->updateAccount("update.5.3.courant.653.morsmordre");
	*/

	/*
	//Test debiter
	//Cette methode fonctionne
	$compte=new Compte();
	echo $compte->debiter("debiter.5.morsmordre.50");
	*/

	/*
	//Test crediter
	//Cette methode fonctionne
	$compte=new Compte();
	echo $compte->crediter("debiter.5.morsmordre.350");
	*/

	/*
	//Test generer
	//Cette methode fonctionne
	$compte=new Compte();
	echo $compte->generateId();
	*/

	
	//Test createAccount
	//Cette methode fonctionne
	$compte=new Compte();
	echo $compte->createAccount("new."."Mame Awa."."Niang."."koutess."."niankat."."poukouss."."mameawa@yahoo.fr."."courant","776532511");
	

	/*
	//Test addAccount
	//Cette methode fonctionne
	$compte=new Compte();
	echo $compte->addAccount("add.79836.koutess.courant");
	*/

	
	//Test getClient
	//Cette methode fonctionne
	$client=new Client();
	echo $client->getClient(18,"repasser");
	

	/*
	//Test getClientFromAccount
	//Cette methode fonctionne
	$client=new Client();
	echo $client->getClientFromAccount(5,"morsmordre");
	*/

	/*
	//Test generateId
	//Cette methode fonctionne
	$client=new Client();
	echo $client->generateId();
	*/	

	/*
	//Test changePwd
	//Cette methode fonctionne
	$client=new Client();
	echo $client->changePwd(79836,"koutess", "kout");
	*/

	/*
	//Test updateClient
	//Cette methode fonctionne
	$client=new Client();
	echo $client->updateClient("update.79836.Nian.Mama Awa.57A.778907647.mame@hh.df.kout.5");
	*/

	/*
	//Test createClient
	//Cette methode fonctionne
	$client=new Client();
	echo $client->createClient("new.987654.Philippe.Kolama.booba.Bene Tally.phil@hh.dh.donnateur","778904567");
	*/

?>
