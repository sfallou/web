<?php
require("Compte.class.php");

class InitPaiement
{
//Déclaration des attributs	
	private $message;
	private $numero;
	private $etatComm;
	private $numCompte;
// le constructeur

	public function __construct($num,$mess,$compte,$etatCom){
		$this->numero=$num;
		$this->message=$mess;
		$this->etatComm=$etatCom;
		$this->numCompte=$compte;
	}

//Définition des autres méthodes

	
	
	//methode qui renvoie le nom du service sollicité
	public function getNameService(){
		//private $nameService,$sms;	
		$sms=$this->message;
		list($a,$nameService) = explode(".", $sms);
		$nameSevice=strtolower($nameService);
		return $nameService;
	}

	
	//methode qui renvoie le montant sollicité
	public function getMontant(){
	//private $montant,$sms;	
	$sms=$this->message;
	list($a,$b,$c,$d,$montant) = explode(".", $sms);
	return $montant;
	}


	//fomction qui envoye le solde du client	
	public function getSolde(){
		return 100000;
	}

	

	//fonction qui route la requête vers le bon service
	public function gotoService($service,$montant){
		$solde=1580000;
		$service=strtolower($service);
		//$choix=$this->VerificationAchat($keyword,$service,$code,$numCompte,$montant);
		if($solde<=$montant)
			return -1;
		if($service!="achat")
			return -2;

		return 1;
	}

	//fonction qui envoie le message de notification de la transaction.
	public function notifier($reponse){
		if($reponse==-1)
			$reply="Echec Paiement: solde insuffisant!";
		if($reponse==-2)
			$reply= "Echec Paiement: le service paiement demandé n'existe pas!";
		if($reponse==1)
			$reply="Le paiement de votre achat a ete bien effectue!";
		echo "$reply";
	}

	//fonction qui permet de debiter un compte
	public function debiter($solde,$montant){
		$new_solde=$solde-$montant;
		return $new_solde;
	}

	/*fonction qui génére un code aléatoire de 6 caratères*/
	public function codeAleatoire(){
	
		$characts = '1234567890';
		$code = 'FS';
		//4 est le nombre de chiffre aléatoire à ajouter à FS
		for($i=0;$i < 4;$i++){ 
			$code.= substr($characts,rand()%(strlen($characts)),1);
		}
		return $code;
	}	


//fonction qui effectue la sauvegarde de transaction
	public function sauvegarde($numCompte,$numero,$service,$montant,$cce,$solde){
		// Connexion à la base de données
		try{
			$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
			}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
			}
		$req = $bdd->prepare('INSERT INTO transaction(service,telUtilise,dateTransaction,CCE,solde,montantRetire,idCompte) VALUES(:service, :tel , CURDATE(), :code, :solde, :montant, :compte,)');
		$req->execute(array(
		'service' => $service,
		'tel' => $numero,
		'code' => $cce,
		'solde' => $solde,
		'montant' => $montant,
		'compte' => $numCompte));
		$req->closeCursor();
		if($req!=null)
			return "Montant debite=$montant fcfa; Nouveau Solde=$solde fcfa; CCE= $cce";
	}



}

