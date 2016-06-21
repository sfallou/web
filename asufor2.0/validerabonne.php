<?php
	//session_start();
require('head.php');
require('header.php');
require('connexion.php');
include('classes/utilisateurs.php');
if(isset($_GET['id']) and !empty($_GET['id'])){
		
	}
?>
				<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i>Liste des abonnés non validés</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">

	<?php
	$nbr=$bdd->query("SELECT count(*) FROM attente WHERE etat=0");
	$n=$nbr->fetch();
	if($n[0]!=0){
		$abn=$bdd->query("SELECT * FROM attente WHERE etat=0");
		 ?>

                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>date d'abonnement</th>
                            <th>village</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php while($don=$abn->fetch()){
						?>

                        <tr>
                            <td><?php echo $don['id_abonne'];?></td>
                            <td class="center"><?php echo $don['nom'];?></td>
                            <td class="center"><?php echo $don['prenom'];?></td>
                            <td class="center"><?php echo $don['date_abonnement'];?></td>
                            <td class="center">
                                <?php echo $don['adresse'];?>
                            </td><td>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-check icon-white"></i>
                                    valider
                                </a>
                                
                            </td>
                        </tr>
                        <?php } ?>
                           </tbody>
                    </table>
              <?php
			}else{
			?>
				<div class="alert alert-info">

				<button class="close" data-dismiss="alert" type="button">×</button>
			<strong> Information!! </strong>
				 il n'y aucun nouveau abonnement ajouté recemment...
				</div>
                </div>
           <?php } ?>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

	
<?php 
	require('footer.php');
?>
