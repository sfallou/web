<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerMatch($bdd,$id_match){
        $req=$bdd->prepare("DELETE FROM Matchs where id_match=:n1");
        $req->execute(array(':n1'=>$id_match));
    }
    
if(isset($_GET['id_match']) and !empty($_GET['id_match'])){
        supprimerMatch($bdd,$_GET['id_match']);
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
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Matchs</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Matchs');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>Equipe1</th>
        <th>Equipe2</th>
        <th>Score1</th>
        <th>Score2</th>
        <th>Date-heure-lieu</th>
        <th>Phase</th>
        <th>Poule</th>
        <th>Etat</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_match'];?></td>
        <td class="center"><?php echo $don['equipe1'];?></td>
        <td class="center"><?php echo $don['equipe2'];?></td>
        <td class="center"><?php echo $don['score1'];?></td>
        <td class="center"><?php echo $don['score2'];?></td>
        <td class="center"><?php echo $don['date_match']."-".$don['lieu']."-".$don['heure_match'];?></td>
        <td class="center"><?php echo $don['phase'];?></td>
        <td class="center"><?php echo $don['poule'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['etat'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="modifier_match.php?id_match=<?php echo $don['id_match'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="liste_matchs.php?id_match=<?php echo $don['id_match'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
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
