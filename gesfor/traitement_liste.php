<?php 
    require('head.php');
	require('secure.php');
	include('connexion.php');
	include('classes/utilisateurs.php');
	require('header.php');
    $id_abonne=$_GET['id_abonne'];
    $abonne=new abonne($id_abonne);
    $nom=strtoupper($abonne->recuperInformationsAbonne($bdd)['nom']);
    $prenom=strtoupper($abonne->recuperInformationsAbonne($bdd)['prenom']);
    $adresse=strtoupper($abonne->recuperInformationsAbonne($bdd)['adresse']);
    $compteur=new Compteur($bdd,$id_abonne);
	if(isset($_GET['id_compteur']) and !empty($_GET['id_compteur'])){
        $id_compteur=$_GET['id_compteur'];
		$req =$bdd->query(" delete from  compteur where id_compteur=$id_compteur");
		?>
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'enregistrement a été supprimé avec succes.
     </div><?php }

?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Les prélévements du compteur de l'abonné <?php echo"$prenom $nom de $adresse"; ?></h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
                $prelevements=$compteur->tousSesPrelevements();
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>N° Facture</th>
        <th>Date Facture</th>
        <th>Ancien Index</th>
        <th>Nouvel Index</th>
        <th>Etat</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$prelevements->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_compteur'];?></td>
        <td class="center"><?php echo changedate1($don['date_index']);?></td>
        <td class="center"><?php echo $don['ancien_index'];?></td>
        <td class="center"><?php echo $don['nouvel_index'];?></td>
        <td class="center">
            <span class="center"><?php if($don['etat']==0) $var="non payée";else $var="payée"; echo $var;?></span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="traitement_facturation.php?id_compteur=<?php echo $don['id_compteur'];?>&id_abonne=<?php echo $id_abonne;?>">
                <i class="glyphicon glyphicon-print icon-white"></i>
                Imprimer
            </a>
             <?php if($_SESSION['statut']!='tresorier'){ ?>
            <a class="btn btn-info" href="modifier_index.php?id_compteur=<?php echo $don['id_compteur'];?>&id_abonne=<?php echo $id_abonne;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            
            <a class="btn btn-danger orange" href="traitement_liste.php?id_compteur=<?php echo $don['id_compteur'];?>&id_abonne=<?php echo $id_abonne;?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce prélèvement?'));">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Supprimer
            </a>
            <?php }?>
           
    <div class="modal fade" id="supp" tabindex="-1" role="dialog" aria-labelledby="suppressions" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Informations</h3>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiement supprimer <?php echo $don['prenom'];?> <?php echo $don['nom'];?> ?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Non</a>
            
                </div>
            </div>
        </div>
    </div>

        </td>
    </tr>
    <?php } $prelevements=null; ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

<?php require('footer.php'); ?>
