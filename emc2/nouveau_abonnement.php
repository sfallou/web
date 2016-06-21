<?php
require("head.php");
?>
<body>
<?php
	include("haut.php");
	require("menu_admin.php"); 
?>
<h3 class="titre">Nouvel abonnement</h3>
<!-- Emplacement du formulaire -->
<form action="traitement_abonnes.php" method="POST" class="formulaire abonne">
<br /><br />
<table  >
	<tr><td class="label">Nom: </td><td><input type="text" name="nom"> </td></tr>
	<tr><td class="label">Prénom: </td><td><input type="text" name="prenom"> </td></tr>
	<tr><td class="label">Mot de passe: </td><td><input type="password" name="passwd"> </td></tr>
	<tr><td class="label">Téléphone: </td><td><input type="text" name="telephone" > </td></tr>
	<tr><td class="label">Email: </td><td><input type="text" name="email" placeholder="contact@emc2-group.com"> </td></tr>
	<tr><td class="label">Entreprise: </td><td><input type="text"  name="entreprise"></td></tr>
	<tr><td></td><td><input type="submit" value="OK" /></td></tr>
</table>
</form><br/>
</body>
</html>
