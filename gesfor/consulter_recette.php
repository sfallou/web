<?php
session_start();
require('secure.php');
require('connexion.php');


	if(isset($_GET['id_recette']) and !empty($_GET['id_recette'])){
		require('classes/utilisateurs.php');
		$recette=new Finance($bdd);
		$recette->supprimerRecette($_GET['id_recette']);
		?>
	<script language="JavaScript">
		alert("Depense suprimee avec succes!!");
		window.location.replace("supervision_finance.php");
	</script><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-all"></i>Journal des recettes</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
    	<?php
    		$finance=new Finance($bdd);
			$resultat=$finance->superviserRecetteTotal($time1,$time2);
			$periode=$resultat[0];
			$facture_total=$resultat[1];
			$abonnement=$resultat[2];
			$bon=$resultat[3];
    	?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>Periode</th>
		<th>Facturation</th>
		<th>Abonnement</th>
		<th>Bon Coupure</th>
		
    </tr>
    </thead>
    <tbody>
    	<tr>
    		<td class="center"><?php echo $periode;?></td>
    		<td class="center"><?php echo $facture_total;?></td>
    		<td class="center"><?php echo $abonnement;?></td>
    		<td class="center"><?php echo $bon;?></td>
    	</tr>
    </tbody>
    </table>
    </div>
</div>
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-all"></i>Journal des recettes</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>Date</th>
		<th>Abreuvoir</th>
		<th>Potence</th>
		<th>Divers</th>
		<th>Notes</th>
		<th>Effacer</th>
    </tr>
    </thead>
    <tbody>
		<?php
			
			/******************************/
			$resultat2=$finance->superviserRecette($time1,$time2);
			$gain=0;
			while($donnee=$resultat2->fetch())
				{
					$id_recette=$donnee['id_recette'];
					$date=$donnee['date_recette'];
					$abreuvoir=$donnee['r_abreuvoir'];
					$potence=$donnee['r_potence'];
					$divers=$donnee['divers'];
					$note=$donnee['detail'];
					$gain=$gain+$abreuvoir+$potence+$divers;
					
		?>
    
    <tr>
        <td><?php echo changedate1($date);?></td>
        <td class="center"><?php echo $abreuvoir;?></td>
        <td class="center"><?php echo $potence;?></td>
        <td class="center"><?php echo $divers;?></td>
        <td class="center"><?php echo $note;?></td>
        <td>
            <a class="btn btn-danger orange" href="consulter_recette.php?id_recette=<?php echo $id_recette;?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Supprimer
            </a>

        </td>
    </tr>
    <?php }

    $recette=$facture_total+$bon+$abonnement+$gain;
    $_SESSION['recette']=$recette;
     ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

