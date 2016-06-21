<?php
require("connexion_bd.php");
$nbr0=0;$nbr1=0;$nbr2=0;$nbr3=0;$nbr4=0;$nbr5=0;$nbr6=0;$nbr7=0;
	$reponse0 = mysql_query("SELECT * FROM abonne WHERE adresse='seokhaye' ");
		while($donnees0 = mysql_fetch_array($reponse0))
			{
			$nbr0=$nbr0+1;	
			}
	$reponse1 = mysql_query("SELECT * FROM abonne WHERE adresse='sine' ");
		while($donnees1= mysql_fetch_array($reponse1))
			{
			$nbr1=$nbr1+1;	
			}
	$reponse2 = mysql_query("SELECT * FROM abonne WHERE adresse='keur_ibra' ");
		while($donnees2 = mysql_fetch_array($reponse2))
			{
			$nbr2=$nbr2+1;	
			}
	$reponse3 = mysql_query("SELECT * FROM abonne WHERE adresse='kanene' ");
		while($donnees3 = mysql_fetch_array($reponse3))
			{
			$nbr3=$nbr3+1;	
			}
	$reponse4 = mysql_query("SELECT * FROM abonne WHERE adresse='daraja' ");
		while($donnees4 = mysql_fetch_array($reponse4))
			{
			$nbr4=$nbr4+1;	
			}
	$reponse5 = mysql_query("SELECT * FROM abonne WHERE adresse='keur_malamine' ");
		while($donnees5 = mysql_fetch_array($reponse5))
			{
			$nbr5=$nbr5+1;	
			}
	$reponse6 = mysql_query("SELECT * FROM abonne WHERE adresse='keur_mory' ");
		while($donnees6 = mysql_fetch_array($reponse6))
			{
			$nbr6=$nbr6+1;	
			}
	$reponse7 = mysql_query("SELECT * FROM abonne WHERE adresse='khourwa' ");
		while($donnees7 = mysql_fetch_array($reponse7))
			{
			$nbr7=$nbr7+1;	
			}
	$nbr=$nbr0+$nbr1+$nbr2+$nbr3+$nbr4+$nbr5+$nbr6+$nbr7;
?>

<table border="1" class="text">
<tr><td colspan="2"><h2 class="text">Nombre d'abonnés par village</h2></td></tr>
	<tr><th>Villages</th><th>Nombre d'abonnés</th></tr>
	<tr><td>Séokhaye</td><td><?php echo$nbr0;?></td></tr>
	<tr><td>Sine</td><td><?php echo$nbr1;?></td></tr>
	<tr><td>Keur Ibra</td><td><?php echo$nbr2;?></td></tr>
	<tr><td>Kanene</td><td><?php echo$nbr3;?></td></tr>
	<tr><td>Daraja</td><td><?php echo$nbr4;?></td></tr>
	<tr><td>Keur Malamine</td><td><?php echo$nbr5;?></td></tr>
	<tr><td>Keur Mory</td><td><?php echo$nbr6;?></td></tr>
	<tr><td>Khourwa</td><td><?php echo$nbr7;?></td></tr>
	<tr><td colspan="2" align="center"> Total=<?php echo"$nbr";?></tr>
</table>