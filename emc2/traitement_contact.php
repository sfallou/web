
<?php
require("connexion_bd.php");
$email=$_POST['email'];
$objet=$_POST['objet'];
$nom=$_POST['nom'];
$message=$_POST['message'];
$date=date("Y-m-d H:i");
	$req=mysql_query("INSERT INTO messages (nom,objet,message,email,date) VALUES('$nom','$objet','$message','$email','$date')");
	header("Location: ok.php");
?>

