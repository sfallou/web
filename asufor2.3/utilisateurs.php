<?php
 
	/*
	 * @create on 2015-08-10
	 * @author BASSIROU NGOM
	*
	**/

class utilisateur{
	private $login; 
	private $mdp;
	private $profil;
	
	function __construct($login, $mdp, $profil){
		$this->login=$login;
		$this->mdp=$mdp;
		$this->profil=$profil;
	}
	function setLogin($login){
		$this->login=$login;
	
	}
	
	function setMdp($mdp){
		$this->mdp=$mpd;
	}
	function existe($bdd){
		$verification=$bdd->prepare('select count(*) from compte where login=:n1 and mdp=:n2 and profil=:n3');
		$verification->execute(array(
			':n1'=>$this->login,
			':n2'=>$this->mdp,
			':n3'=>$this->profil
		));
		$nbr=$verification->fetch();
		if($nbr[0]==1)
			return true;
		else
			return false;
	}
	
	function CreerUtilisateur($bdd, $nom, $prenom){
		$req=$bdd->prepare("INSERT INTO compte(nom, prenom, profil, login, mdp, date_creation) VALUES (:n1, :n2, :n3, :n4, :n5, :n6)");
		$req->execute(array(
			':n1'=>$nom,
			 ':n2'=>$prenom, 
			 ':n3'=>$this->profil, 
			 ':n4'=>$this->login, 
			 ':n5'=>$this->mdp,
			 ':n6'=>date('Y-m-d')
		));
	}
	
	function getIdCompte($bdd){
		$req=$bdd->prepare('select count(*) from compte where login=:n1 and mdp=:n2');
		$req->execute(array(
			':n1'=>$this->login,
			 ':n2'=>$this->mdp
		));
		$donnees=$req->fetch();
		return $donnees[0];
	}
	function modiferUtilisateur($bdd,$id,$login,$mdp){
		$req=$bdd->prepare("UPDATE compte SET login=:n1, mdp=:n2 WHERE id_compte=:n3");
		$req->execute(array(
			':n1'=>$login,
			 ':n2'=>$mdp, 
			 ':n3'=>$id
		));
		$this->setLogin($login);
		$this->SetMdp($mdp);
	}
	
	function modifierInformationsUtilisateur($bdd, $nom, $prenom){
		$req=$bdd->prepare("UPDATE compte SET nom=:n1, prenom=:n2, profil=:n3 WHERE id_compte=:n4");
		$req->execute(array(
			':n1'=>$nom,
			 ':n2'=>$prenom, 
			 ':n3'=>$this->profil, 
			 ':n4'=>$this->getIdCompte($bdd), 
		));
	}
	
	function supprimerUtilisateur($bdd){
		$req=$bdd->prepare("DELETE * FROM compte where id_compte=:n1");
		$req->execute(array(':n1'=>$this->getIdCompte($bdd)));
	}
	
	static function recupererInformationsUtilisateur($bdd, $id){
		$req=$bdd->prepare('select * from compte where id_compte=:n1');
		$req->execute(array(
			':n1'=>$id
		));
		return $req->fetch();
	}

}


class abonne{
	private $id;
	
	function __construct($id){
		$this->id=$id;
	}
	
	static function ajouterAbonne($bdd, $cni, $nom, $prenom, $addr, $tel, $frais){
		$req=$bdd->prepare("INSERT INTO abonne(nom, prenom, cni, adresse, telephone, date_abonnement, frais_abonnement, etat) VALUES (:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8)");
		$req->execute(array(
			':n1'=>$nom,
			 ':n2'=>$prenom, 
			 ':n3'=>$cni, 
			 ':n4'=>$addr, 
			 ':n5'=>$tel,
			 ':n6'=>date('Y-m-d'),
			 ':n7'=>$frais,
			 ':n8'=>0
		));
	}
	
	function changerEtat($bdd, $etat){
		$req=$bdd->prepare("UPDATE abonne SET etat=:n1 WHERE id_abonne=:n2");
		$req->execute(array(
			':n1'=>$etat,
			 ':n2'=>$this->id
		));
	}
	
	function modifierAbonne($bdd, $cni, $nom, $prenom, $addr, $tel, $id, $frais){
		$req=$bdd->prepare("UPDATE abonne SET id_abonne=:n0, nom=:n1, prenom=:n2, cni=:n3, adresse=:n4, telephone=:n5, frais_abonnement=:n7  WHERE id_abonne=:n6");
		$req->execute(array(
			':n0'=>$id,
			':n1'=>$nom,
			':n2'=>$prenom, 
			':n3'=>$cni, 
			':n4'=>$addr, 
			':n5'=>$tel, 
			':n7'=>$frais,
			':n6'=>$this->id 
		));
	}
	
	function supprimerAbonne($bdd){
		$req=$bdd->prepare("DELETE * from abonne WHERE id_abonne=:n1");
		$req->execute(array(
			':n1'=>$this->id,
			));
	}
	static function nombreAbonne($bdd){
		$req=$bdd->query("SELECT  count(*) from abonne");
		$nbr=$req->fetch();
		return $nbr[0];
	}


}
class village {
	private $id;
	private $nom;

	function __construct($id, $nom){
		$this->id=$id;
		$this->nom=$nom;
	}

	function ajouterVillage($bdd){
		$req=$bdd->prepare("INSERT INTO village(nom_village) VALUES (:n1)");
		$req->execute(array(':n1'=>$this->nom));
	}

	function modifierVillage($bdd){
		$req=$bdd->prepare("UPDATE village(nom_village) VALUES (:n1)");
		$req->execute(array(':n1'=>$this->nom));
	}
}
class recette{
	static function consommationTotal($bdd){
		$req2=$bdd->query("SELECT * FROM tarif");
		$datas=$req2->fetch();
		$tarif=$datas['montant_tarif'];
		$reponse= $bdd->query("SELECT SUM(nouvel_index-ancien_index) AS volume FROM compteur");
		$donnees=$reponse->fetch();
		$volume=$donnees['volume'];
		$montant=$volume*$tarif;
		return array('volume'=>$volume, 'montant'=>$montant);
	}
	static function etatFinance($bdd){
		$reponse2=$bdd->query("SELECT SUM(d_senelec+d_gazoil+d_entretien+salaire_conducteur+salaire_gerant+salaire_releveur+d_divers) AS depenses FROM depense");
		$donnees2 =$reponse2->fetch();
		$depense_total=$donnees2['depenses'];
		$reponse3=$bdd->query("SELECT SUM(r_facture+r_abreuvoir+r_potence+bon_coupure) AS recettes FROM recette");
		$donnees3 = $reponse3->fetch();
		$recette_total=$donnees3['recettes'];	
		return array('depense'=>$depense_total, 'recette'=>$recette_total);
	}
	
}
?>
