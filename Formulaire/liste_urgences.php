<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerUrgence($bdd,$id_urgence){
        $req=$bdd->prepare("DELETE FROM Urgences where id_urgence=:n1");
        $req->execute(array(':n1'=>$id_urgence));
    }
    
if(isset($_GET['id_urgence']) and !empty($_GET['id_urgence'])){
        supprimerUrgence($bdd,$_GET['id_urgence']);
       /* echo$id_urgence=$_GET['id_urgence'];
        $req=$bdd->query("DELETE * FROM Ecoles where id_urgence='$id_urgence'");*/
        ?>
    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>supprimée avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Urgences</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Urgences');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>urgence</th>
        <th>tel</th>
        <th>détail</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_urgence'];?></td>
        <td class="center"><?php echo $don['urgence'];?></td>
        <td class="center"><?php echo $don['numeros_tel'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['detail_urgence'];?></span>
        </td>
        <td class="center">
             <a class="btn btn-info" href="modifier_urgence.php?id_urgence=<?php echo $don['id_urgence'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="liste_urgences.php?id_urgence=<?php echo $don['id_urgence'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
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
