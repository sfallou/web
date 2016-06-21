<?php

/*	function CreerUtilisateur($bdd, $login, $mdp, $nom, $profil,$etat){
		$mdp=sha1($mdp);
		$requete=$bdd->prepare("INSERT INTO Users (login,mdp,nom,profil,etat) VALUES (?,?,?,?,?) ");
		$bool=$requete->execute(array($login,$mdp,$nom,$profil,$etat));

	}

	function modifierUtilisateur($bdd, $login, $mdp, $nom, $profil,$etat){
		$req=$bdd->prepare("UPDATE Users SET login=:n1, mdp=:n2, nom=:n3, profil=:n4, etat=:n5, WHERE id=:n6");
		$req->execute(array(
			':n1'=>$login,
			 ':n2'=>$mdp, 
			 ':n3'=>$nom, 
			 ':n4'=>$profil, 
			 ':n5'=>$etat,
			 ':n6'=>$id,
		));
	
	function supprimerUtilisateur($bdd,$id){
		$req=$bdd->prepare("DELETE * FROM Users where id=:n1");
		$req->execute(array(':n1'=>$id));
	}
	
	function recupererInformationsUtilisateur($bdd, $id){
		$resultat=array();
		$req=$bdd->prepare('select * from Users where id=:n1');
		$req->execute(array(
			':n1'=>$id
		));
		while($don=$req->fetch()){
			$resultat[]=array(
				'id'=>$don['id'],
				'login'=>$don['login'],
				'mdp'=>$don['mdp'],
				'nom'=>$don['nom'],
				'profil'=>$don['profil'],
				'etat'=>$don['etat'],
				);
		};
	}

/////////////////////////////////////////////////////////////////

	function CreerEcole($bdd, $login, $mdp, $nom, $profil,$etat){
		$mdp=sha1($mdp);
		$requete=$bdd->prepare("INSERT INTO Users (login,mdp,nom,profil,etat) VALUES (?,?,?,?,?) ");
		$bool=$requete->execute(array($login,$mdp,$nom,$profil,$etat));

	}

	function modifierUtilisateur($bdd, $login, $mdp, $nom, $profil,$etat){
		$req=$bdd->prepare("UPDATE Users SET login=:n1, mdp=:n2, nom=:n3, profil=:n4, etat=:n5, WHERE id=:n6");
		$req->execute(array(
			':n1'=>$login,
			 ':n2'=>$mdp, 
			 ':n3'=>$nom, 
			 ':n4'=>$profil, 
			 ':n5'=>$etat,
			 ':n6'=>$id,
		));
	
	function supprimerUtilisateur($bdd,$id){
		$req=$bdd->prepare("DELETE * FROM Users where id=:n1");
		$req->execute(array(':n1'=>$id));
	}
	
	function recupererInformationsUtilisateur($bdd, $id){
		$resultat=array();
		$req=$bdd->prepare('select * from Users where id=:n1');
		$req->execute(array(
			':n1'=>$id
		));
		while($don=$req->fetch()){
			$resultat[]=array(
				'id'=>$don['id'],
				'login'=>$don['login'],
				'mdp'=>$don['mdp'],
				'nom'=>$don['nom'],
				'profil'=>$don['profil'],
				'etat'=>$don['etat'],
				);
		};
	}

/////////////////////////////////////////////////////////////////
*/?>
