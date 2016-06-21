<?php 
session_start();
require('secure.php');
require('connexion.php');
require('classes/utilisateurs.php');

	if(isset($_GET['id_depense']) and !empty($_GET['id_depense'])){
		$depense=new Finance($bdd);
		$depense->supprimerDepense($_GET['id_depense']);
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
        <h2><i class="glyphicon glyphicon-list-all"></i>Journal des depenses</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
    	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>Date</th>
		<th>Gazoil</th>
		<th>Senelec</th>
		<th>Salaire</th>
		<th>Entretien</th>
		<th>Divers</th>
		<th>Note</th>
		<th>Effacer</th>
    </tr>
    </thead>
    <tbody>
		<?php
			$finance=new Finance($bdd);
			$resultat=$finance->superviserDepense($time1,$time2);
			$frais=0;
			while($donnees=$resultat->fetch())
				{
					$id_depense=$donnees['id_depense'];
					$date=$donnees['date_depense'];
					$gazoil=$donnees['d_gazoil'];
					$elec=$donnees['d_senelec'];
					$salaire_conducteur=$donnees['salaire_conducteur'];
					$salaire_gerant=$donnees['salaire_gerant'];
					$salaire_releveur=$donnees['salaire_releveur'];
					$entretien=$donnees['d_entretien'];
					$d_divers=$donnees['d_divers'];
					$note=$donnees['detail'];
					$salaire=$salaire_conducteur+$salaire_gerant+$salaire_releveur;
					$frais=$frais+$salaire+$d_divers+$entretien+$elec+$gazoil;
				
		?>
    
    <tr>
        <td><?php echo changedate1($date);?></td>
        <td class="center"><?php echo $gazoil;?></td>
        <td class="center"><?php echo $elec;?></td>
        <td class="center"><a href="#" title="Somme des salaires: conducteur+gerant+releveur"><?php echo $salaire;?></a></td>
        <td class="center"><?php echo $entretien;?></td>
        <td class="center"><?php echo $d_divers;?></td>
        <td class="center"><?php echo $note;?></td>
         <td>
            <a class="btn btn-danger orange" href="consulter_depense.php?id_depense=<?php echo $id_depense;?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Supprimer
            </a>

        </td>
    </tr>
    <?php } 

    $_SESSION['depense']=$frais;
     ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

