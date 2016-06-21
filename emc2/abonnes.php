<?php
require("head.php");
?>
<body>
<?php
require("connexion_bd.php");
	include("haut.php");
	require("menu_admin.php"); 
?>
<h3 class="titre">La liste des abonnés</h3>
	<table border="1" bgcolor="#fff"  class="titre" style=" margin-top:80px;margin-left:100px">
	<tr><th class="td">Identifiant</th><th>Prénom</th><th>Nom</th><th>Téléphone</th><th>Email</th><th>Entreprise</th></tr>
	<?php
	$req1=mysql_query("select * from abonnes where etat=0");
	while($donnee=mysql_fetch_array($req1))
	{
	echo
		"<tr><td>". htmlspecialchars($donnee['id_abonne']) . "</td>"
		."<td>". htmlspecialchars($donnee['prenom']) . "</td>"
		."<td>". htmlspecialchars($donnee['nom']) . "</td>"
		."<td>". htmlspecialchars($donnee['telephone']) . "</td>"
		."<td>". htmlspecialchars($donnee['email']) . "</td>"
		."<td>". htmlspecialchars($donnee['entreprise']) . "</td></tr>";

	}
	?>
	</table></center>
</body>
</html>

