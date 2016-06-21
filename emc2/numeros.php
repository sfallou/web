<?php
require("head.php");
?>
<body>
<?php
	include("haut.php");
	require("menu.php"); 
?>
<style>.txt {color: #555555; font-family: verdana; text-align: right; font-size: 12px}</style>
<h3 class="titre">Liste des contacts</h3>

<table  cellpadding="0" cellspacing="0" border="1" style=" width:700px; margin-top:50px; margin-left:150px;" class="titre">
	<tr>
		<td>
			<table border="1">
				<tr><th>Numéro</th><th>Prénom</th><th>Nom</th><th>Username</th></tr>
				<?php
				require("connexion_bd.php");
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
		</td>
		<td>&nbsp;</td>
		<td width="100 px" ><img src="images/ordi.jpg" alt="agenda: " height="400 px"/></td>
	</tr>
</table>
</body>
</html>
