<?php
					$recette=$facture+$abreuvoir+$potence+$bon_coupure;
					$depense=$gazoil+$elec+$salaire+$divers;
					$bilan=$recette-$depense;
if($bilan)
{
?>
<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text">Bilan</span><br>
	</div>
	<div id="tb-top">
		<div class="tb-top-cell">Période</div>
		<div class="tb-top-cell">Recette</div>
		<div class="tb-top-cell">Dépense</div>
		<div class="tb-top-cell">Bilan</div>
		
	</div>
			<div id="tb-corps">
				<div class="tb-right-cell"><?php echo"$time1 &nbsp &nbsp$time2";?></div>
				<div class="tb-right-cell"><?php echo $recette;?></div>
				<div class="tb-right-cell"><?php echo $depense;?></div>
				<div class="tb-right-cell"><?php echo $bilan;?></div>
				
			</div>
		<?php
}
else
	echo"Aucune recette pour la période choisie!";
		?>
</div>

