<?php
require("connexion.php");

		$sport=$_POST["sport"];
		$equipe=$_POST["equipe"];
		$classement_equipe="---";
		
		$requete=$bdd->prepare("INSERT INTO MatchsSpecial (sport,equipe,classement_equipe) VALUES (?,?,?) ");
		$bool=$requete->execute(array($sport,$equipe,$classement_equipe));


?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("index.php");// On se replace à l'index
</script>