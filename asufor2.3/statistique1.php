<?php

$tarif=350;
$objet= new Statistique(s0,0);

$total_index=$objet->voulumeTotale($bdd);
$gain_total=$total_index*$tarif;	

list($y1,$m1,$d1)=explode("-",$date_limite1);
list($y2,$m2,$d2)=explode("-",$date_limite2);
$periode="$d1/$m1/$y1 au $d2/$m2/$y2";
?>
					
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
		<tr class="danger">
			<th>P&eacute;riode</th> 
			<th>Volume d'eau (m3)</th>
			<th>Motant facturation</th>
		</tr>
		<tr>
			<td><?php echo $periode;?></td> 
			<td><?php echo $total_index;?></td>
			<td><?php echo $gain_total;?></td>
		</tr>

	</table>

		