<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerEquipe($bdd,$id_equipe){
        $req=$bdd->prepare("DELETE FROM Equipes where id_equipe=:n1");
        $req->execute(array(':n1'=>$id_equipe));
    }
    
if(isset($_GET['id_equipe']) and !empty($_GET['id_equipe'])){
        supprimerEquipe($bdd,$_GET['id_equipe']);
       /* echo$id_ecole=$_GET['id_ecole'];
        $req=$bdd->query("DELETE * FROM Ecoles where id_ecole='$id_ecole'");*/
        ?>
    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>l'équipe a été supprimée avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Equipes</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Equipes');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>Equipe</th>
        <th>Type Equipe</th>
        <th>Sport</th>
        <th>id Ecole</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_equipe'];?></td>
        <td class="center"><?php echo $don['nom_equipe'];?></td>
        <td class="center"><?php echo $don['type_equipe'];?></td>
        <td class="center"><?php echo $don['type_sport'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['id_ecole'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="modifier_equipe.php?id_equipe=<?php echo $don['id_equipe'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="liste_equipes.php?id_equipe=<?php echo $don['id_equipe'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
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
