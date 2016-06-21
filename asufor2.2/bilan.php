<?php 

					$recette=$facture_total+$bon+$abonnement+$gain;
					$depense=$frais;
					$bilan=$recette-$depense;
if($bilan)
{

?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-all"></i>Bilan</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content" >
    	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style ='background-color: #2ba6cb;'>
    <thead>
    <tr>
        <th>Periode</th>
		<th>Recettes</th>
		<th>Depenses</th>
		<th>Bilan</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $periode;?></td>
        <td class="center"><?php echo $recette;?></td>
        <td class="center"><?php echo $depense;?></td>
        <td class="center"><?php echo $bilan;?></td>
    </tr>
 
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
<?php
}
else
	echo" Aucun bilan pour la periode choisie!";
		?>
</div>

