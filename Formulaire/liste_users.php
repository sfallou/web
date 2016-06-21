<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerUser($bdd,$id_user){
        $req=$bdd->prepare("DELETE FROM Users where id=:n1");
        $req->execute(array(':n1'=>$id_user));
    }
    
if(isset($_GET['id_user']) and !empty($_GET['id_user'])){
        supprimerUser($bdd,$_GET['id_user']);
       
        ?>
    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>Supprimée avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Users</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Users');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>Nom</th>
        <th>Profil</th>
        <th>Etat</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id'];?></td>
        <td class="center"><?php echo $don['login'];?></td>
        <td class="center"><?php echo $don['nom'];?></td>
        <td class="center"><?php echo $don['profil'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['etat'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="modifier_user.php?id_user=<?php echo $don['id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="liste_users.php?id_user=<?php echo $don['id'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
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
