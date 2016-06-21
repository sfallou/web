<?php
require_once("DataBaseClasse.class.php");
class Client {

/*
On régle d'abord les interfaces ici. On a des services à offrir à tous les sous groupes.
Pour cela, on preferera mettre en place un CRUD adapté aux besoins generiques des sous groupes
avec lesquels nous serons appelés à collaborer.
*/


	//Done
	//On donne en paramètre un client et son mot de passe et on récupère les infos sur le client (:)
	public function getClient($ncin,$mdp) {
		$dbc=new DataBaseClasse();
		return $dbc->retrieveClient($ncin,$mdp);
	}

	//Done
	//On donne en paramètre un compte et le mot de passe et on récupère les infos sur le client (:)
	public function getClientFromAccount($ncin,$mdp) {
		$dbc=new DataBaseClasse();
		return $dbc->retrieveClientPro($ncin,$mdp);
	}
	//Done
	//Retourne un idClient generé automatiquement
	public function generateId() {
		
		$client="client";

		$dbc=new DataBaseClasse();

		$nbCli=$dbc->countDown($client);

		return 79832+$nbCli;
	}

	//Done
	//Changer un mot de passe
	public function changePwd($idCli,$pwd,$npwd)
	{
		$reponse="erreur";
		$infosClient=$this->getClient($idCli,$pwd);
		var_dump($infosClient);
		if(count(explode(".", $infosClient))==9)
		{
			$reponse="demande traitée";
			$db=new DataBaseClasse();
			$db->changePwd($idCli,$npwd);
		}
		return $reponse;
	}

	//Est ce vraiment utile???
	//Done
	public function updateClient($request) {
	//$request=idclient.nom.prenom.adresse.tel.mail.pwd.type
	$reponse="Erreur! Verifiez le format SMS";
	$morceaux=explode(".",$request);
	$type=$morceaux[0];
	$idCli=$morceaux[1];
	$nom=$morceaux[2];
	$prenom=$morceaux[3];
	$addr=$morceaux[4];
	$tel=$morceaux[5];
	$mail=$morceaux[6];
	$pwd=$morceaux[8];
	$typeOf=$morceaux[9];
	$notEmpty=(($idCli!="") && ($nom!="") && ($prenom!="") && ($addr!="") && ($tel!="") && ($mail!="") && ($pwd!="") && ($typeOf!=""));
	$cl=new Client();
	$infosClient=$cl->getClient($idCli,$pwd);
	$client=explode(".", $infosClient);
	var_dump($client);
	if((count($client)==9)&&($client[7]==$pwd)){
		$db=new DataBaseClasse();
		$db->updateClient($idCli,$nom,$prenom,$addr,$tel,$mail.".".$morceaux[7],$pwd,$typeOf);
		$reponse="Mise à jour réussie";
	}
	return $reponse;
	}



	public function createClient($request,$sender){
		//new.ncin.prenom.nom.mdp
	//On suppose que le format d'un message est new.ncin.prenom.nom.mdp.addr.email.typ
	$reponse="Nous sommes navrés de vous informer que votre requête n'a pu être traitée.";
	$morceaux=explode(".",$request);
	$type=$morceaux[0];
	$ncin=$morceaux[1];
	$prenom=$morceaux[2];
	$nom=$morceaux[3];
	$mdp=$morceaux[4];
	$addr=$morceaux[5];
	$email=$morceaux[6];
	$com=$morceaux[7];
	$typ=$morceaux[8];
		//On insere dans la db
		$reponse="Votre demande d'adhésion est en cours de validation. Merci de patienter 48 H maximum";
		$db=new DataBaseClasse();
		$db->insertClient($sender,$ncin,$nom,$prenom,$mdp,$addr,$email.".".$com,$typ);
	}



}
?>