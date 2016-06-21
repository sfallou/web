<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerCalendrier($bdd,$id_calendrier){
        $req=$bdd->prepare("DELETE FROM Calendrier where id_calendrier=:n1");
        $req->execute(array(':n1'=>$id_calendrier));
    }
    
if(isset($_GET['id_calendrier']) and !empty($_GET['id_calendrier'])){
        supprimerCalendrier($bdd,$_GET['id_calendrier']);
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
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Calendriers</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Calendrier');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>chemin</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_calendrier'];?></td>
        <td class="center"><img src="<?php echo $don['chemin'];?>" width="100px"/></td>
        <td class="center">
            <span class="center"><?php echo $don['chemin'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-danger orange" href="liste_calendriers.php?id_calendrier=<?php echo $don['id_calendrier'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
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
