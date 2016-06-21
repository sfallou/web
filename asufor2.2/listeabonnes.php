<?php 
	session_start();
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
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
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
            <a class="btn btn-success detail<?php echo $don['id_abonne'];?>" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                détails
            </a>
            <a class="btn btn-info" href="modifierabonne.php?id=<?php echo $don['id_abonne'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
           <?php if($_SESSION['statut']!='administrateur'){ ?>
			   <button class="btn btn-danger noty"
                            data-noty-options="{&quot;text&quot;:&quot;vous ne pouvez pas effectuer cette tâche&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;error&quot;}">
                        <i class="glyphicon glyphicon-trash icon-white"></i> Supprimer
                    </button>
			   <?php }
			   else{ ?>
            <a class="btn btn-danger" href="listeabonnes.php?id=<?php echo $don['id_abonne'];?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Supprimer
            </a>	<?php } 
            ?>
           
    <div class="modal fade" id="supp<?php echo $don['id_abonne'];?>" tabindex="-1" role="dialog" aria-labelledby="suppressions" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Informations</h3><?php $comp=new Compteur($bdd, $don['id_abonne']);
							$inf=$comp->getLastIndex();
                        ?>
                </div>
                <div class="modal-body">
				
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="info">
						<h3>Informations sur l'abonné</h3>
                        <p><table>
							<tr><th>Nom: </th><td><?php echo $don['nom'];?></td></tr>
							<tr><th>Prenom: </th><td><?php echo $don['prenom'];?></td></tr>
							<tr><th>Téléphone: </th><td><?php echo $don['telephone'];?></td></tr>
							<tr><th>Adresse: </th><td><?php echo $don['adresse'];?></td></tr>
							<tr><th>CNI: </th><td><?php echo $don['cni'];?></td></tr>
                        </table></p><hr/>
                        <h3>Informations sur le Compteur</h3>
                        <p>
							<table>
								<tr><th>Id Compteur: </th><td><?php echo $inf['id_compteur'];?></td></tr>
								<tr><th>Dernier Index: </th><td><?php echo $inf['lastIndex'];?></td></tr>
								<tr><th>Date index: </th><td><?php echo $inf['date_index'];?></td></tr>
								
							</table>
                        </p>
                    </div>
                   
                </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Non</a>
            
                </div>
            </div>
        </div>
    </div>
	<script>
     $('.detail<?php echo $don['id_abonne'];?>').click(function (e) {
     e.preventDefault();
     $('#supp<?php echo $don['id_abonne'];?>').modal('show');
     });
     
    </script>
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
