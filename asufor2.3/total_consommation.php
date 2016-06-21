<?php
session_start();
require_once ('connexion_bd.php');
require_once ('classes/Statistique.php' );

$objet=new Statistique(0,0);
$tarif=350;
$volume = $objet->voulumeTotale($bdd);

//======...le montant total...=========
$montant  = $volume*$tarif;
?>

<table >
	<tr>
		<td>
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<tr class="danger"><th>Volume(m3)</th><th>Montant (Fcfa)</th></tr>
				<tr ><td rowspan="10"><?php echo $volume;?></td><td rowspan="10" ><?php echo $montant;?></td></tr>
		
			</table>
		</td>
	</tr>
</table>

	