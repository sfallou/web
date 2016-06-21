<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerInfos($bdd,$id_info){
        $req=$bdd->prepare("DELETE FROM Infos where id_info=:n1");
        $req->execute(array(':n1'=>$id_info));
    }
    
if(isset($_GET['id_info']) and !empty($_GET['id_info'])){
        supprimerInfos($bdd,$_GET['id_info']);
       /* echo$id_ecole=$_GET['id_ecole'];
        $req=$bdd->query("DELETE * FROM Ecoles where id_ecole='$id_ecole'");*/
        ?>
    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'info a été supprimée avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Infos</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Infos');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>titre</th>
        <th>contenu</th>
        <th>Date et heure publication</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_info'];?></td>
        <td class="center"><img src="<?php echo $don['image_info'];?>" width="50px"/></td>
        <td class="center"><?php echo $don['titre'];?></td>
        <td class="center"><?php echo $don['contenu'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['date_info']." - ".$don['heure_info'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="modifier_info.php?id_info=<?php echo $don['id_info'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="liste_infos.php?id_info=<?php echo $don['id_info'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
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
