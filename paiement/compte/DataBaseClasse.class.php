<?php
require_once("Client.class.php");
require_once("Compte.class.php");
class DataBaseClasse{



//Done
//UpdateAccount

public function updateAccount($ncin,$etat,$typeOf,$birthDate,$money,$mdp)
{

	try {	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	    }
			$req = $bdd->prepare("UPDATE compte SET idCompte=?,etatCompte=?,typeCompte=?,dateCreation=?,soldeCompte=? WHERE idCompte=?");

			$req->execute(array(  $ncin, $etat, $typeOf, $birthDate, $money,$ncin ));
			$req->closeCursor();
}

//Done
//Changer un mot de passe
public function changePwd($idCli,$mdp)
{
	try {	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	    }
			$req = $bdd->prepare("UPDATE client SET password=? where idClient=?");

			$req->execute(array( $mdp, $idCli ));
			
			$req->closeCursor();
}

//Done
//Compter les résultats d'une requête generique
public function countDown($table)
{
	try {	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	     }
	     if($table=="client"){
	     	$req = $bdd->prepare("SELECT * FROM  client"); 
	     }
	     else
	     {
	     	$req = $bdd->prepare("SELECT * FROM  compte"); 
	     }
	
	$req->execute(array());
	return $req->rowCount();
	}

//Done
//Inserer un compte dans la table client_compte
function insertBetween($idAccount,$idCli)
{	

	try {
	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	     }

	$req = $bdd->prepare("INSERT INTO compte_client (idCompte,idClient) VALUES (?,?)"); 
	
	$req->execute(array( $idAccount,$idCli));

}



//Done
//Inserer un compte dans la base de données
function insertClient($sender,$idCli,$nom,$prenom,$mdp,$addr,$mail,$typ)
{	

	try {
	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	     }

	$req = $bdd->prepare("INSERT INTO client (idClient,nomClient,prenomClient,adresseClient,telephoneClient,emailClient,password,type) VALUES (?,?,?,?,?,?,?,?)"); 
	
	$req->execute(array($idCli, $nom, $prenom, $addr,$sender, $mail,$mdp,$typ));
}


//Done
//Inserer un compte dans la base de données
function insertAccount($idCli,$idAccount,$typeh)
{	

	try {
	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	     }

	$req = $bdd->prepare("INSERT INTO compte (idCompte,etatCompte,typeCompte,dateCreation,soldeCompte) VALUES (?,?,?,?,?)"); 
	
	$req->execute(array($idAccount, 0, $typeh, date("Y-m-d h:i:s"), 0));

	$this->insertBetween($idAccount,$idCli);
}

//A revoir completely
//Est ce vraiment utile?
//Mettre à jour les infos d'un client
function updateClient($ncin,$nom,$prenom,$addr,$tel,$mail,$mdp,$typeOf)
{	

	try {
	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	     }

	$req = $bdd->prepare("UPDATE client SET idClient=?,nomClient=?,prenomClient=?,adresseClient=?,telephoneClient=?,emailClient=?,password=?,type=? WHERE idClient=? and password=?"); 
	
	$req->execute(array($ncin, $nom, $prenom, $addr,$tel,$mail,$mdp,$typeOf,$ncin,$mdp));

	$req->closeCursor();
}


//Done
//Recuperer un client dans la base de données
function retrieveClient($id,$mdp)
{	

	try {	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         die('Erreur : '.$e->getMessage()); 
	     }

	$req = $bdd->prepare("SELECT * FROM client WHERE idClient=? AND password=?"); 	
	$req->execute((array($id, $mdp)));
	if($req->rowCount()==1){
	$donnees = $req->fetch(); 
	$req->closeCursor();
	return $donnees['idClient'].".".$donnees['nomClient'].".".$donnees['prenomClient'].".".$donnees['adresseClient'].".".$donnees['telephoneClient'].".".$donnees['emailClient'].".".$donnees['password'].".".$donnees['type'];
	}else{return "erreur";}
}

//Done
//Recuperer un client dans la base de données à partir d'un compte et d'un mot de passe
function retrieveClientPro($id,$mdp)
{	

	try {	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	         return "erreur"; 
	     }

	$req = $bdd->prepare("SELECT * FROM client Inner Join compte_client on compte_client.idClient=client.idClient WHERE idCompte=? AND password=?"); 	
	$req->execute((array($id, $mdp)));
	if($req->rowCount()==1){
	$donnees = $req->fetch(); 
	$req->closeCursor();
	return $donnees['idClient'].".".$donnees['nomClient'].".".$donnees['prenomClient'].".".$donnees['adresseClient'].".".$donnees['telephoneClient'].".".$donnees['emailClient'].".".$donnees['password'].".".$donnees['type'];
	}else{return "erreur";}

}

//Done
//Récuperer un compte dans la base de données
public function retrieveAccount($ncin,$mdp)
{


	try {	 		
	 		$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
	 	} 
	catch(Exception $e) {
	        return "erreur"; 
	     }
	$c=new Client();
	$infosClient=$c->getClientFromAccount($ncin,$mdp);
	if(count(explode(".",$infosClient))>1){
	$req = $bdd->prepare("SELECT * FROM compte WHERE idCompte=?"); 	
	$req->execute((array($ncin)));
	if($req->rowCount()==1){
	$donnees = $req->fetch();
	$req->closeCursor();
	return $donnees['idCompte'].".".$donnees['etatCompte'].".".$donnees['typeCompte'].".".$donnees['dateCreation'].".".$donnees['soldeCompte'];
	}else{return "erreur";}
	}
	else
	{
		return "erreur";
	}
			
}

}

?>
