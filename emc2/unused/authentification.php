<?php
$login=$_POST['login'];
$mot_de_passe=$_POST['password'];	  
        echo   $mot_de_passe $login;
require("connexion_bd.php");
if (isset($_POST['password']) AND isset($_POST['login'])) // Si les variables existent.
	{
	//On récupère les données envoyées par la méthode POST du formulaire d'identification.
        $mot_de_passe=$_POST['password'];
        $login=$_POST['login'];	  
        echo   $mot_de_passe $login
       $req=mysql_query("select * from abonnes where  entreprise='$login' AND etat=0");
	while($donnees=mysql_fetch_array($req))
		{
		$pass=$donnees['mdp'];
		$entreprise=$donnees['entreprise'];
		}
	}
else // Les variables n'existent pas encore.
	{
        $mot_de_passe="";
        $login="";// On crée des variables $mot_de_passe  et $login vides.
	}
 
if ($mot_de_passe == $pass AND $login == $entreprise)
// Si le mot de passe et le login sont bons (valable pour 1 utilisateur ou plus). J'ai mis plusieurs identifiants et mots de passe. 
	{	
	include("accueil.php");
	}
 
else // Le mot de passe n'est pas bon.
	{
// On affiche la zone de texte pour rentrer le mot de passe.
	include("index1.php");
	}
?>
