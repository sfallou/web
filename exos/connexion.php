<?php
try
{
	 $bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>