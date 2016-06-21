<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerPhoto($bdd,$id_photo){
        $req=$bdd->prepare("DELETE FROM Photos where id_photo=:n1");
        $req->execute(array(':n1'=>$id_photo));
    }
    
if(isset($_GET['id_photo']) and !empty($_GET['id_photo'])){
        supprimerPhoto($bdd,$_GET['id_photo']);
       /* echo$id_photo=$_GET['id_photo'];
        $req=$bdd->query("DELETE * FROM Ecoles where id_photo='$id_photo'");*/
        ?>
    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>la photo a été supprimée avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Photos</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Photos');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>nom</th>
        <th>date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_photo'];?></td>
        <td class="center"><img src="<?php echo $don['chemin'];?>" width="100px"/></td>
        <td class="center"><?php echo $don['nom_photo'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['date_photo'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-danger orange" href="liste_photos.php?id_photo=<?php echo $don['id_photo'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Supprimer
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

<?php require('footer.php'); ?>
