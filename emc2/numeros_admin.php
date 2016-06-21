<?php
require("head.php");
?>
<body>
<?php
require("connexion_bd.php");
	include("haut.php");
	require("menu_admin.php"); 
?>
<h3 class="titre">Liste des contacts</h3>

<table border="1" cellpadding="0" cellspacing="5" align="center" width="700" bgcolor="#fff" class="titre" style="margin-top:80px;margin-left:350px">
	<tr><th>Numéro</th><th>Prénom</th><th>Nom</th><th>Username</th></tr>
	<?php
	$req=mysql_query("select * from users");
	while($donnees=mysql_fetch_array($req))
	{
		   $num=$donnees['numero'];
		   $prenom=$donnees['prenom']; 
		   $nom=$donnees['nom']; 
		   $username=$donnees['username']; 
		   $context=$donnees['context'];  
		      echo "<tr><td>$num</td><td>$prenom</td><td>$nom</td><td>$username</td></tr>";
						
	}
	?>
	
</table>
</body>
</html>
