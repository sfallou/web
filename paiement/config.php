<?php

// Connexion à la base de données
try
{
$bdd = new PDO('mysql:host=localhost;dbname=transversal', 'root', 'passer');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>
