<?php
session_start();
	$_SESSION['connect']=1;
	$pass=$_SESSION['pass'];
	$login=$_SESSION['login'];
	$id_user=$_SESSION['id'];
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$telephone=$_SESSION['telephone'];
	$email=$_SESSION['email'];
?>
<?php
require("head.php");
?>
<body>
<?php
include("haut.php");
require("menu.php");
include("text_accueil.php");
?>
</body>
</html>
