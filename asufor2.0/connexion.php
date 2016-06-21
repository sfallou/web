<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=asufor;charset=utf8', 'root', 'passer');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
