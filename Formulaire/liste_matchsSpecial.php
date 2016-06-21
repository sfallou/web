<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerMatchSpecial($bdd,$id_matchSpecial){
        $req=$bdd->prepare("DELETE FROM MatchsSpecial where id_match_special=:n1");
        $req->execute(array(':n1'=>$id_matchSpecial));
    }
    
if(isset($_GET['id_matchSpecial']) and !empty($_GET['id_matchSpecial'])){
        supprimerMatchSpecial($bdd,$_GET['id_matchSpecial']);
       /* echo$id_ecole=$_GET['id_ecole'];
        $req=$bdd->query("DELETE * FROM Ecoles where id_ecole='$id_ecole'");*/
        ?>
    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>le match a été supprimé avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Matchs Spéciaux</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from MatchsSpecial');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>Sport</th>
        <th>Equipe/Joueur</th>
        <th>Classement</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_match_special'];?></td>
        <td class="center"><?php echo $don['sport'];?></td>
        <td class="center"><?php echo $don['equipe'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['classement_equipe'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="modifier_matchsSpecial.php?id_match_special=<?php echo $don['id_match_special'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="liste_matchsSpecial.php?id_matchSpecial=<?php echo $don['id_match_special'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
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
