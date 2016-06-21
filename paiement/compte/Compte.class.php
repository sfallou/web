<?php
require_once("DataBaseClasse.class.php");
require_once("Client.class.php");
class Compte {

/*
On régle d'abord les interfaces ici. On a des services à offrir à tous les sous groupes.
Pour cela, on preferera mettre en place un CRUD adapté aux besoins generiques des sous groupes
avec lesquels nous serons appelés à collaborer.
*/

	//Done
	//A partir de idCompte et mot de passe, on te fournit toutes les infos sur le compte
	public function getAccount($idAccount,$pwd) {
		$dbc=new DataBaseClasse();
		return $dbc->retrieveAccount($idAccount,$pwd);
	}
	
	//Done
	//A ne pas utiliser pour changer de mot de passe.
	public function updateAccount($request) {
	//$request=update.idcompte.etat.type.solde.mdp
	$reponse="Erreur! Verifiez le format SMS";
	$morceaux=explode(".",$request);
	$type=$morceaux[0];
	$ncin=$morceaux[1];
	$etat=$morceaux[2];
	$typeOf=$morceaux[3];
	$birthDate=date("Y-m-d h:i:s");
	$money=$morceaux[4];
	$mdp=$morceaux[5];
	$notEmpty=(($ncin!="")&&($etat!="")&&($typeOf!="")&&($birthDate!="")&&($money!="")&&($mdp!=""));
	$cli=new Client();
	$infosClient=$cli->getClientFromAccount($ncin,$mdp);
	//echo $infosClient;//just 4 test
	if((count(explode(".",$infosClient))>1)&&$notEmpty)
	{
		$dbc=new DataBaseClasse();
		$dbc->updateAccount($ncin,$etat,$typeOf,$birthDate,$money,$mdp);
		$reponse="Mise à jour réussie";
	}
	return $reponse;
	}


	public function debiter($request) {
	$morceaux=explode(".",$request);
	$type=$morceaux[0];
	$idCompte=$morceaux[1];
	$mdp=$morceaux[2];
	$money=$morceaux[3];
	$compt=$this->getAccount($idCompte,$mdp);
	$infos=explode(".", $compt);
	if($infos[4]>$money)
	{
	$req="update.".$infos[0].".".$infos[1].".".$infos[2].".".($infos[4]-$money).".".$mdp;
	$this->updateAccount($req);
	echo "transaction effectuée avec succès";		
	}
	else
	{
		echo "transaction impossible";
	}

	}

	public function crediter($request) {
	$morceaux=explode(".",$request);
	$type=$morceaux[0];
	$idCompte=$morceaux[1];
	$mdp=$morceaux[2];
	$money=$morceaux[3];
	$compt=$this->getAccount($idCompte,$mdp);
	$infos=explode(".", $compt);
	$req="update.".$idCompte.".".$infos[1].".".$infos[2].".".($infos[4]+$money).".".$mdp;
	$this->updateAccount($req);		
	}
	
	//Done
	//Retourne un idCompte generé automatiquement
	public function generateId() {
		
		$compte="compte";

		$dbc= new DataBaseClasse();

		$nbAccount=$dbc->countDown($compte);

		return 1111+$nbAccount;
	}

	
	//Cette fonction, c'est pour un nouveau qui n'a jamais eu de compte
	public function createAccount($request,$sender){
	//On suppose que le format d'un message est new.prenom.nom.mdp.typeCli.addr.mail.typeComp
	$reponse="erreur";
	$morceaux=explode(".",$request);
	$type=$morceaux[0];
	$cl=new Client();
	$idCli=$cl->generateId();
	$prenom=$morceaux[1];
	$nom=$morceaux[2];
	$mdp=$morceaux[3];
	$typeCli=$morceaux[4];
	$addr=$morceaux[5];
	$fonetel=$sender;
	$mail=$morceaux[6];
	$typeCompte=$morceaux[8];
	$nonVide=(($prenom!="")&&($nom!="")&&($mdp!="")&&($typeCli!="")&&($addr!="")&&($fonetel!="")&&($mail!="")&&($typeCompte!=""));
	if($nonVide)
	{
		//On insere dans la db
		$reponse="ajout pris en compte";
		$req="add.".$idCli.".".$mdp.".".$typeCompte;
		echo $req;
		//new.ncin.prenom.nom.mdp
		$cl->createClient("new.".$idCli.".".$prenom.".".$nom.".".$mdp.".".$addr.".".$mail.".".$morceaux[7].".".$typeCompte,$sender);
		$this->addAccount($req);
	}
	return $reponse;
	}

	//Done
	//Cette fonction, c'est pour un client dejà enregistré qui veut ajouter un compte
	public function addAccount($req){
	//On suppose que le format d'un message est add.ncin.mdp.type
	$morceaux=explode(".",$req);
	$type=$morceaux[0];
	$idCli=$morceaux[1];
	$mdp=$morceaux[2];
	$typeh=$morceaux[3];
	$idcompte=$this->generateId();
	$reponse="Erreur authentification";
	$cl=new Client();
	$infosClient=$cl->getClient($idCli,$mdp);
	$client=explode(".", $infosClient);
		if((count($client)==9)){
		//On insere dans la db
		$reponse="Compte créé avec succès.".$idcompte;
		$dbc=new DataBaseClasse();
		$dbc->insertAccount($idCli,$idcompte,$typeh);
	}
		return $reponse;
	}

}
?>