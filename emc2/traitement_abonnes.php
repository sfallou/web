<?php
require("connexion_bd.php");
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$telephone=$_POST['telephone'];
$pass=$_POST['passwd'];
$email=$_POST['email'];
$entreprise=$_POST['entreprise'];

$req=mysql_query("insert into abonnes(nom,prenom,mdp,telephone,email,entreprise,etat) values('$nom','$prenom','$pass',$telephone,'$email','$entreprise',0)");
header('Location: nouveau_abonnement.php');
?>


