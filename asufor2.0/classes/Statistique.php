<?php

class Statistique
{
	private $timestamp1;
	private $timestamp2;
	
public	function __construct($timestamp1,$timestamp2)
		{
		 	$this->timestamp1  = $timestamp1;
	 	 	$this->timestamp2  = $timestamp2;
		}

//fonction qui renvoie l'infos de tous les abonnes
public function abonnes($bdd)
		{
		$req=$bdd->prepare("SELECT * FROM abonne ORDER BY id_abonne");
		$req->execute();
		return $req->fetch() ;	
		}		

//fonction qui renvoie liste contennant le infos de l'abonne
public	function listeAbonne($bdd) 
		{
		 	$req=$bdd->prepare("SELECT id_abonne,nom,prenom,cni,telephone,adresse,telephone,date_abonnement FROM abonne");
			$req->execute();
			return $req->fetch(); 	
		}	

//on recupere l'id a partir de la foonction getID()

public	function liste($bdd,$timestamp1,$timestamp2)
		{
			$req=$bdd->prepare("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE  compteur.timestamp >= :times1 AND compteur.timestamp <= :times2 ORDER BY date_index DESC ");
		$req->execute(array(
						':times1' =>$timestamp1,
						':times2' =>$timestamp2
							));

			$donne=$req->fetch();
			return $donne;				

		}


//fonction qui renvoie un tableau 

public 	function etat($bdd,$timestamp1,$timestamp2)
		{
			$req=$bdd->prepare("SELECT id_abonne, UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur ON abonne.id_abonne=compteur.id  
								WHERE  compteur.timestamp >= :time1 AND compteur.timestamp <= :time2 ORDER BY date_index DESC ");
			$req->execute(array(
								':time1' => $this->timestamp1,
								':time2' => $this->timestamp2

								));

			 return  $req->fetch() ;
 		}


//fonction qui renvoie la difference d'index

public 	function difIndex($bdd,$timestamp1,$timestamp2)
 		{
 			$req=$bdd->prepare("SELECT SUM(nouvel_index-ancien_index) AS total_index FROM compteur WHERE timestamp >= :time1 AND timestamp <= :time2 ");
 			$req->execute(array(

 								':time1' => $this->timestamp1,
 								':time2' => $this->timestamp2 

 								));
 			if($donne=$req->fetch() )
 				{

 				return $donne['total_index'];	
 				}

 		}	

//fonction qui renvoie les depenses se situant entre deux dates

public	function depense($bdd,$timestamp1,$timestamp2)
		{
		 $req=$bdd->prepare("SELECT * FROM depense WHERE timestamp >= :time1 AND timestamp <= :time2 ORDER BY id_depense");	
		 $req->execute(array(
		 					 ':time1' => $this->timestamp1,
 							 ':time2' => $this->timestamp2
							));
		 
		}	

//cette fonction renvoie le montant totale de la facture entre deux periodes donnees

public	function volume_eau($bdd,$timestamp1,$timestamp2)
		{
			$req=$bdd->prepare("SELECT SUM(nouvel_index-ancien_index) AS total_index FROM compteur WHERE timestamp >= :time1 AND timestamp <= :time2 ");
			$req->execute(array(
								':time1' => $this->timestamp1,
 							    ':time2' => $this->timestamp2
								));
			if($donne=$req->fetch() )
			 {
			 	return $donne['total_index'];
			 }
		}	

//fonction qui renvoie les frais d'abonnement
public	function fraisAbonnement($bdd)
		{
			$req=$bdd->prepare("SELECT SUM(frais_abonnement) AS abonnement FROM abonne WHERE timestamp >= :time1 AND timestamp <= :time2 ");
			$req->execute(array(
								':time1' => $this->timestamp1,
 							    ':time2' => $this->timestamp2
							  ));
			if($donne=$req->fetch() )
				{
				  $frais_abnnement=$donne['abonnement'];
				}

		}	

//fonction qui renvoie le nombre d'abonne par village
public	function abonneVillage($bdd,$village)
		{
		$nbr_abonne=0;
		$req=$bdd->prepare("SELECT * FROM abonne WHERE adresse= :village")	;
		$req->execute(array(
						':village' => $village

						));
			while( $donnes=$req->fetch() )
				{
				 $nbr_abonne++; 					
				}
			return $nbr_abonne;	

		}			

//fonction qui renvoie les depenses totales

public	function totaleDepense($bdd)
		{
		 $req=$bdd->prepare("SELECT SUM(d_senelec+d_gazoil+d_entretien+salaire_conducteur+salaire_gerant+salaire_releveur+d_divers) AS depenses FROM depense");	
		 $req->execute();
		 if($donnes=$req->fetch() )
		   {
		   	return $donnes['depenses'];	
		   }
		} 	

//fonction qui envoie les recettes totales
public	function totaleRecette($bdd)
	   {
		 $req=$bdd->prepare("SELECT SUM(r_facture+r_abreuvoir+r_potence+bon_coupure) AS recettes FROM recette");	
		 $req->execute();
		 if($donnes=$req->fetch() )
		   {
		   	return $donnes['recettes'];	
		   }

		} 	


//====......cette fonction renvoie le Volume totale.......==== 

public	function voulumeTotale($bdd)
		{
		  $req=$bdd->prepare("SELECT SUM(nouvel_index-ancien_index) AS volume FROM compteur");	
		  $req->execute();
		  if($donnes=$req->fetch() )
		    {
			 $volume=$donnes['volume'];	
			}
			return $volume;
		}	

//========..........pour etat=0..............=======

public function changeEtatFact($bdd,$id_abonne)
		{		
			$req=$bdd->prepare("UPDATE compteur SET etat = 0 WHERE id= :id_abonne ");
			$req->execute(array(':id_abonne' =>$id_abonne ));
		}

public function changeEtatAbonne($bdd,$id_abonne)
		{		
			$req=$bdd->prepare("UPDATE abonne SET etat = 0 WHERE id_abonne= :id_abonne ");
			$req->execute(array(':id_abonne' =>$id_abonne ));
		}

//=======........fin etat=0....====================

//fonction qui verifie si l'abonne a une dette
public function verifie_dette_abonne($bdd,$id_abonne)
		{

			$req=$bdd->prepare("SELECT * FROM dette WHERE id_abonne= :id_abonne ");
			$req->execute(array(':id_abonne' =>$id_abonne ));
			return $req->fetchAll();
		}

//===========........pour etat=2.......============

public function etat_facture_rouge($bdd,$id_abonne)
		{

			$req=$bdd->prepare("UPDATE compteur SET etat = 2 WHERE id= :id_abonne ");
			$req->execute(array(':id_abonne' =>$id_abonne ));
		}


public function etat_abonne_rouge($bdd,$id_abonne)
		{

			$req=$bdd->prepare("UPDATE abonne SET etat = 2 WHERE id_abonne= :id_abonne ");
			$req->execute(array(':id_abonne' =>$id_abonne ));
		}		

//=======........fin etat=2...........==============

//===========......pour etat=1.....=================

public function changeEtatFact1($bdd,$id_compteur)
		{		
			$req=$bdd->prepare("UPDATE compteur SET etat = 1 WHERE id_compteur= :id_compteur");
			$req->execute(array(':id_compteur' =>$id_compteur ));
		}


public function changeEtatAbonne1($bdd,$id_abonne)
		{		
			$req=$bdd->prepare("UPDATE abonne SET etat = 1 WHERE id_abonne= :id_abonne");
			$req->execute(array(':id_abonne' =>$id_abonne ));
		}


//=======........fin etat=1...........============================

//======....fonction qui renvoie les donnees de l'abonne...=======		


					

}//fin de la classe statistique

?>