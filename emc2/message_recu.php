<?php
require("head.php");
?>
<body>
<?php
require("connexion_bd.php");
	include("haut.php");
	require("menu_admin.php"); 
?>
<h3 class="titre">Messages reçus</h3>
<table border="1" style="margin-top:55px;margin-left:350px;" bgcolor="white" width="500px">
	<td>
	<?php
	$req1=mysql_query("select * from messages");
	while($donnee=mysql_fetch_array($req1))
	{
	echo
		"<p><strong>Date et Heure: </strong>". htmlspecialchars($donnee['date']) . "<br/>"
		."<strong>Envoyé par: </strong>". htmlspecialchars($donnee['nom']) . "<br/>"
		."<strong>Objet: </strong>". htmlspecialchars($donnee['objet']) . "<br/>"
		."<strong>Message: </strong>". htmlspecialchars($donnee['message']) . "<br/>"
		."<strong>Email: </strong>". htmlspecialchars($donnee['email']) . "<br/></p>*********************<p></p>";

	}
	?>
	</td>
</table>
</body>
</html>

