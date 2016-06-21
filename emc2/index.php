<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF8" />
<title>Authentification</title>
<link rel="stylesheet" href="style2-1.css" />
	<script type="text/javascript" src="script/scr3/jquery.js"></script>
	<script type="text/javascript" src="script/scr3/jquery.reveal.js"></script>
	
</head>
<body>
<div class="cadre">
<div class="text">
		Connecter vous en tant que
</div> 
<form class="formulaire" method="POST" action="authentification1.php">
	<p class="clearfix">
	<table>
	<tr><td><input type="radio" name="choix" value="user" id="user"/></td><td><label for="choix">Utilisateur</label></td></tr> 
	<tr><td><input type="radio" name="choix" value="admin" id="admin"/></td><td><label for="choix">Administrateur</label></td></tr> 
	</table
	</p>
	<p class="clearfix">
		<input type="submit" name="submit" value="CONNECTER" data-reveal-id="myModal">
	</p>
</form>
</div>
		</body>
	</html>

