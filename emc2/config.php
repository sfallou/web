<?php

	try 
	{
	$DB= new PDO('mysql:host=localhost;dbname=planning', 'root', 'passer',array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8'));	
	}
	catch (PDOException $e)
	{
		echo "Erreur de connexion de la bdd";
		exit();
	}
/*

$serveur="127.0.0.1";
$login="root";
$pass="";
$db="planning";
$cnx=mysql_connect($serveur,$login,$pass);
$sel=mysql_select_db($db);
*/
?>
