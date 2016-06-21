<?php
require('secure.php');
 if(isset($_GET['id_abonne']) and !empty($_GET['id_abonne']) and isset($_GET['id_compteur']) and !empty($_GET['id_compteur'])){
		$abn=new abonne($_GET['id_abonne']);
		$cpteur=new Compteur($bdd,$_GET['id_abonne']);
		$abn->changerEtat($bdd, 0);
		$cpteur->changerEtatCompteur($_GET['id_compteur'],0);
		?>
	<script language="JavaScript">
		alert("Compteur retire avec succes!!");
		window.location.replace("etat_facturation.php");
	</script><?php }
?>
<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Abonnes qui sont suspendus</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php		$req3 = $bdd->query("SELECT id_abonne,UPPER(prenom) AS prenom_maj,UPPER(nom) AS nom_maj,adresse,ancien_index,nouvel_index,id_compteur,id,date_index,compteur.etat AS etat_compteur,abonne.etat AS etat_abonne,compteur.timestamp AS timestamp  FROM abonne
								JOIN compteur
								ON abonne.id_abonne=compteur.id
								WHERE YEAR(date_index)='$annee' AND MONTH(date_index)='$mois' AND compteur.etat=2 AND adresse='$adresse' ");
					
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>ID</th>
		<th>Prenom</th>
		<th>Nom</th>
		<th>Adresse</th>
		<th>Numero Facture</th>
		<th>Date facture</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($donnee3=$req3->fetch()){
        ?>
    <tr>
        <td><?php echo $donnee3['id_abonne'];?></td>
        <td class="center"><?php echo $donnee3['nom_maj'];?></td>
        <td class="center"><?php echo $donnee3['prenom_maj'];?></td>
        <td class="center"><?php echo $adresse;?></td>
        <td class="center"><?php echo $donnee3['id_compteur'];?></td>
        <td class="center">
            <span class="center"><?php echo  changedate1($donnee3['date_index']) ;?></span>
        </td>
        <td class="center">
            <a class="btn btn-danger" href="suspenduToCoupure.php?id_abonne=<?php echo $donnee3['id_abonne'];?>&id_compteur=<?php echo $donnee3['id_compteur'];?>">
                <i class="glyphicon glyphicon-print icon-white"></i>
                Bon Coupure
            </a><br/><br/>
            <a class="btn btn-info" href="suspenduToRouge.php?id_abonne=<?php echo $donnee3['id_abonne'];?>&id_compteur=<?php echo $donnee3['id_compteur'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Retirer de la Liste
            </a>
        </td>
    </tr>
    <?php } $req=null; ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->









