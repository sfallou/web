<?php
	session_start();
 require_once("global.php");
	require_once("fonctions.php");
	connecter($host, $user, $pw,$db);
	//salt chaine a retirer du  password 
		$salt = '8dn37dnsa9nd7012na';
	//login
	$login = $_POST['login'];
	$password=$_POST['password'];
	//$password = hash('md5',$_POST['password'] . $salt);
		//chercher login dans la BDD
	$req = "SELECT loginUser FROM USER WHERE loginUser='".$login."'";
	//echo $req;
	$result = mysql_query($req)or die('Impossible de se connecter a la BDD ');
	if (mysql_num_rows($result) == 0)
	{
		header('Location: ../connexion.php?lerror=1');
		unset($_SESSION["login"]);
		exit;
	}
	//rendre username superglobal
	$_SESSION["login"] = $login;
	//chercher password dans la BDD
	$query = "SELECT * FROM USER WHERE loginUser='".$login."' AND passwordUser='".$password."'";
	//echo $query;
	$res = mysql_query($query)or die('Mot de passe non trouver!');
	if (mysql_num_rows($res) == 0)
	{
		header('Location: ../index.php?lerror=2');
		unset($_SESSION["login"]);
		exit;
	}
	//si tout est correct
	//repc
			$row = mysql_fetch_array($res);
			//recuperation infos 
		    	$idUser = $row['idUser'];
			 
	         $login= $row['loginUser'];	
		
					
		 			
	//recuperation type user
		mysql_close();
      //definir sessions
             $_SESSION['idUser'] =$idUser ;
			 $_SESSION['bdd'] =$db ;	  
	         $_SESSION['login'] = $loginUser;
				 
			//fin recuperation sessions
 if($_SESSION["type"]=="admin"){
	  header('Location:admin.php?');
	}
	
			 //
	header('Location:users.php?');
	exit;
	
?>