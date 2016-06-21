<?php 
class Imprimer{
			
				private $timestamp1;
				private $timestamp2;

			

public	function __construct($timestamp1,$timestamp2)
		{
		 	$this->timestamp1  = $timestamp1;
	 	 	$this->timestamp2  = $timestamp1;
		}

//=======cette fonction revoie un tableau contenant tous les infos a imprimees==============

public	function impression($bdd,$timestamp1,$timestamp1)
		{
			$req=$bdd->prepare("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,cni,ancien_index,nouvel_index,id,id_compteur,DATE_FORMAT(date_index, '%d/%m/%Y') AS date,DATE_ADD(date_index, INTERVAL 15 DAY) AS date_expiration,DATE_SUB(date_index, INTERVAL 30 DAY) AS periode FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE compteur.timestamp >= :time1 AND compteur.timestamp <= :time2 ORDER BY adresse");
			$req->execute(array(
								':time1' => $this->timestamp1,
								':time2' => $this->timestamp2

								));

			return $req->fetch();


		}	

//=======cette fonction renvoie un tableau on y recupere $dette,$date_dette ,$num_facture=========

public	function  donne_a_Imprimer($bdd,$id_abonne)
		{
		   $req=$bdd->prepare("SELECT * FROM dette WHERE id_abonne= :id_abonne AND etat=0 LIMIT 0,1");
		   $req->execute(array(
		   						':id_abonne' => $id_abonne
							  ));
			return $req->fetch();				  	

		}	

//=====fonction qui renvoie les infos pousr le bon d'abonnment=======

public function bon_abonnement($bdd,$id_abonne)
		{
			$req=$bdd->prepare("SELECT * FROM abonne WHERE id_abonne= :id_abonne ");
			$req->execute(array(':id_abonne' => $id_abonne ));
			return $req->fetch() ;

		}

//======fonction pour le bon de coupre==============

public function bon_coupure($bdd,$id_compteur)
		{
		$req=$bdd->prepare("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,telephone,adresse,cni,ancien_index,nouvel_index,id,id_compteur,DATE_FORMAT(date_index, '%d/%m/%Y') AS date,DATE_ADD(date_index, INTERVAL 15 DAY) AS date_expiration,DATE_SUB(date_index, INTERVAL 30 DAY) AS periode FROM abonne)	
							JOIN compteur
							ON abonne.id_abonne=compteur.id
							WHERE id_compteur = :id_compteur ORDER BY date_index DESC LIMIT 0,1" );
		$req->execute(array( ':id_compteur' => $id_compteur ));
		return $req->fetch();

		}

}

?>