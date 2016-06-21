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
	
	static function getIdAbonne($bdd, $nom, $prenom, $cni, $village){
		$req=$bdd->query("select id_abonne from abonne where nom='$nom' and prenom='$prenom' and cni='$cni' and adresse='$village'");
		return $req->fetch()[0];
	}
	
	
	static function ajouterAbonneAdmin($bdd, $cni, $nom, $prenom, $addr, $tel, $frais){
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
	static function ajouterAbonneGerant($bdd, $cni, $nom, $prenom, $addr, $tel, $frais){
		$req=$bdd->prepare("INSERT INTO attente(nom, prenom, cni, adresse, telephone, date_abonnement, frais_abonnement, etat) VALUES (:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8)");
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
	
	static function validerAbonne($bdd, $id){
		//récupération des informations
		$req=$bdd->prepare("SELECT * FROM attente WHERE id_abonne=:n1 AND etat=0");
		$req->execute(array(
			':n1'=>$id
		));
		$data=$req->fetch();
		$prenom=$data['prenom'];
		$nom=$data['nom'];
		$adresse=$data['adresse'];
		$telephone=$data['telephone'];
		$date_abonnement=$data['date_abonnement'];
		$timestamp=$data['timestamp'];
		$frais=$data['frais_abonnement'];
		$ancien_index=$data['ancien_index'];
		if($adresse=='special') $special=1;
		else $special=0;
		$req=null;
		
		// Insertion des informations dans la table abonne
		$req=$bdd->prepare(" INSERT INTO abonne (prenom,nom,cni,telephone,adresse,date_abonnement,timestamp,frais_abonnement) VALUES(:n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8)");
		$req->execute(array(':n1'=>$prenom,':n2'=>$nom,':n3'=>$id,':n4'=>$telephone,':n5'=>$adresse,':n6'=>$date_abonnement,':n7'=>$timestamp,':n8'=>$frais));
		$req1=$bdd->prepare("DELETE FROM attente WHERE id_abonne=:n1");
		$req1->execute(array(
			':n1'=>$id
		));
		
		//initialisation du compteur de l'abonne
		$requete2 = "SELECT id_abonne,date_abonnement FROM abonne WHERE id_abonne='$id' AND prenom='$prenom' AND nom='$nom'";
		$resultat2= $bdd->query($requete2);
		$donnes=$resultat2->fetch();
		$id_abonne=$donnes['id_abonne']; // clé secondaire : permet de lier un abonné à un compteur
		//$ancien_index=0;
		//$nouvel_index=0;
		$date_index=$donnes['date_abonnement'];
		$etat=0; //permet de catégoriser les abonnés: etat=0 => abonné dans la liste rouge
		
		//insertion des valeurs dans la table compteur
		$requete3 = " INSERT INTO compteur (ancien_index,nouvel_index,date_index,timestamp,etat,id, special) VALUES('$ancien_index','$ancien_index','$date_index','$timestamp','$etat','$id_abonne', '$special')";
		$resultat3=$bdd->query($requete3);	
	}
	
	
	
	
	function changerEtat($bdd, $etat){
		$req=$bdd->prepare("UPDATE abonne SET etat=:n1 WHERE id_abonne=:n2");
		$req->execute(array(
			':n1'=>$etat,
			 ':n2'=>$this->id
		));
	}
	
	function modifierAbonne($bdd, $cni, $nom, $prenom, $addr, $tel,$frais){
		$req=$bdd->prepare("UPDATE abonne SET nom=:n1, prenom=:n2, cni=:n3, adresse=:n4, telephone=:n5, frais_abonnement=:n7  WHERE id_abonne=:n6");
		$req->execute(array(
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
		$req=$bdd->prepare("DELETE from abonne WHERE id_abonne=:n1");
		$req->execute(array(
			':n1'=>$this->id,
			));
	}
	static function nombreAbonne($bdd){
		$req=$bdd->query("SELECT  count(*) from abonne");
		$nbr=$req->fetch();
		return $nbr[0];
	}
	
	function recuperInformationsAbonne($bdd){
		$req=$bdd->prepare('select * from abonne where id_abonne=:n1');
		$req->execute(array(
			':n1'=>$this->id
		));
		return $req->fetch();
	}


}

class village {
	private $bdd;
	private $nom;

	function __construct($bdd,$nom){
		$this->bdd=$bdd;
		$this->nom=$nom;
	}

	function ajouterVillage(){
		$req=$this->bdd->prepare("INSERT INTO village(nom_village) VALUES (:n1)");
		$req->execute(array(':n1'=>$this->nom));
	}

	function modifierVillage($bdd){
		$req=$bdd->prepare("UPDATE village(nom_village) VALUES (:n1)");
		$req->execute(array(':n1'=>$this->nom));
	}
}
/*
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

}*/

/************** Classe Compteur **************************/

class Compteur{
	
	private $id_abonne;
	private $bdd;
	//private $id_compteur;
	
	function __construct($bdd,$id_abonne){
		$this->id_abonne=$id_abonne;
		$this->bdd=$bdd;
	}

	function nouveauCompteur($ancien_index,$nouvel_index,$special){
		$etat=0;
		$date_index=date("Y-m-d");
		$timestamp=strtotime($date_index);  //conversion de la date d'abonnement en timestamp
		$req=$this->bdd->prepare(" INSERT INTO compteur (ancien_index,nouvel_index,date_index,timestamp,etat,id,special)  VALUES (:n1, :n2, :n3, :n4, :n5, :n6, :n7)");
		$req->execute(array(
			':n1'=>$ancien_index,
			 ':n2'=>$nouvel_index, 
			 ':n3'=>$date_index, 
			 ':n4'=>$timestamp, 
			 ':n5'=>$etat,
			 ':n6'=>$this->id_abonne,
			 ':n7'=>$special
		));

	}


	function saveIndex($ancien_index,$nouvel_index,$date_index,$special){
		$etat=0;
		//$date_index=date("Y-m-d");
		$timestamp=strtotime($date_index);  //conversion de la date d'abonnement en timestamp
		$req=$this->bdd->prepare(" INSERT INTO compteur (ancien_index,nouvel_index,date_index,timestamp,etat,id,special)  VALUES (:n1, :n2, :n3, :n4, :n5, :n6, :n7)");
		$req->execute(array(
			':n1'=>$ancien_index,
			 ':n2'=>$nouvel_index, 
			 ':n3'=>$date_index, 
			 ':n4'=>$timestamp, 
			 ':n5'=>$etat,
			 ':n6'=>$this->id_abonne,
			 ':n7'=>$special
		));

	}
	/* renvoit les infos d'un compteur sous forme de tableau*/
	function getInfoCompteur($mois,$annee){
		$req=$this->bdd->prepare('SELECT DISTINCT id_compteur,ancien_index,nouvel_index,date_index,timestamp,etat,id FROM compteur WHERE id=:n1 AND YEAR(date_index)=:n2 AND MONTH(date_index)=:n3');
		$req->execute(array(
			':n1'=>$this->id_abonne,
			':n2'=>$annee,
			':n3'=>$mois
		));
		if($data=$req->fetch()){
			$id_compteur=$data['id_compteur'];
			$ancien_index=$data['ancien_index'];
			$nouvel_index=$data['nouvel_index'];
			$date_index=$data['date_index'];
			$timestamp=$data['timestamp'];
			$etat=$data['etat'];
			$id=$data['id'];

		}
		return array('id_compteur'=>$id_compteur, 'ancien_index'=>$ancien_index,'nouvel_index'=>$nouvel_index,'date_index'=>$date_index,
			'timestamp'=>$timestamp,'etat'=>$etat,'id'=>$id);
	}


function getLastIndex(){
		$req=$this->bdd->prepare('SELECT MAX(nouvel_index) AS lastIndex,id FROM compteur WHERE id=:n1');
		$req->execute(array(
			':n1'=>$this->id_abonne
		));
		if($data=$req->fetch()){
			$lastIndex=$data['lastIndex'];
			$id=$data['id'];
			$rep=$this->bdd->query("SELECT id_compteur,ancien_index,nouvel_index,date_index,timestamp,etat,id FROM compteur WHERE id='$id' AND nouvel_index='$lastIndex'");
			if($data2=$rep->fetch()){
				$ancien_index=$data2['ancien_index'];
				$id_compteur=$data2['id_compteur'];
				$date_index=$data2['date_index'];
				$etat=$data2['etat'];
				$timestamp=$data2['timestamp'];
			}

		}
		return array('id_compteur'=>$id_compteur, 'lastIndex'=>$lastIndex,'date_index'=>$date_index,'timestamp'=>$timestamp,'etat'=>$etat,'id'=>$id);
	}

/* Methode statique qui renvoit les infos de tous les compteurs du mois de l'année passé en parametre*/
	static function lesCompteursDuMois($bdd,$mois,$annee){
		
		$req=$bdd->prepare('SELECT id_compteur,ancien_index,nouvel_index,date_index,timestamp,etat,id FROM compteur WHERE  YEAR(date_index)=:n2 AND MONTH(date_index)=:n3');
		$req->execute(array(
			':n2'=>$annee,
			':n3'=>$mois
		));
		
		return $req;
	}

/*Methode qui renvoit tous les prélévements d'un abonné donné*/
	function tousSesPrelevements(){
		
		$req=$this->bdd->prepare('SELECT id_compteur,ancien_index,nouvel_index,date_index,timestamp,etat,id FROM compteur WHERE id=:n1');
		$req->execute(array(
			':n1'=>$this->id_abonne
		));
		
		return $req;
	}

	/*Methode qui renvoit tous les prélévement d'un abonné sur une durée donnée*/
	function prelevements($date1,$date2){
		if($date1<=$date2){
			$req=$this->bdd->prepare('SELECT id_compteur,ancien_index,nouvel_index,date_index,timestamp,etat,id FROM compteur WHERE id=:n1 AND date_index>=:n2 AND date_index<=:n3');
			$req->execute(array(
				':n1'=>$this->id_abonne,
				':n2'=>$date1,
				':n3'=>$date2
			));
		
			return $req;
		}
		else
			return -1;
	}

	/* La methode facturation */

	function facture($id_index){
		$reponse=$this->bdd->query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,cni,ancien_index,nouvel_index,id,id_compteur,DATE_FORMAT(date_index, '%d/%m/%Y') AS date,DATE_ADD(date_index, INTERVAL 15 DAY) AS date_expiration,DATE_SUB(date_index, INTERVAL 30 DAY) AS periode FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE id_compteur='$id_index' ORDER BY date_index DESC LIMIT 0, 1");
		if ($donnees = $reponse->fetch())
		{
			$periode=$donnees['periode'];
			list($y,$m,$d)=explode("-",$periode);
			$periode="$d/$m/$y";
			$date_expiration=$donnees['date_expiration'];
			list($y1,$m1,$d1)=explode("-",$date_expiration);
			$date_expiration="$d1/$m1/$y1";
			$diff= $donnees['nouvel_index'] - $donnees['ancien_index'];
			$montant= $diff*$tarif;
			$req=$this->bdd->query("SELECT * FROM dette WHERE id_abonne='$id_abonne' AND etat=0 LIMIT 0,1");
			
			if ($data = $req->fetch())
				{
					$dette=$data['montant_dette'];
					$date_dette=$data['date_dette'];
					$num_facture=$data['num_facture'];
				}
			else
				{
					$dette=0;
				}
		
			}

			$resultat=array();
			$resultat[0]=$donnees['id_compteur'];
			$resultat[1]=$donnees['id_abonne'];
			$resultat[2]=$donnees['prenom_maj'];
			$resultat[3]=$donnees['nom_maj'];
			$resultat[4]=$donnees['adresse'];
			$resultat[5]=$donnees['date'];
			$resultat[6]=$periode;
			$resultat[7]=$donnees['ancien_index'];
			$resultat[8]=$donnees['nouvel_index'];
			$resultat[9]=$diff;
			$resultat[10]=$tarif;
			$resultat[11]=$montant;
			$resultat[12]=$dette;
			$resultat[13]=$date_expiration;
			
			return $resultat;

	}

	/*********** changer l'etat du compteur **********/

	function changerEtatCompteur($id_compteur,$etat){
		$req=$this->bdd->prepare("UPDATE compteur SET etat=:n1 WHERE id_compteur=:n2");
		$req->execute(array(
			':n1'=>$etat,
			 ':n2'=>$id_compteur
		));
	}

	/**** Fonction update compteur *****/
	function modifierCompteur($id_compteur,$ancien_index,$nouvel_index,$date_index){
		list($y,$m,$d)=explode("-",$date_index);
		$m=$m+1;
		if($m==12)
			{
				$m=1;
				$y=$y+1;
			}
			$requete1=$this->bdd->query("UPDATE compteur SET ancien_index='$ancien_index',nouvel_index='$nouvel_index' WHERE id_compteur='$id_compteur' ");
			$sql=$this->bdd->query("SELECT DISTINCT id_compteur,id FROM compteur WHERE id='$this->id_abonne' AND MONTH(date_index)='$m' AND YEAR(date_index)='$y' ");
			if($data = $sql->fetch())
				{
					$id_compteur2 = $data['id_compteur'];
					$requete2=$this->bdd->query("UPDATE compteur SET ancien_index='$nouvel_index' WHERE id_compteur='$id_compteur2' ");
				}
			}

	/***** Fonction supprimer compteur *********/
	static function supprimerCompteur($bdd,$id_compteur){
		$req =$bdd->query(" delete from  compteur where id_compteur=$id_compteur");
	}

}



/************** Classe Finance **************************/

class Finance{
	
	//private $id_abonne;
	private $bdd;
	//private $id_compteur;
	
	function __construct($bdd){
		$this->bdd=$bdd;
	}
	
	/******** Fonction enregistrer recette**********/
	function saveRecette($abreuvoir,$potence,$divers,$detail,$date_recette){
		$timestamp=strtotime($date_recette);  //conversion de la date d'abonnement en timestamp
		// Insertion des informations dans la table abonne
		$requete = " INSERT INTO recette (r_abreuvoir,r_potence,divers,date_recette,timestamp,detail) VALUES('$abreuvoir','$potence','$divers','$date_recette','$timestamp','$detail')";
		$resultat= $this->bdd->query($requete);
	}

	/******** Fonction enregistrer depense**********/
	function saveDepense($frais_gazoil,$frais_senelec,$frais_entretien,$salaire_releveur,$salaire_gerant,$salaire_conducteur,$divers,$detail,$date_depense){
		$timestamp=strtotime($date_depense);  //conversion de la date d'abonnement en timestamp
		// Insertion des informations dans la table abonne
		$requete = " INSERT INTO depense (d_senelec,d_gazoil,d_entretien,salaire_conducteur,salaire_gerant,salaire_releveur,d_divers,date_depense,timestamp,detail) VALUES('$frais_senelec','$frais_gazoil','$frais_entretien','$salaire_conducteur','$salaire_gerant','$salaire_releveur','$divers','$date_depense','$timestamp','$detail')";
		$resultat= $this->bdd->query($requete);
	}

	/****** Fonction supprimer depense ****/
	function supprimerDepense($id_depense){
		$requete = "delete from depense where id_depense=$id_depense";
		$resultat= $this->bdd->query($requete);
	}
	/****** Fonction supprimer recette ****/
	function supprimerRecette($id_recette){
		$requete = "delete from recette where id_recette=$id_recette";
		$resultat= $this->bdd->query($requete);
	}
	/******** Fonction enregistrer dette**********/
	function saveDette($id_abonne,$num_facture,$montant_dette,$date_dette){
		$etat=0;
		$timestamp=strtotime($date_dette);
		// Insertion des informations dans la table abonne
		$requete = " INSERT INTO dette (montant_dette,num_facture,id_abonne,date_dette,timestamp,etat) VALUES('$montant_dette','$num_facture','$id_abonne','$date_dette','$timestamp','$etat')";
		$resultat= $this->bdd->query($requete);
	}

	/******** Fonction delete dettee**********/
	function supprimerDette($id_dette){
	
		$requete = " delete from  dette where id_dette=$id_dette ";
		$resultat= $this->bdd->query($requete);
	}

	/******** Fonction récuperer  dette**********/
	function getInfoDette($id_abonne){
		//on verifie si l'abonné avait une dette non payée ou pas
		$requete="SELECT * FROM dette WHERE id_abonne=$id_abonne";
		$resultat=$this->bdd->query($requete);
		if($donnee=$resultat->fetch())
			{
			$montant_dette=$donnee['montant_dette']; // on recupére le montant de la dette
			$num_facture=$donnee['num_facture'];
			$date_dette=$donnee['date_dette'];
			}

			return array('montant_dette'=>$montant_dette, 'num_facture'=>$num_facture,'date_dette'=>$date_dette);
	}

	/***** Fonction qui donne les deux tarifs ******/
	function getTarif(){
		$req2=$this->bdd->query("SELECT * FROM tarif where id_tarif=1");
		$datas=$req2->fetch();
		$tarif=$datas['montant_tarif'];
		$req3=$this->bdd->query("SELECT * FROM tarif where id_tarif=2");
		$datas2=$req3->fetch();
		$tarifSpecial=$datas2['montant_tarif'];

		return array('tarif'=>$tarif,'tarifSpecial'=>$tarifSpecial);
	}
	/***** Supervision dépenses sur une période ******/

	function superviserDepense($time1,$time2){
		if($time1<=$time2){
			$timestamp1=strtotime($time1);
			$timestamp2=strtotime($time2);

			$requete = "SELECT * FROM depense WHERE timestamp>='$timestamp1' AND timestamp<='$timestamp2' ORDER BY id_depense";
			$resultat= $this->bdd->query($requete);
			return $resultat;			
		}
	}

		/***** Supervision recette sur une période ******/
	function superviserRecetteTotal($time1,$time2){
		if($time1<=$time2){
			$timestamp1=strtotime($time1);
			$timestamp2=strtotime($time2);
			
			$requet = "SELECT nouvel_index,ancien_index FROM compteur WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' AND special=0 ";
			$resulta= $this->bdd->query($requet);
			$facture_totalNormal=0;
			$volum=0;
			while($don=$resulta->fetch())
				{
					$volum+=$don['nouvel_index']-$don['ancien_index'];
					$facture_totalNormal+=$volum;
				}

			$requet2 = "SELECT nouvel_index,ancien_index FROM compteur WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' AND special=1 ";
			$resulta2= $this->bdd->query($requet2);
			$facture_totalSpecial=0;
			$volum2=0;
			while($don2=$resulta2->fetch())
				{
					$volum2+=$don2['nouvel_index']-$don2['ancien_index'];
					$facture_totalSpecial+=$volum2;
				}

			$tarifSpecial=$this->getTarif()['tarifSpecial'];
			$tarif=$this->getTarif()['tarif'];
			$facture_total=($facture_totalSpecial*$tarifSpecial)+($facture_totalNormal*$tarif);
				//*********
			$repon = $this->bdd->query("SELECT SUM(frais_abonnement) AS abonnement FROM abonne WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' ");
			if($donn = $repon->fetch())
				{
					$abonnement=$donn['abonnement'];
				}
			else{$abonnement=0;}
	
			//*********
			$n=0;
			$rep = $this->bdd->query("SELECT id_compteur FROM compteur WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' AND etat=2 ");
			while($dat = $rep->fetch())
				{
					$n+=$n;
				}
			$bon=$n*3000;
		}
		$res=array();
		$time1=changedate1($time1);
		$time2=changedate1($time2);
		$periode="$time1 au $time2";
		$res[0]=$periode;
		$res[1]=$facture_total;
		$res[2]=$abonnement;
		$res[3]=$bon;
		return $res;
	}

	/***** Supervision facturation sur une période ******/
	function superviserRecette($time1,$time2){
		if($time1<=$time2){
			$timestamp1=strtotime($time1);
			$timestamp2=strtotime($time2);
			// Récupération des abonnés 
			$requete = "SELECT * FROM recette WHERE timestamp>='$timestamp1' AND timestamp<='$timestamp2' ORDER BY id_recette";
			$resultat= $this->bdd->query($requete);
			return $resultat;
			}
	}

	function consommationTotal(){
			
			$requet = "SELECT nouvel_index,ancien_index FROM compteur WHERE special=0 ";
			$resulta= $this->bdd->query($requet);
			$facture_totalNormal=0;
			$volum=0;
			while($don=$resulta->fetch())
				{
					$volum+=$don['nouvel_index']-$don['ancien_index'];
					$facture_totalNormal+=$volum;
				}

			$requet2 = "SELECT nouvel_index,ancien_index FROM compteur WHERE special=1 ";
			$resulta2= $this->bdd->query($requet2);
			$facture_totalSpecial=0;
			$volum2=0;
			while($don2=$resulta2->fetch())
				{
					$volum2+=$don2['nouvel_index']-$don2['ancien_index'];
					$facture_totalSpecial+=$volum2;
				}

			$tarifSpecial=$this->getTarif()['tarifSpecial'];
			$tarif=$this->getTarif()['tarif'];
			$volume=$volum+$volum2;
			$facture_total=($facture_totalSpecial*$tarifSpecial)+($facture_totalNormal*$tarif);
			return array('volume'=>$volume, 'facture_total'=>$facture_total);
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
