<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=challenge2016;charset=utf8', 'root', 'passer');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
