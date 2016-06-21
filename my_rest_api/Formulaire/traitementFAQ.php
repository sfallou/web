<?php
require("connexion.php");


		$titre=$_POST["titre"];
		$question=$_POST["question"];
		$reponse=$_POST["reponse"];
		
		$requete=$bdd->prepare("INSERT INTO Faq (titre,question,reponse) VALUES (?,?,?) ");
		$bool=$requete->execute(array($titre,$question,$reponse));


?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("index.php");// On se replace à l'index
</script>