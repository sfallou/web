<?php/*
	$link=mysqli_connect("localhost","root","passer","gondwana");*/
?>
<?php
try
{
	 $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>