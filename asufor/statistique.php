<?php

	$reponse = mysql_query("SELECT SUM(nouvel_index-ancien_index) AS total_index FROM compteur WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' ");
	if($donnees = mysql_fetch_array($reponse))
		{
		$total_index=$donnees['total_index'];
		$gain_total=$total_index*$tarif;
		}
	list($y1,$m1,$d1)=explode("-",$date_limite1);
	list($y2,$m2,$d2)=explode("-",$date_limite2);
	$periode="$d1/$m1/$y1 au $d2/$m2/$y2";
?>
		

<center><h2 class="text">Tableau des statistiques (Consommation)</h2></center>
					
	<table border="1" class="table">
		<tr>
			<th style="background:#094963;color:#fff;">Période</th> 
			<th style="background:#094963;color:#fff;">Volume d'eau (m3)</th>
			<th style="background:#094963;color:#fff;">Motant facturation</th>
		</tr>
		<tr><td><?php echo $periode;?></td> <td><?php echo $total_index;?></td><td><?php echo $gain_total;?></td></tr>
	</table>

		