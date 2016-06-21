<?php
require("connexion.php");

		$login=$_POST["login"];
		$mdp=sha1($_POST["mdp"]);
		$nom=$_POST["nom"];
		$profil=$_POST["profil"];
		$etat=1;
		$requete=$bdd->prepare("INSERT INTO Users (login,mdp,nom,profil,etat) VALUES (?,?,?,?,?) ");
		$bool=$requete->execute(array($login,$mdp,$nom,$profil,$etat));


?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("liste_users.php");// On se replace à l'index
</script>