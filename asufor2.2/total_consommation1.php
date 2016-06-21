<?php
require ('connexion.php');
//require('classes/Statistique.php' );

$objet=new Statistique(0,0);

$depense_total = $objet->totaleDepense($bdd);
$recette_total  = $objet->totaleRecette($bdd);

?>

<table >
	<tr>
		<td>
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<tr ><th>Recettes (Fcfa)</th><th>D&eacute;penses (Fcfa)</th></tr>
				<tr ><td ><?php echo $recette_total;?></td><td ><?php echo $depense_total;?></td></tr>
			</table>
		</td>
	</tr>
</table>