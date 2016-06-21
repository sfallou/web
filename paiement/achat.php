<?php


	class Achat
	{
		private $numCompte;
		private $montant;

	public function __construct($numCompte,$montant)
		{
		 $this->numCompte=$numCompte;
		 $this->montant=$montant;
		}
	

//fomction qui envoye le solde du client	
public function getSolde(){
		return 100000;
	}

//fomction qui envoye le montant de l'achat	
public function getSomme(){
		$som=$this->montant;
		return $som;
	}

//fonction qui permet de debiter un compte
public function debiter(){
		//private $new_solde,$solde;
		$obj=new Achat($this->numCompte,$this->montant);
		$solde=$obj->getSolde();
		$new_solde=$solde-$this->montant;
		return $new_solde;
	}

/*fonction qui génére un code aléatoire de 6 caratères*/
function codeAleatoire(){
	
	$characts = '1234567890';
	$code = 'FS';
	//4 est le nombre de chiffre aléatoire à ajouter à FS
	for($i=0;$i < 4;$i++){ 
		$code.= substr($characts,rand()%(strlen($characts)),1);
	}
	return $code;
}	

	}
		

}
?>