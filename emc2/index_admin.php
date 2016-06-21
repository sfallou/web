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
		Plateforme de prise de Rendez-vous
</div> 
<form class="formulaire" method="POST" action="authentification_admin.php">
	<p class="clearfix">
		<label for="login">Administrateur:</label>
		<input type="text" name="admin" id="admin" placeholder="login"> 
		
	</p>
	<p class="clearfix">
		<label for="password">Mot de passe:</label>
		<input type="password" name="password" id="password" placeholder="Mot de passe"> 
	</p>
	<p class="clearfix">
		<input type="submit" name="submit" value="CONNECTER" data-reveal-id="myModal">
	</p>
</form>
</div>
		</body>
	</html>

