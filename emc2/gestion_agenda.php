<?php
include("connexion_bd.php");
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF8" />
<title>Agenda</title>
<link rel="stylesheet" href="http://127.0.0.1/emc2/css/style2.css" />
	<script type="text/javascript" src="script/scr3/jquery.js"></script>
	<script type="text/javascript" src="script/scr3/jquery.reveal.js"></script>
	
</head>
	<body>
	<div class="cadre">
		<div class="text">
		Gérer vos Rendez-Vous avec EMC2
		</div> 
		<form class="formulaire" method="POST" action="calendrier.php">
			<p class="clearfix">
		<label for="password">Mot de passe:</label>
		<input type="password" name="password" id="password" placeholder="Mot de passe"> 
		</p>
		<p class="clearfix">
		<label for="login">Utilisateur:</label>
		<select  name="login" id="login" >
		<?php
		$req=mysql_query("select * from abonnes where etat=0");
		while($donnees=mysql_fetch_array($req))
		{
			echo
		"<option>".htmlspecialchars($donnees['entreprise'])."</option><br/>";
		}
		?>
		</p>
		<p class="clearfix">
		<input type="radio" name="choix" value="save_rv"><label>Enregistrer RV</label><br/>
		<input type="radio" name="choix" value="view_rv"><label>Consulter RV</label><br/>
		</p>
		
		<p class="clearfix">
		<input type="submit" name="submit" value="Valider" data-reveal-id="myModal">
		</p>
		</form>
	</div>
	</body>
</html>

