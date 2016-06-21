<?php
require("head.php");
?>
<body>
<?php
	include("haut.php");
	require("menu_admin.php"); 
?>
<h3 class="titre">Nouvel utilisateur</h3>
<form action="traitement_ajout.php" method="POST" class="formulaire abonne">
<br /><br />
<table >
	<tr><td class="label">Nom: </td><td><input type="text" name="nom"> </td></tr>
	<tr><td class="label">Prénom: </td><td><input type="text" name="prenom"> </td></tr>
	<tr><td class="label">username: </td><td><input type="text" name="username"> </td></tr>
	<tr><td class="label">Numéro: </td><td><input type="text" name="numero" placeholder="5020"> </td></tr>
	<tr><td class="label">Mot de passe: </td><td><input type="password" name="passwd"> </td></tr>
	<tr><td class="label">Email: </td><td><input type="text" name="email" placeholder="contact@emc2_group.com"> </td></tr>
	<tr><td class="label">Contexte: </td><td><select  name="context"><option>emc2</option></select></td></tr>
	<tr><td></td><td><input type="submit" value="OK" /></td></tr>
</table>
</form><br/>
</body>
</html>
