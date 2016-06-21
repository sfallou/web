<?php

try	{
		$bdd=new PDO('mysql:host=localhost;dbname=asufor;charset=utf8','root','passer');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
catch (Exception $e)
	{
		die ("erreur connexion:".$e->getMessage() );
	}
?>
