<?php
require("head.php");
require("verification.php");
?>
<center>
<table border=1 width="1200px">
	
<?php include("entete.php"); ?>
<tr>
	<td width="200px" align=center >
	<?php include("layoutGauche.php"); ?>
	</td>
	<td class=contenu ><br/><br/>
	<!-- code du contenu de la page -->
	<table class="formulaire">
		<tr><td><li class=""><a href="statistique.php" target="blank">Sexe</a></li></td>
			<td><li class=""><a href="statistique2.php" target="blank">Age</a></li>
		</td>
		</tr>
	</table>
	
	</td>
</tr>
<tr>
	<?php include("footer.php");?>
</tr>
</table>
</center>