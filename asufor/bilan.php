<?php
					$recette=$facture_total+$bon+$abonnement+$gain;
					$depense=$frais;
					$bilan=$recette-$depense;
if($bilan)
{
?>
<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text"><center>Bilan</center></span><br>
	</div>
</div><br/>
<table border="1" class="table">
	<tr>
		<th style="background:#094963;color:#fff;">Période</th>
		<th style="background:#094963;color:#fff;">Recette</th>
		<th style="background:#094963;color:#fff;">Dépense</th>
		<th style="background:#094963;color:#fff;">Bilan</th>
	</tr>
	<tr>
		<td><?php echo changedate1($time1);?> et <?php echo changedate1($time2);?> </td>
		<td><?php echo $recette;?></td>
		<td><?php echo $depense;?></td>
		<td><?php echo $bilan;?></td>
	</tr>
</table><br/>
<?php
}
else
	echo" Aucun bilan pour la période choisie!";
		?>
</div>

