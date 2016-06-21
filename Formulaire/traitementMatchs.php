<?php
require("connexion.php");


		$sport=$_POST["sport"];
		$equipe1=$_POST["equipe1"];
		$equipe2=$_POST["equipe2"];
		$date=$_POST["date"];
		$heure=$_POST["heure"];
		$score1=$_POST["score1"];
		$score2=$_POST["score2"];
		$phase=$_POST["phase"];
		$poule=$_POST["poule"];
		$lieu=$_POST["lieu"];
		$etat=0;
		
		$requete=$bdd->prepare("INSERT INTO Matchs (sport,equipe1,equipe2,date_match,heure_match,lieu,score1,score2,phase,poule,etat) VALUES (?,?,?,?,?,?,?,?,?,?,?) ");
		$bool=$requete->execute(array($sport,$equipe1,$equipe2,$date,$heure,$lieu,$score1,$score2,$phase,$poule,$etat));


?>
<script language="JavaScript">
    alert("Les informations ont ete enregistree avec succes!!");
    window.location.replace("nouveau_match.php");// On se replace à l'index
</script>