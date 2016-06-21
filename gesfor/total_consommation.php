<?php
session_start();
require('secure.php');
require ('connexion.php');
//require('classes/utilisateurs.php' );

 $finance=new Finance($bdd);
$volume= $finance->consommationTotal($bdd)['volume'];
$montant= $finance->consommationTotal($bdd)['facture_total'];


?>

<table >
	<tr>
		<td>
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<tr ><th>Volume(m3)</th><th>Montant (Fcfa)</th></tr>
				<tr ><td rowspan="10"><?php echo $volume;?></td><td rowspan="10" ><?php echo $montant;?></td></tr>
		
			</table>
		</td>
	</tr>
</table>

	