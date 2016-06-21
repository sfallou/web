
<?php
	//session_start();
	require('head.php');
	require('header.php');
	require('connexion.php');
	include('classes/utilisateurs.php');
	if(isset($_POST['id']) and !empty($_POST['id'])){
		$id=$_POST['id'];	
		$choix=$_POST['etat'];
		if($choix=="oui"){
			abonne::validerAbonne($bdd, $id);
		?>
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'abonnement a été validé avec succes.
     </div><?php }
     else{
		$req2=$bdd->query("UPDATE attente SET etat=1 WHERE id_abonne='$id'"); 
	}?><div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>warning!</strong>l'abonnement a été invalidé avec succes.
     </div>
		<a class="btn btn-warning" href='listeabonnes.php'>
			retour
		</a>
     <?php
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
                            <th></th>
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
                            </td>
                            <form role="form" method="post">
                            <td>
								oui<input type="checkbox" class="from-class" name='etat' value='oui' select><br/>
								non<input type="checkbox" class="form-class" name='etat' value="non">
								<input type="hidden" name='id' value="<?php echo $don['id_abonne'];?>">
							 </td>
								<td>
								<?php if($_SESSION['statut']!='administrateur'){ ?>
			   <button class="btn btn-info noty" 
                            data-noty-options="{&quot;text&quot;:&quot;vous ne pouvez pas effectuer cette tâche&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;error&quot;}">
                        <i class="glyphicon glyphicon-check icon-white"></i> valider
                    </button>
			   <?php }
			   else{ ?>
            <button class="btn btn-info" type='submit'>
                <i class="glyphicon glyphicon-check icon-white"></i>
                Valider
            </button>	<?php } 
            ?>
                                
                            </td>
                            </form>
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
