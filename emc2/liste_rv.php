<center><h3>Les Rendez-vous déjà prises</h3>
	<table border="1">
	<tr><th>Date RV</th><th>N°telephone</th></tr>
	<?php
	$req1=mysql_query("select * from agenda where etat=1 AND id_proprietaire='$id'" );
	while($donnee=mysql_fetch_array($req1))
	{
	echo
		'<tr><td>'. htmlspecialchars($donnee['rv']) . '</td>'
		.'<td>'. htmlspecialchars($donnee['telephone']) . '</td></tr>';

	}
	?>
	</table></center>
