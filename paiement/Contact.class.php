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
	public function getContact($idAccount,$pwd) {
		$dbc=new DataBaseClasse();
		return $dbc->retrieveContact($idAccount,$pwd);
	}
	
	public function generateId() {
		
		$compte="compte";

		$dbc= new DataBaseClasse();

		$nbAccount=$dbc->countDowne($compte);

		return 1111+$nbAccount;
	}

	
	//Cette fonction, c'est pour un nouveau qui n'a jamais eu de compte
	public function createContact($request,$sender){
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

}
?>