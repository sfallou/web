<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion Agenda</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>

<body>
<?php
	include("haut.php"); 
	require("connexion_bd.php");
?>
<form action="index.php" method="POST">
<br /><br />
<table border="0" cellpadding="0" cellspacing="5" align="center" width="500">
	<tr><td >Connectez-vous en tant que: </td><td><select name="identifiant">
		<?php
		$req=mysql_query("select * from abonnes where etat=0");
		while($donnees=mysql_fetch_array($req))
		{
			$pass=$donnees['mdp'];
			echo
		'<option>'.htmlspecialchars($donnees['entreprise']).'</option>';
		}
		echo
	"</select></td></tr><br/>
	<tr><td >Mot de passe: </td><td><input type='password' name='passwd'>
	<tr><td></td><td><input type='submit' value='OK' /></td></tr>"
	?>
</table>
</form>
</body>
</html>
