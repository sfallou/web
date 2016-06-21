<?php
session_start();
require('secure.php');
//require('classes/utilisateurs.php');


$finance=new Finance($bdd);
$total_index= $finance->consommationPeriode($timestamp1,$timestamp2)['volume'];
$gain_total= $finance->consommationPeriode($timestamp1,$timestamp2)['facture_total'];

list($y1,$m1,$d1)=explode("-",$date_limite1);
list($y2,$m2,$d2)=explode("-",$date_limite2);
$periode="$d1/$m1/$y1 au $d2/$m2/$y2";
?>
					
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
		<tr >
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

		