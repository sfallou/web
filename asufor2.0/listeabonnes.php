<?php 
	require('head.php');
	include('connexion.php');
	include('classes/utilisateurs.php');
	require('header.php');
	if(isset($_GET['id']) and !empty($_GET['id'])){
		$abn=new abonne($_GET['id']);
		$abn->supprimerAbonne($bdd);
		?>
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'abonné a été supprimé avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Abonnés</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from abonne');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>identifiant</th>
        <th>nom</th>
        <th>prenom</th>
        <th>téléphone</th>
        <th>adresse</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_abonne'];?></td>
        <td class="center"><?php echo $don['nom'];?></td>
        <td class="center"><?php echo $don['prenom'];?></td>
        <td class="center"><?php echo $don['telephone'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['adresse'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                détails
            </a>
             <?php if($_SESSION['statut']!='tresorier'){ ?>
            <a class="btn btn-info" href="modifierabonne.php?id=<?php echo $don['id_abonne'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="listeabonnes.php?id=<?php echo $don['id_abonne'];?>">
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
    <?php } $req=null; ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

<?php require('footer.php'); ?>
